<?php

use Aliyun\Api\Msg\Request\V20180501\QueryTokenForMnsQueueRequest;
use Aliyun\Core\Config;
use AliyunMNS\Client;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Core\Exception\ClientException;
use Aliyun\Core\Exception\ServerException;

Config::load();

/**
 *
 * @property array tokenMap
 * @property int bufferTime
 * @property string mnsAccountEndpoint
 * @property \Aliyun\Core\DefaultAcsClient acsClient
 */
class TokenGetterForAlicom
{
    /**
     * TokenGetterForAlicom constructor.
     *
     * @param string $accessKeyId AccessKeyId
     * @param string $accessKeySecret AccessKeySecret
     */
    public function __construct($accessKeyId, $accessKeySecret)
    {
        $endpointName = "ap-southeast-1";
        $regionId = "ap-southeast-1";
        $productName = "Dybaseapi";
        $domain = "dybaseapi.ap-southeast-1.aliyuncs.com";

        $this->tokenMap = [];
        $this->bufferTime = 2 * 60;
        DefaultProfile::addEndpoint($endpointName, $regionId, $productName, $domain);
        $profile = DefaultProfile::getProfile($regionId, $accessKeyId, $accessKeySecret);
        $this->acsClient = new DefaultAcsClient($profile);
        $this->mnsAccountEndpoint = $this->getAccountEndpoint($regionId);
    }


    /**
     *
     * @param string $region Region
     * @param bool $secure 是否启用https
     * @param bool $internal
     * @param bool $vpc
     * @return string <ul>
     * <li>http(s)://{AccountId}.mns.cn-beijing.aliyuncs.com</li>
     * <li>http(s)://{AccountId}.mns.cn-beijing-internal.aliyuncs.com</li>
     * <li>http(s)://{AccountId}.mns.cn-beijing-internal-vpc.aliyuncs.com</li>
     * </ul>
     */
    private function getAccountEndpoint($region, $secure=false, $internal=false, $vpc=false)
    {
        $protocol = $secure ? 'https' : 'http';
        $realRegion = $region;
        if ($internal) {
            $realRegion .= '-internal';
        }

        if ($vpc) {
            $realRegion .= '-vpc';
        }

        return "$protocol://1493622401794734.mns.$realRegion.aliyuncs.com";
    }


    /**
     *
     * @param string $messageType SmsReport | SmsUp
     * @return TokenForAlicom|bool
     */
    public function getTokenFromRemote($messageType, $queueName)
    {
        $request = new QueryTokenForMnsQueueRequest();
        $request->setMessageType($messageType);
        $request->setQueueName($queueName);

        try {
            $response = $this->acsClient->getAcsResponse($request);
            // print_r($response);
            $tokenForAlicom = new TokenForAlicom();
            $tokenForAlicom->setMessageType($messageType);
            $tokenForAlicom->setToken($response->MessageTokenDTO->SecurityToken);
            $tokenForAlicom->setTempAccessKey($response->MessageTokenDTO->AccessKeyId);
            $tokenForAlicom->setTempSecret($response->MessageTokenDTO->AccessKeySecret);
            $tokenForAlicom->setExpireTime($response->MessageTokenDTO->ExpireTime);
            // print_r($tokenForAlicom);
            return $tokenForAlicom;
        }
        catch (ServerException $e) {
            print_r($e->getErrorCode());
            print_r($e->getErrorMessage());
        }
        catch (ClientException $e) {
            print_r($e->getErrorCode());
            print_r($e->getErrorMessage());
        }
        return false;
    }

    /**
     *
     * @param string $messageType SmsReport | SmsUp
     * @param string $queueName
     * @return TokenForAlicom|bool
     */
    public function getTokenByMessageType($messageType, $queueName)
    {
        $tokenForAlicom = null;
        if(isset($this->tokenMap[$messageType])) {
            $tokenForAlicom = $this->tokenMap[$messageType];
        }

        if(null == $tokenForAlicom || strtotime($tokenForAlicom->getExpireTime()) - time() > $this->bufferTime)
        {
            $tokenForAlicom =$this->getTokenFromRemote($messageType, $queueName);

            $client = new Client(
                $this->mnsAccountEndpoint,
                $tokenForAlicom->getTempAccessKey(),
                $tokenForAlicom->getTempSecret(),
                $tokenForAlicom->getToken()
            );

            $tokenForAlicom->setClient($client);
            $tokenForAlicom->setQueue($queueName);

            $this->tokenMap[$messageType] = $tokenForAlicom;
        }

        return $tokenForAlicom;
    }
}
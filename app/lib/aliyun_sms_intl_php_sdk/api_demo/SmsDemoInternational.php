<?php
namespace App\lib\aliyun_sms_intl_php_sdk\api_demo;

ini_set("display_errors", "on");

require_once __DIR__ . '/../api_sdk/vendor/autoload.php';

use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20180501\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20180501\QuerySendDetailsRequest;

Config::load();

/**
 * Created on 2018.05.01
 *
 * The is a DEMO that introduces how to use SMS send Api and SMS query Api.
 *
 *  notice : The Program was encoded with standard of UTF-8
 *
 */
class SmsDemoInternational
{

    static $acsClient = null;

    /**
     * @return DefaultAcsClient
     */
    public static function getAcsClient() {
        // product name， please remain unchanged
        $product = "Dysmsapi";

        // product domain, please remain unchanged
        $domain = "dysmsapi.ap-southeast-1.aliyuncs.com";

        // AccessKey and AccessKeySecret , you can login sms console and find it in API Management
        $accessKeyId = env('ALIYUN_SMS_AK');
        $accessKeySecret = env('ALIYUN_SMS_AS');

        $region = "ap-southeast-1";
        $endPointName = "ap-southeast-1";

        if(static::$acsClient == null) {

            $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);

            DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

            static::$acsClient = new DefaultAcsClient($profile);
        }
        return static::$acsClient;
    }

    /**
     * send sms
     * @return stdClass
     */
    public static function sendSms($templateCode, $param, $phone) {

        // initiate the SendSmsRequest, read help documents for more parameters instructions
        $request = new SendSmsRequest();

        // Optional, enable https
        //$request->setProtocol("https");

        // send to
        $request->setPhoneNumbers($phone);

        // ContentCode , you can login sms console and find it in Content Management
        $request->setContentCode($templateCode);

        // set the value for parameters in sms Content with JSON format. For example, the content is "Your Verification Code : ${code}, will be expired 5 minutes later"
        $request->setContentParam(json_encode($param), JSON_UNESCAPED_UNICODE);

        // Optional，custom field, this value will be returned in the sms delivery report.
        $request->setExternalId("1234567");

        $acsResponse = static::getAcsClient()->getAcsResponse($request);

        return $acsResponse;
    }

    /**
     * query send detail
     * @return stdClass
     */
    public static function querySendDetails() {

        // initiate the querySendDetailsRequest, read help documents for more parameters instructions
        $request = new QuerySendDetailsRequest();

        // Optional, enable https
        //$request->setProtocol("https");

        // send to
        $request->setPhoneNumber("12345678901");

        // the start time of the query window (the Time should be based on UTC+8)
        $request->setStartDate("2018-05-15T11:59:23+0800");

        // the end time of the query window (the Time should be based on UTC+8)
        $request->setEndDate("2018-05-15T11:59:23+0800");

        // To control the size of query results, an Application Developer can split the results into many pages and each time with one page returned.
        $request->setPageSize(10);

        // Current page.
        $request->setCurrentPage(1);

        // optional, the return fields in SendSmsResponse
        $request->setBizId("yourBizId");

        $acsResponse = static::getAcsClient()->getAcsResponse($request);

        return $acsResponse;
    }

}

//set_time_limit(0);
//header('Content-Type: text/plain; charset=utf-8');
//
//$response = SmsDemo::sendSms();
//echo "send sms:\n";
//print_r($response);
//
//sleep(2);
//
//$response = SmsDemo::querySendDetails();
//echo "query send detail:\n";
//print_r($response);

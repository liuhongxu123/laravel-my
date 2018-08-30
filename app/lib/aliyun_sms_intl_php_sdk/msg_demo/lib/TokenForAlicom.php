<?php

/**
 *
 * @property string messageType
 * @property string token
 * @property int expireTime
 * @property string tempAccessKey
 * @property string tempSecret
 * @property \AliyunMNS\Client client
 * @property string queue
 */

class TokenForAlicom
{

    /**
     * @param string $messageType
     */
	public function setMessageType($messageType)
    {
        $this->messageType = $messageType;
    }

    /**
     * @return string
     */
    public function getMessageType()
    {
        return $this->messageType;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param int $expireTime
     */
    public function setExpireTime($expireTime)
    {
        $this->expireTime = $expireTime;
    }

    /**
     * @return int
     * @return int
     */
    public function getExpireTime()
    {
        return $this->expireTime;
    }

    /**
     * @param $tempAccessKey
     */
    public function setTempAccessKey($tempAccessKey)
    {
        $this->tempAccessKey = $tempAccessKey;
    }

    /**
     * @return string
     */
    public function getTempAccessKey()
    {
        return $this->tempAccessKey;
    }

    /**
     * @param string $tempSecret
     */
    public function setTempSecret($tempSecret)
    {
        $this->tempSecret = $tempSecret;
    }

    /**
     * @return string
     */
    public function getTempSecret()
    {
        return $this->tempSecret;
    }

    /**
     * @param \AliyunMNS\Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return \AliyunMNS\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param string $queue
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;
    }

    /**
     * @return string
     */
    public function getQueue()
    {
        return $this->queue;
    }
}
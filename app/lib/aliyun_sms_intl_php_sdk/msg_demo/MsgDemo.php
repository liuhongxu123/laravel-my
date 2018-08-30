<?php

ini_set("display_errors", "on");

require_once dirname(__DIR__) . '/msg_sdk/vendor/autoload.php';

require_once __DIR__ . '/lib/TokenGetterForAlicom.php';
require_once __DIR__ . '/lib/TokenForAlicom.php';

use Aliyun\Core\Config;
use AliyunMNS\Exception\MnsException;
use AliyunMNS\Requests\BatchReceiveMessageRequest;

Config::load();

/**
 * This is the DEMO for SMS Delivery Report API
 */
class MsgDemo
{

    /**
     * @var TokenGetterForAlicom
     */
    static $tokenGetter = null;

    public static function getTokenGetter() {

        //AccessKey, you can get if from Alicloud Console
        $accessKeyId = "yourAccessKeyId";
        $accessKeySecret = "yourAccessKeySecret";

        if(static::$tokenGetter == null) {
            static::$tokenGetter = new TokenGetterForAlicom(
                $accessKeyId,
                $accessKeySecret);
        }
        return static::$tokenGetter;
    }

    public static function receiveMsg($messageType, $queueName, callable $callback)
    {
        $i = 0;

        while ( $i < 3)
        {
            try
            {
                $tokenForAlicom = static::getTokenGetter()->getTokenByMessageType($messageType, $queueName);

                $queue = $tokenForAlicom->getClient()->getQueueRef($queueName);

                $res = $queue->batchReceiveMessage(new BatchReceiveMessageRequest(10, 5));

                /* @var \AliyunMNS\Model\Message[] $messages */
                $messages = $res->getMessages();

                foreach($messages as $message) {
                    $bodyMD5 = strtoupper(md5(base64_encode($message->getMessageBody())));

                    if ($bodyMD5 == $message->getMessageBodyMD5())
                    {
                        if(call_user_func($callback, json_decode($message->getMessageBody())))
                        {
                            $receiptHandle = $message->getReceiptHandle();
                            $queue->deleteMessage($receiptHandle);
                        }
                    }
                }

                return;
            }
            catch (MnsException $e)
            {
                $i++;
                echo "Exception: {$e->getMnsErrorCode()}\n";
                echo "Receive Message Failed: {$e}\n";
            }
        }
    }
}

header('Content-Type: text/plain; charset=utf-8');

MsgDemo::receiveMsg(
    // Message Type, there is only two type: smsreport, upmessage
    "SmsReport",

    // Message Quenue Name, you can get it from SMS console, like:Alicom-Queue-xxxxxx-SmsReport
    "Alicom-Queue-xxxxxxxx-SmsReport",

    function ($message) {
        // Please start your own code here
        print_r($message);

        // Message will not be deleted if return false
        return false;
    }
);

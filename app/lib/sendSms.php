<?php
/**
 * Created by PhpStorm.
 * User: dev-i
 * Date: 2018/8/30
 * Time: 10:40
 */
namespace App\lib;

use App\lib\aliyun_sms_intl_php_sdk\api_demo\SmsDemoInternational;
use App\lib\aliyun_api_sdk\Smsdemo;

class sendSms{

    /**
     * 发送短信
     *
     * @param $templateCode
     * @param $param
     * @param $phone
     * @return string
     */
    public static function sendSms($templateCode, $param, $phone) {

        // 判断手机号码 是 大陆 还是 非大陆

        $type = substr($phone,0,2);

        if($type == '86'){
            //去掉 86 ，国内的sdk不需要 86
            $phone = substr($phone,2,strlen($phone)-2);
            // 大陆 ，调用 Smsdemo
            $response = Smsdemo::sendSms($templateCode, $param, $phone);
        }else{
            // 非大陆。调用 SmsDemoInternational
            $response = SmsDemoInternational::sendSms($templateCode, $param, $phone);
        }

        return $response;
    }
}

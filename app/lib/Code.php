<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/17
 * Time: 14:27
 */

namespace App\lib;

/**
 * 响应状态码归类
 * 更多状态码：https://baike.baidu.com/item/HTTP%E7%8A%B6%E6%80%81%E7%A0%81/5053660
 * Class Code
 * @package App\lib
 */
class Code{

    const SUCCESS = 0;  //操作成功
    const FAIL = 1; //操作失败
    const RIDER_UNCERTIFICATE = 2;  //骑手未实名
    const RIDER_CERTIFICATE_REFUSE = 3;     //骑手实名被拒

}
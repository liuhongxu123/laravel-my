<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 17:28
 */

namespace App\Http\Controllers\Business\V1;


use App\Http\Controllers\Controller;

class UserController extends Controller {

    /**
     * 获取账户信息
     * @Get("/account_info/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getAccountInfo () {

    }
}
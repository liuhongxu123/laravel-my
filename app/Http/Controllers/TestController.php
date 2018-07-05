<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class TestController extends Controller
{
    /**
     * 测试 Dingo api
     * @return \Illuminate\Http\JsonResponse
     */
    public function hello()
    {
        return response()->json([
            'code' => 0,
            'message' => 'success',
            'data' => [
                'hello' => 'hello world'
            ]
        ]);
    }

    /**
     * 测试 jwt 生成 token
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $User = new User();
        $User->name = str_random(10);
        $User->password = password_hash('1111111', 1);
        $User->email = $User->name . '@test.com';
        $User->save();
        $token = auth()->login($User);
        return response()->json([
            'code' => 0,
            'message' => 'token generate success',
            'data' => [
                'token' => $token
            ]
        ]);
    }

    /**
     * 测试 jwt 解析 token
     * @return \Illuminate\Http\JsonResponse
     */
    public function info()
    {
        $User = auth()->user();
        return response()->json([
            'code' => 0,
            'message' => 'get user_info success',
            'data' => [
                'test' => $User
            ]
        ]);
    }

    /**
     * 测试英文语言包
     * @return \Illuminate\Http\JsonResponse
     */
    public function lang_en()
    {
        config('APP_LOCALE', 'en');
        return response()->json([
            'code' => 0,
            'message' => 'en',
            'data' => [
                'test' => trans('test')
            ]
        ]);
    }

    /**
     * 测试中文语言包
     * @return \Illuminate\Http\JsonResponse
     */
    public function lang_zh()
    {
        return response()->json([
            'code' => 0,
            'message' => 'zh-CN',
            'data' => [
                'test' => trans('test', [], 'zh-CN')
            ]
        ]);
    }
}

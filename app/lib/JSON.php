<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/17
 * Time: 14:22
 */

namespace App\lib;


class JSON{

    public static function jsonFormat ($code, $message='success', $data=[], $stateCode = 200) {
        if (is_array($data) && empty($data)) {
            $data = new \stdClass();
        }

        return response([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $stateCode);
    }
}
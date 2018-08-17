<?php

namespace App\Http\Controllers;

use App\lib\JSON;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnJson($code, $message='success', $data=[])
    {
        return JSON::jsonFormat($code, $message, $data);
    }
}

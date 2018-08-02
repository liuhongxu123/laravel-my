<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/2
 * Time: 16:08
 */

namespace App\Http\Services\Rider\V1;


use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class UploadService{

    /**
     * 单文件上传
     * @param UploadedFile $file
     * @param string $origin_path 原图存储路径
     * @param bool $cut_photo 是否剪切图片
     * @param string $cut_path  剪切图存储位置
     * @return array
     */
    public static function uploadOne (UploadedFile $file, $origin_path, $cut_photo = false, $cut_path = '') {
        $ext_arr = ['jpeg', 'jpg', 'gif', 'png'];
        if (!$file->isValid()){
            return [
                'err' => 1,
                'msg' => '上传失败'
            ];
        }
        if (!in_array($file->getClientOriginalExtension(), $ext_arr)) {
            return [
                'err' => 1,
                'msg' => '图片格式不正确'
            ];
        }
        $file_path = $file->store($origin_path, 'public');
        if ($cut_photo) {
            if (!is_dir($cut_path)) {
                mkdir($cut_path, 777, true);
            }
            Image::make(storage_path('app/public/').$file_path)->resize(34,34)->save($cut_path.'/'.substr($file_path, strrpos($file_path, '/')));
        }
        return [
            'err' => 0,
            'file' => $file_path
        ];
    }

}
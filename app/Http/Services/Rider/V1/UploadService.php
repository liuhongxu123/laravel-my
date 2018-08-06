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
     * 单图片保存
     * @param UploadedFile $file
     * @param string $origin_path 原图存储路径
     * @param bool $cut_photo 是否剪切图片
     * @param string $cut_path  剪切图存储位置
     * @return array
     */
    public static function saveOne (UploadedFile $file, $origin_path, $cut_photo = false, $cut_path = '') {
        $file_path = $file->store($origin_path, 'public');
        if (!$file_path) {
            return [
                'err' => 1,
                'msg' => sprintf("%s 保存失败",$file->getClientOriginalName())
            ];
        }
        if ($cut_photo) {
            if (!is_dir($cut_path)) {
                mkdir($cut_path, 777, true);
            }
            Image::make(storage_path('app/public/').$file_path)->resize(34,34)->save($cut_path.'/'.substr($file_path, strrpos($file_path, '/')));
        }
        return [
            'err' => 0,
            'path' => $file_path
        ];
    }

    /**
     * 多图片保存
     * @param UploadedFile $file
     * @param string $origin_path 原图存储路径
     * @param bool $cut_photo 是否剪切图片
     * @param string $cut_path  剪切图存储位置
     * @return array
     */
    public static function saveAll ($files, $origin_path, $cut_photo = false, $cut_path = '') {
        if (!is_array($files)) {    //非数组为单图片上传
            return self::saveOne($files, $origin_path, $cut_photo, $cut_path);
        }
        $res = [
            'err' => 0,
            'msg' => '保存成功',
            'paths' => []
        ];
        foreach ($files as $file) {
            $res = self::saveOne($file, $origin_path, $cut_photo, $cut_path);
            if ($res['err'] === 1) {
                break;
            }
            $res['paths'][] = $res['path'];
        }
        return $res;
    }
}













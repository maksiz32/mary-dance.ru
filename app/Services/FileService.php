<?php
namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;

class FileService 
{
    public static function newFileAdd($file, $dir) {
        $name = uniqid() . '_mary-dance_ru' . '.' . $file->getClientOriginalExtension();
        $path = '/' . $dir . '/' . $name;
        if($dir === 'img/main') {
            $width = 960;
            $height = 410;
        } else {
            $width = 300;
            $height = null;
        }
        Image::make($file)->resize($width, $height)->save(public_path() . $path, 80);
        // $path = $file->storeAs($dir, $name, 'my_files');
        return $path;
    }
}
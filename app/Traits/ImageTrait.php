<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

trait ImageTrait
{
    /**
     * Xử lý và lưu ảnh
     *
     * @param $file: file ảnh
     * @param $folder : nơi chứa ảnh
     * @param array $size: kích thước ảnh
     * @param $quality: chất lượng ảnh
     * @param $isThumb: lưu ảnh thumb
     * **/
    protected function savePublicImage($file, $folder, $size, $quality, $isThumb = false, $isBlur = false)
    {
        //Khởi tạo config
        $folder = $folder ?? "other/";
        $type = $type ?? "jpg";
        $bigWidth = $size[0];
        $bigHeight = $size[1];
        $thumbWidth = $size[2];
        $thumbHeight = $size[3];
        $str = Str::class;

        //Khởi tạo file
        $image = Image::make($file);

        //Khởi tạo đường dẫn
        $imageNameBig = $str::random(20) . "_big_" . $file->getClientOriginalName();
        $imageNameThumb = $str::random(20) . "_thumb_" . $file->getClientOriginalName();
        $imageNameBlur = $str::random(20) . "_blur_" . $file->getClientOriginalName();
        $bigPath = 'public/image/' . $folder . "/" . $imageNameBig;
        $thumbPath = 'public/image/' . $folder . "/" . $imageNameThumb;
        $blurPath = 'public/image/' . $folder . "/" . $imageNameBlur;

        //Xử lý ảnh
        //$image->fit($bigWidth, $bigHeight)->save($bigPath, $quality);
        $image->save($bigPath, $quality);
        if($isThumb){
            $image->fit($thumbWidth, $thumbHeight)->save($thumbPath, $quality);
        }
        if($isBlur){
            $image->fit($thumbWidth, $thumbHeight)->blur(100)->save($blurPath, $quality);
        }

        return [
            'big_image' => $bigPath,
            'thumb_image' => $thumbPath,
            'blur_image' => $blurPath
        ];
    }

    /**
     * Xóa ảnh khỏi server
     *
     * @param array $imageList, $disl
     * @return void
     * **/
    protected function deleteImage($imageList)
    {
        File::delete($imageList);
    }
}
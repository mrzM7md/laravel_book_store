<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait ImageUploadTrait
{
    public function uploadImage($img, $image_path, $return_path, $img_height = 250, $img_width = 190, $imageName = '')
    {
        if($imageName == 'webImage.png' or $imageName == 'webLogo'){
            $img_name = $imageName;
        }
        else{
            $img_name = $this->imageName($img, $imageName);
        }

        Image::make($img)->resize($img_width, $img_height)
        ->save(public_path($image_path.'/'.$img_name));
        
        return $return_path . $img_name;
    }

    public function imageName($image, $imageName = '')
    {
        return $imageName != '' ? $imageName : (time().'-'.$image->getClientOriginalName());
    }
}
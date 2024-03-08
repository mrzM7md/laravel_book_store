<?php

namespace App\Http\Controllers\admin;

use App\Models\Webinfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\WebinfoRequest;
use App\Traits\ImageUploadTrait;
use Illuminate\Foundation\Validation\ValidatesRequests;

class WebinfoController extends Controller
{
    use ValidatesRequests;
    use ImageUploadTrait;
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $webinfo = Webinfo::all()->first();
        return view('admin.webinfo.edit', compact('webinfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WebinfoRequest $request)
    {
        // $this->validate($request, $rules);

        $webinfo = Webinfo::all()->first();

        
        if($request->hasFile('logo')){
            $this->uploadImage(
                img: $request->logo,
                image_path: 'storage/images/webinfo',
                return_path: 'images/webinfo',
                img_height: 200,
                img_width: 200,
                imageName: 'logo.png'
            );

            $this->uploadImage(
                img: $request->logo,
                image_path: 'storage/images/webinfo',
                return_path: 'images/webinfo',
                img_height: 40,
                img_width: 40,
                imageName: 'icon.png'
            );
        }

            if($request->hasFile('web_cover_image')){
                $this->uploadImage(
                    img: $request->web_cover_image,
                    // app/public/images/books/images
                    image_path: 'storage/images/webinfo',
                    return_path: 'images/webinfo',
                    img_height: 400,
                    img_width: 400,
                    imageName: 'webImage.png'
                );
    }


        $webinfo->update($request->all());
        //  + ['web_cover_image' => 'images/webinfo/webImage.png']

        session()->flash('flash_message', 'تم بنجاح');

        return redirect()->back();    
    }
}

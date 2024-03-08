<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\{StoreCarouselRequest, UpdateCarouselRequest};
use App\Models\Carousel;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('admin.carousels.index', compact('carousels'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarouselRequest $request)
    {
        $idLists = [];
        $images = $request->file('carousels_photo_path');
        foreach ($images as $image){
            $carouselModel = new Carousel;
            $carouselModel->carousels_photo_path = $this->uploadImage(
                img: $image,
                image_path: 'storage/images/webinfo/carousel',
                return_path: 'images/webinfo/carousel/',
                img_height: 540,
                img_width: 970,
            );
            $carouselModel->user_id = auth()->user()->id;
            $carouselModel->save();
            $idLists[] = $carouselModel;
        }
        return $idLists;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarouselRequest $request, Carousel $carousel)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carousel = Carousel::whereId($id)->get()->first();
        $imgPath = $carousel->carousels_photo_path;
        // return $imgPath
            // File::delete(public_path('storgae/'.$imgPath));
            Storage::disk('public')->delete($imgPath);
            $carousel->delete();  

            return redirect()->back();

    }
}

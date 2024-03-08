<?php

namespace App\Repositories\admin\book;

use App\Models\Book;
use App\Models\Image;
use App\Repositories\admin\book\IBook;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class RBook implements IBook {
    use ImageUploadTrait;
    
    private Book $books;

    private $BEST_SELLER = 1;

    private $COVER_IMAGE_HEIGHT = 250;
    private $COVER_IMAGE_WIDTH = 250;
    private $DISK_COVER_IMAGE_PATH = 'storage/images/books/covers';
    private $DB_COVER_IMAGE_PATH = 'images/books/covers/';
    
    private $DISK_BOOK_IMAGES_PATH = 'storage/images/books/images';
    private $DB_BOOK_IMAGES_PATH = 'images/books/images/';

    private $IMAGE_COUNT_FOR_STORAGE = 3;

    public function __construct(Book $books)
    {
        $this->books = $books; 
    }
    
    public function getAll()
    {
        return $this->books::all();
    }

    public function getAllBestBooks()
    {
        return $this->books::whereBest_seller($this->BEST_SELLER);
    }

    public function store($request) {
        
        $this->createNewBook($request);
    }

    public function getBookBySlug($slug)
    {
        return $this->books->whereSlug($slug)->first();
    }

    public function update($bookController, $request, $book)
    {
        
        if ($this->isThere(files: $request->cover_image)) {
            $this->deleteFromDisk(file: $book->cover_image);
            $this->storeCoverImage(book: $book, coverImage: $request->cover_image);
        }

        $newImages = $request->file('images');
        if($newImages){ // if there image, delete old and append new images..
            // delete old images from disk and db...
            $oldImages = Image::all()->where('book_id', 'LIKE', $book->id);
            foreach ($oldImages as $image){
                $this->deleteFromDisk(file: $image->book_photo_path);
                $image->delete();
            }
            // append new images to disk and db...
            $this->storeFirstThreeImages(newImages: $newImages, bookId: $book->id);
        }

        $this->storeUpdateSharedColumns($request, $book);

       
        if($book->isDirty('isbn')){
            $bookController->validate($request, [
                'isbn' => ['required', 'alpha_num', Rule::unique('books', 'isbn')],
            ]);
        }

        $book->save();

        $book->categories()->detach();
        $book->authors()->detach();
        
        $book->authors()->attach($request->authors);

        $book->categories()->attach($request->categories);
    }

   public function destroy($book){
        $this->deleteFromDisk(file: $book->cover_image);
        
        $images = $this->getBookImagesByBookId(bookId: $book->id);
        
        foreach($images as $image){
            $this->deleteFromDisk(file: $image->book_photo_path);
        }

        $book->delete();

    }

    public function getBookImagesByBookId($bookId)
    {
        return Image::all()->where('book_id', 'LIKE', $bookId);
    }

    public function deleteFromDisk($file){
        Storage::disk('public')->delete($file);
    }

    public function isThere($files){
        return $files ? true : false;
    }

    public function storeUpdateSharedColumns($request, $book){

        $request->best_seller ? $book->best_seller = 1 : $book->best_seller = 0;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->user_id = auth()->user()->id;
        $book->description = $request->description;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies ?? 0;
        $book->price = $request->price;
        $book->currency_id = $request->price ? $request->currency : null ;
 
   }

   public function successBookAddedMessage(){
        return 'تمت إضافة الكتاب بنجاح';
    }

    public function successBookUpdatedMessage(){
        return 'تم تعديل الكتاب بنجاح';
    }

    public function successBookDeletedMessage(){
        return 'تم حذف الكتاب بنجاح';
    }

    public function createNewBook($request){
        $book = new Book;

        $this->storeUpdateSharedColumns($request, $book);

        $this->storeCoverImage(book: $book, coverImage: $request->cover_image);
        
        $book->user_id = auth()->user()->id;

        $book->save();

        $book->authors()->attach($request->authors);
        $book->categories()->attach($request->categories);

        $images = $request->file('images');
        if($images){
            $this->storeFirstThreeImages(newImages: $images, bookId: $book->id);
        }

    }

    public function storeCoverImage($book, $coverImage){
        $book->cover_image = $this->uploadImage(
                                                    img: $coverImage,
                                                    image_path: $this->DISK_COVER_IMAGE_PATH,
                                                    return_path: $this->DB_COVER_IMAGE_PATH,
                                                    img_height: $this->COVER_IMAGE_HEIGHT,
                                                    img_width: $this->COVER_IMAGE_WIDTH
                                                );
    }

    public function storeFirstThreeImages($newImages, $bookId){
            $avaliableImagesCount = $this->IMAGE_COUNT_FOR_STORAGE;
            $currentImagescount = count($newImages); // 6
            
            if($currentImagescount > $avaliableImagesCount)
                $currentImagescount = $avaliableImagesCount;
       
            for ($i =0; $i < $currentImagescount; $i++){
                $imageModel = new Image;
                $imageModel->book_photo_path = $this->uploadImage(
                                                                    img: $newImages[$i],
                                                                    image_path: $this->DISK_BOOK_IMAGES_PATH,
                                                                    return_path: $this->DB_BOOK_IMAGES_PATH
                                                                );
                $imageModel->book_id = $bookId;
                $imageModel->save();
            }
    }



}
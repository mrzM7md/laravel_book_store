<?php

namespace App\Models;
use App\Traits\SlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Book extends Model
{
    use HasFactory;
    use SlugTrait;

    protected $fillable = ['title', 'slug', 'best_seller', 'isbn', 'description', 'publish_year', 'number_of_pages', 'number_of_copies', 'price', 'cover_image', 'user_id', 'currency_id'];
    
    ############################################################## STRART RELATIONSHIP ##############################################################
    public function currency(){
      return $this->belongsTo(Currency::class);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images(){
        // return $this->belongsToMany(Image::class);
        return $this->hasMany(Image::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    ############################################################## END RELATIONSHIP ##############################################################


    public function isY()
    {
        return $this->currency_id == $this->y() ? true : false;
    }

    public function isSA()
    {
        return $this->currency_id == $this->sa() ? true : false;
    }

    public function isUSD()
    {
        return $this->currency_id == $this->usd() ? true : false;
    }

    public function y(){
      return 1;
    }

    public function sa(){
      return 2;
    }

    public function usd(){
      return 3;
    }

    public function isBestSeller() {
      return $this->best_seller ? true : false ;
    }


    public function rate() // if there ratings, then get the average of it, other wize return `0`...
    {
        return $this->ratings->isNotEmpty() ? $this->ratings()->sum('value') / $this->ratings()->count() : 0;
    }

    protected function title(): Attribute // listen when 'title' set the value !!
    {
      return Attribute::make(
        set: fn ($value) => [
          'title' => $value,
          'slug' => SlugTrait::uniqueSlug($value,'books')
        ],
      );
    }


}

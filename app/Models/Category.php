<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SlugTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;
    use SlugTrait;

    protected $fillable = ['name', 'slug', 'description', 'user_id'];

    
    ############################################################## STRART RELATIONSHIP ##############################################################
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_category');
    }
    ############################################################## END RELATIONSHIP ##############################################################




    protected function name(): Attribute // listen when 'title' set the value !!
    {
      return Attribute::make(
        set: fn ($value) => [
          'name' => $value,
          'slug' => SlugTrait::uniqueSlug($value,'categories')
        ],
      );
    }
    
}

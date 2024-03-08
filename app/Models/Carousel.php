<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = ['carousels_photo_path'];



    ############################################################## STRART RELATIONSHIP ##############################################################
    public function  user(){
        return $this->belongsTo('user');
    }
    ############################################################## END RELATIONSHIP ##############################################################

}

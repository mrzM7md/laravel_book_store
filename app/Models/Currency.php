<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;




    ############################################################## STRART RELATIONSHIP ##############################################################
    public function books(){
        return $this->belongsToMany('books');
    }
    ############################################################## END RELATIONSHIP ##############################################################



}
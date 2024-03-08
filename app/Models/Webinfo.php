<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinfo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'about', 'web_cover_image', 'phone_number', 'whatsapp_number', 'whatsapp_first_group_url', 'whatsapp_second_group_url', 'whatsapp_third_group_url', 'whatsapp_forth_group_url', 'telegram_group_url', 'facebook_url', 'insta_url', 'location'];
}

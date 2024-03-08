<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait SlugTrait
{
    public static function uniqueSlug($slug, $table)
    {
        $slug = self::createSlug($slug);

        $count = DB::table($table)->select('slug')->whereRaw("slug LIKE '$slug%' ")->get()->count();
        // $count = DB::table($table)->newQuery("SELECT COUNT(*) FROM $table WHERE slug LIKE $slug%")->get()->first();

        return $count > 0 ?  $slug.'-'.$count : $slug;

        // if ($count > 0)
        //     return $slug.'-'.$count;
        // else
        //     return $slug;

    }


    protected static function createSlug($str)
    {
        $string = preg_replace("/[^a-z0-9_\s\-۰۱۲۳۴۵۶۷۸۹يءاأإآؤئبپتثجچحخدذرزژسشصضطظعغفقکكگگلمنوهی]/u", '', $str);

        $string = preg_replace("/[\s\-_]+/", ' ', $string);

        $string = preg_replace("/[\s_]/", '-', $string);

        return $string;
    }
}
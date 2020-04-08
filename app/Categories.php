<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{

    public static function getCategories(){
        return DB::select('SELECT * FROM categories');
    }

    public static  function changeKeys($arr, $keyProp){
        foreach ($arr as $key=>$value){
            $result[$value[$keyProp]]=$value;
        }
        return $result;
    }
    public static function getNewsCat($cat){
        $categories =  \Illuminate\Support\Facades\File::get(base_path() .'/storage/data/categories.json');
        $categories = json_decode($categories, true);
        $catResult = self::changeKeys($categories, 'id');
        return $catResult[$cat];
    }

    public static function getCategoryIdBySlug($slug){
        return DB::select("SELECT id FROM categories WHERE slug=:slug", ['slug'=>$slug]);
    }

    public static function getCategoryNameBySlug($slug){
        return DB::select("SELECT name FROM categories WHERE slug=:slug", ['slug'=>$slug]);
    }

    public static function getCategoryNameById($id){
       return DB::select("SELECT name FROM categories WHERE id=:id", ['id'=>$id]);
    }

}

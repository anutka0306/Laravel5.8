<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    public static function getCategories(){
        $categories =  \Illuminate\Support\Facades\File::get(base_path() .'/storage/data/categories.json');
        $categories = json_decode($categories, true);
        return $categories;
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
        $id = null;
        $categories =  \Illuminate\Support\Facades\File::get(base_path() .'/storage/data/categories.json');
        $categories = json_decode($categories, true);
        foreach($categories as $category){
            if($category['slug']==$slug){
                $id = $category['id'];
            }
        }
        return $id;
    }

    public static function getCategoryNameBySlug($slug){
        $name = null;
        $categories =  \Illuminate\Support\Facades\File::get(base_path() .'/storage/data/categories.json');
        $categories = json_decode($categories, true);
        foreach ($categories as $category){
            if($category['slug']==$slug){
                $name = $category['name'];
            }
        }
        return $name;
    }

    public static function getCategoryNameById($id){
        $name = null;
        $categories =  \Illuminate\Support\Facades\File::get(base_path() .'/storage/data/categories.json');
        $categories = json_decode($categories, true);
        $categoriesArr = self::changeKeys($categories, 'id');
        $name = $categoriesArr[$id]['name'];
       return $name;
    }

}

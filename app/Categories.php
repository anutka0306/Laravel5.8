<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    private static $categories = [
        0 => [
            'id'=> 1,
            'name' => 'Спорт',
            'slug'=>'sport'
        ],
        1 => [
            'id'=> 2,
            'name' => 'Экономика',
            'slug'=>'economic'
        ],
    ];
    public static function getCategories(){
        return static::$categories;
    }
    public static  function changeKeys($arr, $keyProp){
        foreach ($arr as $key=>$value){
            $result[$value[$keyProp]]=$value;
        }
        return $result;
    }
    public static function getNewsCat($cat){
        $catResult = self::changeKeys(static::$categories, 'id');
        return $catResult[$cat];
    }

    public static function getCategoryIdBySlug($slug){
        $id = null;
        foreach(static::$categories as $category){
            if($category['slug']==$slug){
                $id = $category['id'];
            }
        }
        return $id;
    }

    public static function getCategoryNameBySlug($slug){
        $name = null;
        foreach (static::$categories as $category){
            if($category['slug']==$slug){
                $name = $category['name'];
            }
        }
        return $name;
    }

    public static function getCategoryNameById($id){
        $name = null;
        $categoriesArr = self::changeKeys(static::$categories, 'id');
        $name = $categoriesArr[$id]['name'];
       return $name;
    }

}

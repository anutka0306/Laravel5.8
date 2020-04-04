<?php

namespace App;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    public static function getNews(){
       $news =  \Illuminate\Support\Facades\File::get(base_path() .'/storage/data/news.json');
       $news = json_decode($news, true);
       return $news;
    }


    public static function getNewsByCategorySlug($slug){
        $id = Categories::getCategoryIdBySlug($slug);
        $news =  \Illuminate\Support\Facades\File::get(base_path() .'/storage/data/news.json');
        $news = json_decode($news, true);
        $catNews = [];
        foreach ($news as $item){
           if($item['cat_id'] == $id){
               $catNews[] = $item;
           }
        }
        return $catNews;
    }

    public static function getCategoryNameByNewId($id){
        $news =  \Illuminate\Support\Facades\File::get(base_path() .'/storage/data/news.json');
        $news = json_decode($news, true);
        $newsResult = self::changeKeys($news, 'id');
        $new =  $newsResult[$id];
        $cat_id = $new['cat_id'];
        return Categories::getCategoryNameById($cat_id);
    }

    public static  function changeKeys($arr, $keyProp){
        foreach ($arr as $key=>$value){
            $result[$value[$keyProp]]=$value;
        }
        return $result;
    }

    public static function getNewsId($id){
        $news =  \Illuminate\Support\Facades\File::get(base_path() .'/storage/data/news.json');
        $news = json_decode($news, true);
        $newsResult = self::changeKeys($news, 'id');
        return $newsResult[$id];
    }

}

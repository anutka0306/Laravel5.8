<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $news = [
       0 => [
           'id'=> 1,
           'title'=> 'News title 1',
           'text' => 'News text 1',
           'cat_id' => '1'
       ],
       1 => [
           'id'=> 2,
           'title'=> 'News title 2',
           'text' => 'News text 2',
           'cat_id' => '2'
       ],
        2 => [
            'id'=> 3,
            'title'=> 'News title 3',
            'text' => 'News text 3',
            'cat_id' => '2'
        ],
        3 => [
            'id'=> 4,
            'title'=> 'News title 4',
            'text' => 'News text 4',
            'cat_id' => '1'
        ],
        4 => [
            'id'=> 5,
            'title'=> 'News title 5',
            'text' => 'News text 5',
            'cat_id' => '1'
        ],
    ];

    public static function getNews(){
        return static::$news;
    }


    public static function getNewsByCategorySlug($slug){
        $id = Categories::getCategoryIdBySlug($slug);
        $news = [];
        foreach (static::$news as $item){
           if($item['cat_id'] == $id){
               $news[] = $item;
           }
        }
        return $news;
    }

    public static function getCategoryNameByNewId($id){
        $newsResult = self::changeKeys(static::$news, 'id');
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
    $newsResult = self::changeKeys(static::$news, 'id');
    return $newsResult[$id];
    }

}

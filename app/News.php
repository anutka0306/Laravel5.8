<?php

namespace App;

use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    public static function getNews(){
       return DB::select('SELECT * FROM news');
    }


    public static function getNewsByCategorySlug($slug){
        $id = Categories::getCategoryIdBySlug($slug);
        return DB::select("SELECT * FROM news");
    }

    public static function getCategoryNameByNewId($id){
        $new = DB::select("SELECT * FROM news WHERE id=:id",['id'=>$id]);
        //$cat_id = $new[0]->cat_id;
        //return Categories::getCategoryNameById($cat_id);
    }

    public static  function changeKeys($arr, $keyProp){
        foreach ($arr as $key=>$value){
            $result[$value[$keyProp]]=$value;
        }
        return $result;
    }

    public static function getNewsId($id){
        $new = DB::select("SELECT * FROM news WHERE id=:id",['id'=>$id]);
        return $new[0];
    }

}

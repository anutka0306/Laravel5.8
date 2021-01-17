<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title','text','category_id','image'];

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id')->first();
    }

    public static function rules(){
        $tableNameCategory = (new Categories())->getTable();
        return[
            'title'=>'required|min:5|max:50',
            'text'=>'required|min:150',
            'category_id'=>"required|exists:{$tableNameCategory},id",
            'image'=>'mimes:jpeg,png|max:1000'
        ];
    }

    public static function attributeNames(){
        return [
            'title'=>'Название',
            'category_id'=>'Категория новости'
        ];
    }
}

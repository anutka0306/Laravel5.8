<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name','slug','description','image'];

    public function news(){
        $this->hasMany(News::class,'category_id');
    }

    public static function rules(){
        $tableNameCategory = (new Categories())->getTable();
        return[
            'name'=>'required|min:5|max:50',
            'slug'=>"required|alpha_dash|unique:{$tableNameCategory},slug",
            'description'=>'required|min:150',
            'image'=>'mimes:jpeg,png|max:1000'
        ];
    }

    public static function attributeNames(){
        return [
            'name'=>'Название',
            'slug'=>'Слаг'
        ];
    }
}

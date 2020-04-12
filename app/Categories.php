<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name','slug','description'];

    public function news(){
        $this->hasMany(News::class,'category_id');
    }
}

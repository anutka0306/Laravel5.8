<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title','text','category_id','image'];

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id')->first();
    }
}

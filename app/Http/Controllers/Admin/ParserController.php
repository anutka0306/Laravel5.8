<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(Categories $categories){
        $resource = 'https://news.yandex.ru/sport.rss';
        preg_match('/(\/[a-z]+\.rss)/',$resource,$found);
        $slug = substr($found[0],1,-4);
        $xml = XmlParser::Load($resource);

        $data_category = $xml->parse(
            [
                'name'=>['uses'=>'channel.title'],
                'slug'=>$slug,
                'description'=>['uses'=>'channel.description'],
                'image'=>['uses'=>'channel.image.url']
            ]);
        $data_news = $xml->parse(
            [
                'news'=>['uses'=>'channel.item[title,link,guid,description,pubDate]']
            ]);
       $news = array_map(function ($new){
           return array(
           'title'=>$new['title'],
           'text'=>$new['description'],
           'created_at'=>$new['pubDate']
           );
       }, $data_news['news']);

       $is_exists = Categories::query()->where('slug',$data_category['slug'])->value('id');
       dd($is_exists);

        //dd($news);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(){
        $xml = XmlParser::Load('https://news.yandex.ru/army.rss');
        $data = $xml->parse(
            [
                'title'=>['uses'=>'channel.title'],
                'link'=>['uses'=>'channel.link'],
                'description'=>['uses'=>'channel.description'],
                'image'=>['uses'=>'channel.image.url'],
                'news'=>['uses'=>'channel.item[title,link,guid,description,pubDate]']
            ]);
        dd($data);
    }
}

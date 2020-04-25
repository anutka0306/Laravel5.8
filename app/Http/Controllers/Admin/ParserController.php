<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Jobs\NewsParsing;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Services\XMLParserService;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService){
        $rssLink = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
           'https://news.yandex.ru/army.rss',
           'https://news.yandex.ru/gadgets.rss',
           'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss'

        ];
        foreach ($rssLink as $link) {
            NewsParsing::dispatch($link);
        }
    }
}

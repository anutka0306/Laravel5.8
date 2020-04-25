<?php


namespace App\Services;

use App\News;
use App\Categories;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
public function saveNews($link){
    $categories = new Categories();
    $xml = XmlParser::Load($link);

    $data_category = $xml->parse(
        [
            'name'=>['uses'=>'channel.title'],
            'description'=>['uses'=>'channel.description'],
            'image'=>['uses'=>'channel.image.url']
        ]);
    preg_match('/: [а-яА-Я]+$/u',$data_category['name'],$found);

    $data_category['name']=substr($found[0],2);
    $data_category['slug']=$this->translit(substr($found[0],2));
    $data_news = $xml->parse(
        [
            'news'=>['uses'=>'channel.item[title,link,guid,description,pubDate]']
        ]);

    $is_exists = $categories::query()->where('slug',$data_category['slug'])->value('id');
    if(!$is_exists){
        $categories->fill($data_category)->save();
    }
    $categoryId = $categories::query()->where('slug',$data_category['slug'])->value('id');
    $news = array_map(function ($new) use ($categoryId){
        return array(
            'title'=>$new['title'],
            'text'=>$new['description'],
            //'created_at'=>$new['pubDate'],
            'category_id'=>$categoryId
        );
    }, $data_news['news']);
    foreach ($news as $new){
        if(!News::query()->where('title',$new['title'])->value('title')) {
            News::query()->insert($new);
        }
    }
    return redirect()->route('admin.news.index')->with('success', 'Новости добавлены');
}

private function translit($s) {
    $s = (string) $s; // преобразуем в строковое значение
    $s = strip_tags($s); // убираем HTML-теги
    $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
    $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
    $s = trim($s); // убираем пробелы в начале и конце строки
    $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
    $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
    $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
    $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
    return $s; // возвращаем результат
}

}

<?php

class CarloParser {

    //Св-во класса объявлены публичными исключительно для тестирования
    public $catTree;
    public $catList;



    /**
     * Загружает с главной страницы carlopazolini.com список товарных категорий.
    */
    function loadCat() {
        $html=file_get_contents('http://www.carlopazolini.com/ru/');

        $dom = new DOMDocument();
        $dom->substituteEntities = false;
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

        foreach($dom->getElementsByTagName('a') as $val) {
            $url = $val->getAttribute('href');
            $title=ucfirst(trim($val->nodeValue));

            if(!preg_match('#^/ru/collection/(women|men)/.+((/.+)|(\?all=1))$#u',$url)) {continue;}

            $item=array(
                'url'=>$url,
                'title'=>$title
            );

            $path=preg_replace('#^/ru/collection/|\?.+$#u','',$url);
            if(!isset($this->catList[$path])) {$this->catList[$path]=$item;}
            $path=explode('/',$path);

            if(count($path)==2) {
                if(!isset($this->catTree[$path[0]][$path[1]])) {
                    $this->catTree[$path[0]][$path[1]]=$item;
                }
            } elseif(count($path)==3) {
                if(!isset($this->catTree[$path[0]][$path[1]]['sub'][$path[2]])) {
                    $this->catTree[$path[0]][$path[1]]['sub'][$path[2]]=$item;
                }
            }
        }
    }

}
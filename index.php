<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING );
header('Content-Type: text/html; charset=utf-8');
include('CarloParser.class.php');

$parser=new CarloParser();
$parser->loadCat();

//«десь хран€тс€ категории в виде списка
print_r($parser->catList);

//«десь хран€тс€  категории в виде многомерного массива
print_r($parser->catTree);
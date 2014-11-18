<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING );
header('Content-Type: text/html; charset=utf-8');
include('CarloParser.class.php');

$testSku=array(
    'JH-EGR1-6R1',
    'JH-LED2-2R3',
    'JH-LED2-6R1',
    'JH-MAX3-1',
    'MK-N2010-17',
    'MM-X0101-1',
    'MM-X0501-1',
    'MM-X0972-1',
    'MT-EDA12-1',
    'MT-LOT4-3',
    'MT-MEG1-6R1',
    'NR-X5000-1SP',
    'NR-X5000-7SP',
    'PB-N0005-1',
    'PB-N0005-19',
    'PB-N0005-3',
    'PE-N3406-33'
);

$parser=new CarloParser();
$parser->loadCat();

foreach($testSku as $sku) {
  $cat=$parser->getCatBySku($sku);
  print '“овар <b>'.$sku.'</b> находитс€ в разделе <a href=http://www.carlopazolini.com'.$cat['url'].'>'.$cat['title'].'</a><BR>';
}

//«десь хран€тс€ категории в виде списка
print_r($parser->catList);

//«десь хран€тс€  категории в виде многомерного массива
print_r($parser->catTree);
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING );
header('Content-Type: text/html; charset=utf-8');
include('CarloParser.class.php');

$parser=new CarloParser();
$parser->loadCat();

//����� �������� ��������� � ���� ������
print_r($parser->catList);

//����� ��������  ��������� � ���� ������������ �������
print_r($parser->catTree);
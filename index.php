<?php

// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');


//тут можно вставлять отладочный код 

//var_dump($_SERVER);  die();




//$r = 1;
//
// MetaData::setMetaDataForPages($r, 'zminilu TITLE golovniy', 'Zmina Key', 'Zmina Description');
//
//
//
//
//$array = MetaData::getMetaDataForPages('golovna'); 
//
//var_dump($array);
//
//die();


// посюда


// Вызов Router
$router = new Router();
$router->run();
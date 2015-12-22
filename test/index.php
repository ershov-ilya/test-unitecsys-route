<?php
 /**
 * Created by PhpStorm.
 * Author:   ershov-ilya
 * GitHub:   https://github.com/ershov-ilya/
 * About me: http://about.me/ershov.ilya (EN)
 * Website:  http://ershov.pw/ (RU)
 * Date: 22.12.2015
 * Time: 12:00
 */

header( 'Content-Type: text/plain; charset=utf-8' ) ;
define('DEBUG' , true) ;
defined( 'DEBUG') or define('DEBUG' , false) ;

require_once('../dist/MapRouter.class.php');

// Формируем список согласно задачи
$json=file_get_contents('data.json');
$list=(array)json_decode($json);
//if(DEBUG) print_r($list);

$router=new Routes\MapRouter();
// Функция которую заказывали:
$result=$router->minimal('Париж', 'Берлин', $list);

print_r($result);

print "JSON для AJAX коннекторов:\n";
print "JSON: ".json_encode($result, JSON_UNESCAPED_UNICODE);


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

//require_once('../dist/minRoute.class.php');

$json=file_get_contents('data.json');
// Формируем список согласно задачи
$list=(array)json_decode($json);

print_r($list);
exit;


$route=new Routes\minRoute();



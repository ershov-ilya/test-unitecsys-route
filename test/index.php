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

require_once('../dist/MapRouter.class.php');

// Формируем список согласно задачи
$json=file_get_contents('data.json');
$list=(array)json_decode($json);


$router=new Routes\MapRouter();
$router->minimal('Париж', 'Берлин', $list);


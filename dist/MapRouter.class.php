<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.12.2015
 * Time: 12:00
 */

namespace Routes;


class MapRouter {
    // Массив провереных городов
    private static $checked=array();
    private static $map=array();

    public static function minimal($from, $to, $list=array()){
        // Парсим список в карту
        MapRouter::$map=array();
        foreach($list as $k => $v){
            $city=explode(' ',$k, 2);
            if(!isset(MapRouter::$map[$city[0]])) MapRouter::$map[$city[0]]=array();
            if(!isset(MapRouter::$map[$city[1]])) MapRouter::$map[$city[1]]=array();
            MapRouter::$map[$city[0]][$city[1]]=$v;
            MapRouter::$map[$city[1]][$city[0]]=$v;
            if(!isset(MapRouter::$checked[$city[0]])) MapRouter::$checked[$city[0]]=array('reached'   => false);
            if(!isset(MapRouter::$checked[$city[1]])) MapRouter::$checked[$city[1]]=array('reached'   => false);
        }

        // Проверяем наличие точек на нашей карте
        if(!isset(MapRouter::$map[$from])) return "Error: Не найден город Откуда";
        if(!isset(MapRouter::$map[$to])) return "Error: Не найден город Куда";

        // Ищем оптимальную цену
        MapRouter::recurseReach($from, 'Старт');
        print_r(MapRouter::$checked);
    }

    private static function recurseReach($from, $prev='', $cost_before=0){
        MapRouter::$checked[$from]=array(
            'cost'      =>  $cost_before,
            'prev'      =>  $prev,
            'reached'   =>  true
        );
        print "\nТочка $from\n";
        print_r(MapRouter::$checked[$from]);
        sleep(1);

        // Прикидываем стоимость достижения
        foreach(MapRouter::$map[$from] as $city => $cost){
            if($city==$prev) continue;
            $new_cost=$cost_before+$cost;
            if(!isset(MapRouter::$checked[$city]['cost']) || MapRouter::$checked[$city]['cost']>$new_cost){
                MapRouter::$checked[$city]['cost']=$new_cost;
                MapRouter::$checked[$city]['prev']=$from;
            }
        }

        // Достигаем, чтобы рассчитать следующие точки
        foreach(MapRouter::$map[$from] as $city => $cost){
            if(MapRouter::$checked[$city]['reached']===false){
                MapRouter::recurseReach($city, $from, $cost_before+$cost );
            }
        }
    }
}

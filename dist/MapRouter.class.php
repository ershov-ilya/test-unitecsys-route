<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.12.2015
 * Time: 12:00
 */

namespace Routes;


class MapRouter {
    private static function minRecurse(){

    }

    public static function minimal($from, $to, $list=array()){
        // Парсим список в карту
        $map=array();
        $reached=array();
        $fog=array();
        foreach($list as $k => $v){
            $city=explode(' ',$k, 2);
            if(!isset($map[$city[0]])) $map[$city[0]]=array();
            if(!isset($map[$city[1]])) $map[$city[1]]=array();
            $map[$city[0]][$city[1]]=$v;
            $map[$city[1]][$city[0]]=$v;
            if(!isset($reached[$city[0]])) $reached[$city[0]]=false;
            if(!isset($reached[$city[1]])) $reached[$city[1]]=false;
        }

        // Проверяем наличие точек на нашей карте
        if(!isset($map[$from])) return "Error: Не найден город Откуда";
        if(!isset($map[$to])) return "Error: Не найден город Куда";

        // Ищем оптимальную цену
        foreach($map[$from] as $city => $cost){
            if(!isset($fog[$city])) $fog[$city]=$cost;
        }
        //print_r($map);
        print_r($fog);
    }
}

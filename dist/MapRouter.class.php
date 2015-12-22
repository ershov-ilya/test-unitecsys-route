<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.12.2015
 * Time: 12:00
 */

namespace Routes;


class MapRouter {
    public static function minimal($from, $to, $list=array()){
        // Парсим список в карту
        $map=array();
        foreach($list as $k => $v){
            $city=explode(' ',$k, 2);
            if(!isset($map[$city[0]])) $map[$city[0]]=array();
            $map[$city[0]][$city[1]]=$v;
        }


        //print_r($map);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.12.2015
 * Time: 12:00
 */

namespace Routes;


class minRoute {
    private static $map;

    public static function get($from, $to, $map){
        minRoute::$map=$map;


    }
}

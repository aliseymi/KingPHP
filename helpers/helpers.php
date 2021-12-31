<?php

if(!function_exists('env')){

    function env(string $key){
        return $_ENV[$key];
    }

}

if(!function_exists('site_url')){

    function site_url(string $route){
        return env('HOST') . $route;
    }

}

if(!function_exists('asset_url')){

    function asset_url(string $route){
        return site_url('assets/' . $route);
    }

}

if(!function_exists('random_element')){

    function random_element(array $arr){
        shuffle($arr);

        return array_pop($arr);
    }

}
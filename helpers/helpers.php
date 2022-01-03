<?php

if (!function_exists('env')) {

    function env(string $key)
    {
        return $_ENV[$key];
    }
}

if (!function_exists('site_url')) {

    function site_url(string $route)
    {
        return env('HOST') . $route;
    }
}

if (!function_exists('asset_url')) {

    function asset_url(string $route)
    {
        return site_url('assets/' . $route);
    }
}

if (!function_exists('random_element')) {

    function random_element(array $arr)
    {
        shuffle($arr);

        return array_pop($arr);
    }
}

if (!function_exists('var_print')) {

    function var_print(...$var)
    {
        echo '<div style="background: #9d9d9d;border: 1px solid #000000;z-index: 99999999; color: #000000; font-size: 16px; font-weight:900">';
        echo '<pre style="margin: 20px">';
        var_dump(...$var);
        echo '</pre>';
        echo '</div>';
        exit();
    }
}

if(!function_exists('view')){

    function view(string $path, array $data = []){ 
        $path = str_replace('.', '/', $path);

        extract($data);

        include_once BASE_PATH . "views/$path.php";
    }

}

if(!function_exists('strContains')){

    function strContains(string $str, string $needle, $case_sensitive = 0){
        if($case_sensitive)
            $pos = strpos($str, $needle);
        else
            $pos = stripos($str, $needle);

        return ($pos !== false) ? true : false;
    }

}

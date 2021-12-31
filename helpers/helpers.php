<?php

if(!function_exists('env')){

    function env($var){
        return $_ENV[$var];
    }

}
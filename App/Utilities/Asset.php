<?php

namespace App\Utilities;

/**
 * @method static string css(string $path)
 * @method static string js(string $path)
 * @method static string img(string $path)
 */

class Asset
{

    public static function __callStatic($methodName, $arguments)
    {
        $path = $arguments[0];

        return $_ENV['HOST'] . 'assets/' . $methodName . '/' . $path;
    }

    public static function get(string $path)
    {
        return $_ENV['HOST'] . 'assets/' .  $path;
    }

    // public static function css(string $path)
    // {
    //     return $_ENV['HOST'] . 'assets/css/' . $path;
    // }

    // public static function js(string $path)
    // {
    //     return $_ENV['HOST'] . 'assets/js/' . $path;
    // }

    // public static function img(string $path)
    // {
    //     return $_ENV['HOST'] . 'assets/img/' . $path;
    // }
}

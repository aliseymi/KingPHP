<?php

# front controller

use App\Core\Routing\Route;
use App\Core\Routing\Router;

include "bootstrap/init.php";

$router = new Router();
$router->run();

// $route = '/post/{slug}';

// $pattern = "/^".str_replace(['/', '{', '}'], ['\/', '(?<', '>[-%\w]+)'], $route)."$/";

// var_print($route, $pattern, '/^\/post\/(?<slug>[-%\w]+)$/');

// $uri1 = '/post/what-is-php';
// $uri2 = '/post/14';
// $uri3 = '/product/12';

// $result = preg_match($pattern, $uri1, $matches);

// var_print($matches);
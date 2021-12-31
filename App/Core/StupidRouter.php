<?php

namespace App\Core;

use App\Utilities\Url;

class StupidRouter 
{
    private $routes;

    public function __construct()
    {
        $this->routes = [
            '/colors/red' => 'colors/red.php',
            '/colors/blue' => 'colors/blue.php',
            '/colors/green' => 'colors/green.php'
        ];
    }

    public function run()
    {
        $current_route = Url::currentRoute();

        foreach($this->routes as $route => $view){

            if($current_route == $route){
                $this->includeAndDie(BASE_PATH . "views/$view");
            }

        }

        header('HTTP/1.0 404 Not Found');
        $this->includeAndDie(BASE_PATH . 'views/errors/404.php');
    }

    private function includeAndDie($viewPath)
    {
        include $viewPath;

        die();
    }
}
<?php

namespace App\Core\Routing;

use App\Core\Request;
use App\Core\Routing\Route;

class Router 
{
    private $request;
    private $routes;
    private $current_route;

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null;
    }

    public function findRoute(Request $request)
    {
        foreach($this->routes as $route){
            
            if(in_array($request->method(), $route['methods']) && $request->uri() == $route['uri']){
                return $route;
            }

        }

        return null;
    }

    public function run()
    {
        
    }
}
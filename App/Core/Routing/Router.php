<?php

namespace App\Core\Routing;

use App\Core\Request;
use App\Core\Routing\Route;
use Exception;

class Router
{
    private $request;
    private $routes;
    private $current_route;
    const CONTROLLERS_NAMESPACE = '\App\Controllers\\';

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null;
    }

    public function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {

            if (in_array($request->method(), $route['methods']) && $request->uri() == $route['uri']) {
                return $route;
            }
        }

        return null;
    }

    public function run()
    {
        # 405: invalid request method
        if ($this->invalidRequest($this->request))
            $this->dispatch405();

        # 404: uri not exists
        if (is_null($this->current_route))
            $this->dispatch404();

        $this->dispatch($this->current_route);
    }

    private function invalidRequest(Request $request)
    {
        foreach($this->routes as $route){

            if($request->uri() == $route['uri'] && !in_array($request->method(), $route['methods'])){
                return true;
            }
        }

        return false;
    }

    private function dispatch404()
    {
        header('HTTP/1.0 404 Not Found');

        view('errors.404');

        die();
    }

    private function dispatch405()
    {
        header('HTTP/1.0 405 Method Not Allowed');

        view('errors.405');

        die(); 
    }

    private function dispatch($route)
    {
        $action = $route['action'];

        # action: null
        if (is_null($action) || empty($action)) {
            return;
        }

        # action: Closure
        if (is_callable($action)) {
            $action();
            // call_user_func($action);
        }

        # action: Controller@method
        if (is_string($action))
            $action = explode('@', $action);

        #action: ['Controller', 'method']
        if (is_array($action)) {
            $class_name = SELF::CONTROLLERS_NAMESPACE . $action[0];
            $method = $action[1];

            if (!class_exists($class_name))
                throw new \Exception("Class '$class_name' does not exist!");


            $controller = new $class_name;

            if (!method_exists($controller, $method))
                throw new \Exception("Method '$method' does not exist in class $class_name!");


            $controller->{$method}();
        }
    }
}

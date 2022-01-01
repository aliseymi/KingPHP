<?php

# front controller

use App\Core\Request;
use App\Core\StupidRouter;
use App\Utilities\Url;

include "bootstrap/init.php";

// $router = new StupidRouter();
// $router->run();

$request = new Request();


var_print($request->name);






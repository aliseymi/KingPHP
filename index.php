<?php

# front controller

use App\Core\Routing\Router;
use App\Models\User;

include "bootstrap/init.php";

$router = new Router();
$router->run();

$userModel = new User(1);

var_print($userModel->name);
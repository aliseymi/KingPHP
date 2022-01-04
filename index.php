<?php

# front controller

use App\Core\Routing\Router;
use App\Models\User;

include "bootstrap/init.php";

$router = new Router();
$router->run();

$userModel = new User;
$user_id = $userModel->create([
    'name' => 'ali',
    'email' => 'ali@gmail.com',
    'password' => sha1(md5('1234'))
]);

var_print($user_id);
<?php

# front controller

use App\Models\Product;
use App\Core\Routing\Router;

include "bootstrap/init.php";

$router = new Router();
$router->run();

$productModel = new Product();

var_print($productModel->getAll());

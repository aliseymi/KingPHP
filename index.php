<?php

# front controller

include_once "vendor/autoload.php";

use App\Core\Request;

echo $_SERVER['REQUEST_URI'];

new Request;

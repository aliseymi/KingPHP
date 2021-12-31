<?php

# front controller

use App\Core\StupidRouter;
use App\Utilities\Url;

include "bootstrap/init.php";

$router = new StupidRouter();
$router->run();
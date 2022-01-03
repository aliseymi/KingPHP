<?php

namespace App\Controllers;

use App\Core\Request;

class PostController 
{
    public function single()
    {
        global $request;
        
        var_print($request->get_route_params());
    }
}
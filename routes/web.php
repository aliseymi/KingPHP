<?php

use App\Core\Routing\Route;

Route::get('/', 'HomeController@index');

Route::add(['get', 'post'], '/abc', function(){
    echo 'welcome';
});

Route::get('/a', function(){
    echo 'form a!';
});

Route::post('/b', function(){
    echo 'form b!';
});

Route::post('/c', function(){
    echo 'form c!';
});
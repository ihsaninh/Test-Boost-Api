<?php

$router->get('/', function () use ($router) {
    echo "Welcome to my app";
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    // User Routes
    $router->get('/users', 'UserController@index');
    $router->post('/users', 'UserController@store');
    $router->get('/users/{user}', 'UserController@show');
    $router->put('/users/{user}', 'UserController@update');
    $router->delete('/users/{user}', 'UserController@destroy');
    // Student Routes
    $router->get('/barangs', 'BarangController@index');
    $router->post('/barangs', 'BarangController@store');
    $router->get('/barangs/{barang}', 'BarangController@show');
    $router->put('/barangs/{barang}', 'BarangController@update');
    $router->delete('/barangs/{barang}', 'BarangController@destroy');
});

$router->group(['prefix' => 'api/auth'], function () use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
});


$router->group(['prefix' => 'api/auth', 'middleware' => 'auth:api'], function () use ($router) {
    $router->post('/logout', 'AuthController@logout');
    $router->get('/getuser', 'AuthController@getUser');
});
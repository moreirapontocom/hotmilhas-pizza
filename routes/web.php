<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'pizzas'], function($router) {
    $router->get('/', 'PizzaController@listAll');
    $router->get('remove/{id}', 'PizzaController@removePizza');
    $router->post('create', 'PizzaController@createPizza');
    $router->post('edit', 'PizzaController@editPizza');
});

$router->group(['prefix' => 'customers'], function($router) {
    $router->get('/', 'CustomerController@listAll');
});

$router->group(['prefix' => 'orders'], function($router) {
    $router->get('/', 'OrderController@listAll');
    $router->post('create', 'OrderController@createOrder');
});
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");


require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the events endpoint
$router->get('/events', 'EventController@getAll');
$router->get('/events/(\d+)', 'EventController@getOne');
$router->post('/events', 'EventController@create');
$router->put('/events/(\d+)', 'EventController@update');
$router->delete('/events/(\d+)', 'EventController@delete');

// routes for the categories endpoint
$router->get('/categories', 'CategoryController@getAll');
$router->get('/categories/(\d+)', 'CategoryController@getOne');
$router->post('/categories', 'CategoryController@create');
$router->put('/categories/(\d+)', 'CategoryController@update');
$router->delete('/categories/(\d+)', 'CategoryController@delete');

$router->post('/users/login', 'UserController@login');

// Run it!
$router->run();
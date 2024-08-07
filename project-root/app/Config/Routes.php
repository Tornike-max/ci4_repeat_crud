<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/user/register', 'UserController::registerForm');
$routes->post('/user/register', 'UserController::register');
$routes->get('/user/login', 'UserController::loginForm');
$routes->post('/user/login', 'UserController::login');
$routes->delete('/user/logout/(:num)', 'UserController::logout/$1');
$routes->get('/no-access', 'UserController::noAccess');


$routes->get('/students', 'StudentController::index');
$routes->get('/students/show/(:num)', 'StudentController::show/$1');

$routes->get('/students/create', 'StudentController::create', ['filter' => 'myAuth']);
$routes->post('/students/store', 'StudentController::store', ['filter' => 'myAuth']);

$routes->get('/students/edit/(:num)', 'StudentController::edit/$1', ['filter' => 'myAuth']);
$routes->put('/students/update/(:num)', 'StudentController::update/$1', ['filter' => 'myAuth']);
$routes->delete('/students/delete/(:num)', 'StudentController::delete/$1', ['filter' => 'myAuth']);

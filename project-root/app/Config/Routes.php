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


$routes->get('/students', 'StudentController::index');
$routes->get('/students/show/(:num)', 'StudentController::show/$1');

$routes->get('/students/create', 'StudentController::create');
$routes->post('/students/store', 'StudentController::store');

$routes->get('/students/edit/(:num)', 'StudentController::edit/$1');
$routes->put('/students/update/(:num)', 'StudentController::update/$1');
$routes->delete('/students/delete/(:num)', 'StudentController::delete/$1');

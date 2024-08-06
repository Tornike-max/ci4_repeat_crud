<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/students', 'StudentController::index');
$routes->get('/students/show/(:num)', 'StudentController::show/$1');

$routes->get('/students/create', 'StudentController::create');
$routes->post('/students/store', 'StudentController::store');

$routes->get('/students/edit/(:num)', 'StudentController::edit/$1');
$routes->put('/students/update/(:num)', 'StudentController::update/$1');
$routes->delete('/students/delete/(:num)', 'StudentController::delete/$1');

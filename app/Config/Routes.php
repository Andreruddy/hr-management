<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');
$routes->post('/login-process', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');
// $routes->get('/', 'Home::index');
$routes->get('/users', 'User::index', ['filter' => 'auth']);
$routes->get('/users/create', 'User::create', ['filter' => 'auth']);
$routes->get('/users/edit/(:num)', 'User::edit/$1', ['filter' => 'auth']);
$routes->post('/users/store', 'User::store', ['filter' => 'auth']);
$routes->delete('/users/delete/(:num)', 'User::delete/$1', ['filter' => 'auth']);

$routes->get('/employees', 'Employees::index', ['filter' => 'auth']);
$routes->get('/employees/store', 'Employees::create', ['filter' => 'auth']);
$routes->get('/employees/(:num)', 'Employees::edit/$1', ['filter' => 'auth']);
$routes->post('/employees/update', 'Employees::update', ['filter' => 'auth']);
$routes->delete('/employees/delete/(:num)', 'Employees::delete/$1', ['filter' => 'auth']);

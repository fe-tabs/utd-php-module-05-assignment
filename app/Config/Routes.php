<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/books', 'BookController::listAll');
$routes->get('/books/new', 'BookController::add');
$routes->post('/books/update/(:any)', 'BookController::update/$1');
$routes->post('/books/delete/(:any)', 'BookController::delete/$1');
$routes->post('/books/save', 'BookController::save');

$routes->get('/users', 'UserController::listAll');
$routes->get('/users/new', 'UserController::add');
$routes->post('/users/update/(:any)', 'UserController::update/$1');
$routes->post('/users/delete/(:any)', 'UserController::delete/$1');
$routes->post('/users/save', 'UserController::save');

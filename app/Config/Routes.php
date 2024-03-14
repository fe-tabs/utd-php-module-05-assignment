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
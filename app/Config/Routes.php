<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/books/new', 'BookController::add');
$routes->get('/books', 'BookController::listAll');
$routes->post('/books/save', 'BookController::save');
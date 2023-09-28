<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('readproduct', 'ProductController::readProduct');
$routes->get('insertproduct', 'ProductController::insertProduct');
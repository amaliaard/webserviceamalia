<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tokobuku/simple-json', 'TokoBuku::showSimpleJson');
$routes->get('/tokobuku', 'TokoBuku::index');
$routes->get('/tokobuku/json', 'tokobuku::getTokoBukuDataJson');
$routes->get('/tokobuku/hapus/(:num)', 'TokoBuku::delete/$1');

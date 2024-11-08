<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */


use App\Controllers\News; // Add this line
use App\Controllers\Pages;
$routes->get('pages', [Pages::class, 'view']); // Add this line
$routes->get('pages/inscription', [Pages::class, 'inscription']); // Add this line
$routes->get('pages/login', [Pages::class, 'login']); // Add this line
$routes->post('pages/create_user', [Pages::class, 'create_user']); // Add this line
$routes->post('pages/loginAuth', [Pages::class, 'loginAuth']); // Add this line
$routes->get('pages/(:segment)', [Pages::class, 'show']);


$routes->get('/logout', 'Pages::logout');

<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

use App\Controllers\News; // Add this line
use App\Controllers\Pages;

$routes->get('pages', [Pages::class, 'index']);
$routes->get('pages/inscription', [Pages::class, 'inscription']); // Add this line
$routes->get('pages/login', [Pages::class, 'login']); // Add this line
$routes->post('pages', [Pages::class, 'create_user']); // Add this line
$routes->get('pages/(:segment)', [Pages::class, 'show']);


$routes->match(['get', 'post'], 'pages/loginAuth', 'Pages::loginAuth');
$routes->get('/logout', 'Pages::logout');

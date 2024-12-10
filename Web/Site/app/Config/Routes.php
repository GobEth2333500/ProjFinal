<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
use App\Controllers\BaseController;
use App\Controllers\Pages;
$routes->get('pages', [Pages::class, 'view']); // Add this line
$routes->get('pages/inscription', [Pages::class, 'inscription']); // Add this line
$routes->get('pages/login', [Pages::class, 'login']); // Add this line
$routes->get('pages/index', [Pages::class, 'index']); // Add this line
$routes->post('pages/create_user', [Pages::class, 'create_user']); // Add this line
$routes->post('pages/loginAuth', [Pages::class, 'loginAuth']); // Add this line
$routes->get('pages/(:segment)', [Pages::class, 'show']);

<<<<<<< Updated upstream
=======
$routes->get('pages/ajax', [Pages::class, 'ajaxMethod']); // Add this line
$routes->get('pages/getdata', [Pages::class, 'fetch']);





$routes->get('/logout', 'Pages::logout');
>>>>>>> Stashed changes

$routes->get('pages/logout', [Pages::class, 'logout']);

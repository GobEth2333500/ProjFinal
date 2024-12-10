<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */


use App\Controllers\News; // Add this line
use App\Controllers\Pages;
use App\Controllers;
$routes->get('pages', [Pages::class, 'view']); // Add this line
$routes->get('pages/home', [Pages::class, 'view']); // Add this line
$routes->get('pages/admin', [Pages::class, 'admin']); // Add this line
$routes->get('pages/inscription', [Pages::class, 'inscription']); // Add this line
$routes->get('pages/login', [Pages::class, 'login']); // Add this line
$routes->post('pages/create_user', [Pages::class, 'create_user']); // Add this line
$routes->post('/handle-myajax', [Pages::class, 'handleAjaxRequest']); // Add this line
$routes->post('pages/loginAuth', [Pages::class, 'loginAuth']); // Add this line

$routes->get('pages/ajax', [Pages::class, 'ajaxMethod']); // Add this line
$routes->get('ajax-input/getdata', [Pages::class, 'fetch']);





$routes->get('/logout', 'Pages::logout');

$routes->get('pages/logout', [Pages::class, 'logout']);
$routes->post('pages/EditRoles', [Pages::class, 'EditRoles']); // Add this line
$routes->get('pages/latestInput', [Pages::class, 'latestInput']); // Add this line


$routes->get('pages/scores', [Pages::class, 'scores']); // Add this line



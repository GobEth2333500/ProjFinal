<?php

namespace config;
use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

$route = Services::routes(true);

if (file_exists(SYSTEMPATH.'Config/Routes.php'))
{
    require SYSTEMPATH. 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'Home::index');

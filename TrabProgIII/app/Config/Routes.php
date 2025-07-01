<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rota padrão - redireciona para login
$routes->get('/', 'Auth::index');

$routes->get('user', 'User::index');
$routes->get('user/create', 'User::create');
$routes->post('user/store', 'User::store');
$routes->get('user/edit/(:num)', 'User::edit/$1');
$routes->post('user/update/(:num)', 'User::update/$1');
$routes->get('user/delete/(:num)', 'User::deleteConfirm/$1');
$routes->post('user/delete/(:num)', 'User::delete/$1');

// Rotas para registro público
$routes->get('user/register', 'User::register');
$routes->post('user/storeRegister', 'User::storeRegister');

$routes->get('court', 'Court::index');       
$routes->get('court/create', 'Court::create');
$routes->post('court/store', 'Court::store');   
$routes->get('court/edit/(:num)', 'Court::edit/$1');  
$routes->post('court/update/(:num)', 'Court::update/$1');
$routes->get('court/delete/(:num)', 'Court::deleteConfirm/$1'); 
$routes->post('court/delete/(:num)', 'Court::delete/$1'); 

$routes->get('courttype', 'CourtType::index');
$routes->get('courttype/create', 'CourtType::create');
$routes->post('courttype/store', 'CourtType::store');
$routes->get('courttype/edit/(:num)', 'CourtType::edit/$1');
$routes->post('courttype/update/(:num)', 'CourtType::update/$1');
$routes->get('courttype/delete/(:num)', 'CourtType::deleteConfirm/$1');
$routes->post('courttype/delete/(:num)', 'CourtType::delete/$1');

$routes->get('courttypelink', 'CourtTypeLink::index');
$routes->get('courttypelink/create', 'CourtTypeLink::create');
$routes->post('courttypelink/store', 'CourtTypeLink::store');
$routes->get('courttypelink/edit/(:num)', 'CourtTypeLink::edit/$1');
$routes->post('courttypelink/update/(:num)', 'CourtTypeLink::update/$1');
$routes->get('courttypelink/delete/(:num)', 'CourtTypeLink::deleteConfirm/$1');
$routes->post('courttypelink/delete/(:num)', 'CourtTypeLink::delete/$1');

$routes->get('scheduling', 'Scheduling::index');
$routes->get('scheduling/create', 'Scheduling::create');
$routes->post('scheduling/store', 'Scheduling::store');
$routes->get('scheduling/edit/(:num)', 'Scheduling::edit/$1');
$routes->post('scheduling/update/(:num)', 'Scheduling::update/$1');
$routes->get('scheduling/delete/(:num)', 'Scheduling::deleteConfirm/$1');
$routes->post('scheduling/delete/(:num)', 'Scheduling::delete/$1');

$routes->get('auth', 'Auth::index'); 
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');

$routes->get('dashboard', 'Dashboard::index');
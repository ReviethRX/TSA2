<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public pages
$routes->get('/', 'Pages::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Pages::profile');
$routes->get('about', 'Pages::about');

// Authentication
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

// Protected task management (login required)
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('tasks/new', 'Tasks::new');
    $routes->post('tasks/create', 'Tasks::create');
    $routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
    $routes->post('tasks/update/(:num)', 'Tasks::update/$1');
    $routes->post('tasks/delete/(:num)', 'Tasks::delete/$1');
});
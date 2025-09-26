<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Main form page
$routes->get('/', 'App::index');

// About page
$routes->get('about', 'App::about');

// Submissions page (viewing)
$routes->get('submissions', 'App::submissions');

// Form submission handler
$routes->post('submit-form', 'App::submitForm');

// Authentication routes
$routes->post('login', 'App::handleLogin');
$routes->get('logout', 'App::logout');
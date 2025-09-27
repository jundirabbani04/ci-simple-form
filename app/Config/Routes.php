<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- FORM SUBMISSION ---
// The main page shows the form.
$routes->get('/', 'Form::index'); 
// This handles the form POST request.
$routes->post('form/submit', 'Form::submit');

// --- GENERAL PAGES ---
$routes->get('about', 'App::about');

// --- SUBMISSIONS & ADMIN AREA ---
$routes->get('submissions', 'Submissions::index');
$routes->post('login', 'Submissions::handleLogin');
$routes->get('logout', 'Submissions::logout');
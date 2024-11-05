<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Home::admin');

// Categories
$routes->get('categories', 'Categories::index');
$routes->post('categories/store', 'Categories::store');
$routes->post('categories/update/(:num)', 'Categories::update/$1');
$routes->get('categories/delete/(:num)', 'Categories::delete/$1');

// Clients
$routes->get('clients', 'Clients::index');
$routes->post('clients/store', 'Clients::store');
$routes->post('clients/update/(:num)', 'Clients::update/$1');
$routes->get('clients/delete/(:num)', 'Clients::delete/$1');

// Commandes
$routes->get('commandes', 'Commandes::index');
$routes->post('commandes/store', 'Commandes::store');
$routes->post('commandes/update/(:num)', 'Commandes::update/$1');
$routes->get('commandes/delete/(:num)', 'Commandes::delete/$1');
$routes->get('/commandes/getOrderDetails/(:num)', 'Commandes::getOrderDetails/$1');
$routes->get('commandes/bon_de_commande/(:num)', 'Commandes::generateBonDeCommande/$1');


// Produits
$routes->get('produits', 'Produits::index');
$routes->post('produits/store', 'Produits::store');
$routes->post('produits/update/(:num)', 'Produits::update/$1');
$routes->get('produits/delete/(:num)', 'Produits::delete/$1');


// Fournisseurs
$routes->get('fournisseurs', 'Fournisseurs::index');
$routes->post('fournisseurs/store', 'Fournisseurs::store');
$routes->post('fournisseurs/update/(:num)', 'Fournisseurs::update/$1');
$routes->get('fournisseurs/delete/(:num)', 'Fournisseurs::delete/$1');

//authentifications
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::register');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('request_reset', 'PasswordResetController::requestReset');
$routes->post('request_reset', 'PasswordResetController::requestReset');
$routes->get('reset_password/(:any)', 'PasswordResetController::resetPassword/$1');
$routes->post('reset_password/(:any)', 'PasswordResetController::resetPassword/$1');


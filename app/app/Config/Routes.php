<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Categories
$routes->get('categories', 'Categories::index');
$routes->get('categories/create', 'Categories::create');
$routes->post('categories/store', 'Categories::store');
$routes->get('categories/edit/(:num)', 'Categories::edit/$1');
$routes->post('categories/update/(:num)', 'Categories::update/$1');
$routes->get('categories/delete/(:num)', 'Categories::delete/$1');

// Clients
$routes->get('clients', 'Clients::index');
$routes->get('clients/create', 'Clients::create');
$routes->post('clients/store', 'Clients::store');
$routes->get('clients/edit/(:num)', 'Clients::edit/$1');
$routes->post('clients/update/(:num)', 'Clients::update/$1');
$routes->get('clients/delete/(:num)', 'Clients::delete/$1');

// Commandes
$routes->get('commandes', 'Commandes::index');
$routes->get('commandes/create', 'Commandes::create');
$routes->post('commandes/store', 'Commandes::store');
$routes->get('commandes/edit/(:num)', 'Commandes::edit/$1');
$routes->post('commandes/update/(:num)', 'Commandes::update/$1');
$routes->get('commandes/delete/(:num)', 'Commandes::delete/$1');

// Produits
$routes->get('produits', 'Produits::index');
$routes->get('produits/create', 'Produits::create');
$routes->post('produits/store', 'Produits::store');
$routes->get('produits/edit/(:num)', 'Produits::edit/$1');
$routes->post('produits/update/(:num)', 'Produits::update/$1');
$routes->get('produits/delete/(:num)', 'Produits::delete/$1');

// DetailCommandes
$routes->get('detailcommandes', 'DetailCommandes::index');
$routes->get('detailcommandes/create', 'DetailCommandes::create');
$routes->post('detailcommandes/store', 'DetailCommandes::store');
$routes->get('detailcommandes/edit/(:num)', 'DetailCommandes::edit/$1');
$routes->post('detailcommandes/update/(:num)', 'DetailCommandes::update/$1');
$routes->get('detailcommandes/delete/(:num)', 'DetailCommandes::delete/$1');

// Fournisseurs
$routes->get('fournisseurs', 'Fournisseurs::index');
$routes->get('fournisseurs/create', 'Fournisseurs::create');
$routes->post('fournisseurs/store', 'Fournisseurs::store');
$routes->get('fournisseurs/edit/(:num)', 'Fournisseurs::edit/$1');
$routes->post('fournisseurs/update/(:num)', 'Fournisseurs::update/$1');
$routes->get('fournisseurs/delete/(:num)', 'Fournisseurs::delete/$1');

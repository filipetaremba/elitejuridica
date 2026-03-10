<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ─────────────────────────────────────────────
//  FRONTEND — Rotas Públicas
// ─────────────────────────────────────────────

// Página inicial
$routes->get('/', 'Home::index');

// Sobre
$routes->get('about', 'About::index');

// Serviços
$routes->get('servicos', 'Servicos::index');

// Equipa
$routes->get('equipe',              'Equipe::index');
$routes->get('equipe/(:segment)',   'Equipe::perfil/$1');

// Notícias
$routes->get('noticias',            'Noticias::index');
$routes->get('noticias/(:segment)', 'Noticias::show/$1');

// Contacto
$routes->get('contact',  'Contact::index');
$routes->post('contact', 'Contact::send');


// ─────────────────────────────────────────────
//  AUTH — Login / Logout
// ─────────────────────────────────────────────

$routes->get('login',    'Auth\Login::index');
$routes->post('login',   'Auth\Login::attempt');
$routes->get('logout',   'Auth\Logout::index');


// ─────────────────────────────────────────────
//  ADMIN — Backoffice (protegido por AuthFilter)
// ─────────────────────────────────────────────

$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    // Dashboard
    $routes->get('/',         'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // ── Equipa ──────────────────────────────
    $routes->get('equipe',                  'Admin\Equipe::index');
    $routes->get('equipe/create',           'Admin\Equipe::create');
    $routes->post('equipe/store',           'Admin\Equipe::store');
    $routes->get('equipe/edit/(:num)',      'Admin\Equipe::edit/$1');
    $routes->post('equipe/update/(:num)',   'Admin\Equipe::update/$1');
    $routes->get('equipe/delete/(:num)',    'Admin\Equipe::delete/$1');

    // ── Serviços ─────────────────────────────
    $routes->get('servicos',                'Admin\Servicos::index');
    $routes->get('servicos/create',         'Admin\Servicos::create');
    $routes->post('servicos/store',         'Admin\Servicos::store');
    $routes->get('servicos/edit/(:num)',    'Admin\Servicos::edit/$1');
    $routes->post('servicos/update/(:num)', 'Admin\Servicos::update/$1');
    $routes->get('servicos/delete/(:num)', 'Admin\Servicos::delete/$1');

    // ── Notícias ─────────────────────────────
    $routes->get('noticias',                'Admin\Noticias::index');
    $routes->get('noticias/create',         'Admin\Noticias::create');
    $routes->post('noticias/store',         'Admin\Noticias::store');
    $routes->get('noticias/edit/(:num)',    'Admin\Noticias::edit/$1');
    $routes->post('noticias/update/(:num)', 'Admin\Noticias::update/$1');
    $routes->get('noticias/delete/(:num)', 'Admin\Noticias::delete/$1');
});
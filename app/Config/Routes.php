<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ── Frontend ─────────────────────────────────────────────────
$routes->get('/',                    'Home::index');
$routes->get('about',                'About::index');
$routes->get('servicos',             'Servicos::index');
$routes->get('equipe',               'Equipe::index');
$routes->get('equipe/(:segment)',    'Equipe::perfil/$1');
$routes->get('noticias',             'Noticias::index');
$routes->get('noticias/(:segment)',  'Noticias::show/$1');
$routes->get('contact',              'Contact::index');
$routes->post('contact',             'Contact::send');

// ── Auth ──────────────────────────────────────────────────────
$routes->get('login',                'Auth\Login::index');
$routes->post('login',               'Auth\Login::attempt');
$routes->get('logout',               'Auth\Logout::index');
$routes->get('register',             'Auth\Register::index');
$routes->post('register',            'Auth\Register::store');

// ── Admin (protegido por filtro 'auth') ───────────────────────
$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    // Dashboard
    $routes->get('/',          'Admin\Dashboard::index');
    $routes->get('dashboard',  'Admin\Dashboard::index');

    // Perfil do utilizador logado
    $routes->get('perfil',     'Admin\Dashboard::perfil');
    $routes->post('perfil',    'Admin\Dashboard::updatePerfil');

    // Gestão de utilizadores (apenas admin)
    $routes->get('utilizadores',                    'Admin\Utilizadores::index');
    $routes->get('utilizadores/criar',              'Admin\Utilizadores::criar');
    $routes->post('utilizadores/guardar',           'Admin\Utilizadores::guardar');
    $routes->get('utilizadores/editar/(:num)',       'Admin\Utilizadores::editar/$1');
    $routes->post('utilizadores/actualizar/(:num)',  'Admin\Utilizadores::actualizar/$1');
    $routes->get('utilizadores/apagar/(:num)',       'Admin\Utilizadores::apagar/$1');

    // Equipa
    $routes->get('equipe',                   'Admin\Equipe::index');
    $routes->get('equipe/criar',             'Admin\Equipe::criar');
    $routes->post('equipe/guardar',          'Admin\Equipe::guardar');
    $routes->get('equipe/editar/(:num)',     'Admin\Equipe::editar/$1');
    $routes->post('equipe/actualizar/(:num)','Admin\Equipe::actualizar/$1');
    $routes->get('equipe/apagar/(:num)',     'Admin\Equipe::apagar/$1');

    // Serviços
    $routes->get('servicos',                    'Admin\Servicos::index');
    $routes->get('servicos/criar',              'Admin\Servicos::criar');
    $routes->post('servicos/guardar',           'Admin\Servicos::guardar');
    $routes->get('servicos/editar/(:num)',      'Admin\Servicos::editar/$1');
    $routes->post('servicos/actualizar/(:num)', 'Admin\Servicos::actualizar/$1');
    $routes->get('servicos/apagar/(:num)',      'Admin\Servicos::apagar/$1');

    // Notícias
    $routes->get('noticias',                    'Admin\Noticias::index');
    $routes->get('noticias/criar',              'Admin\Noticias::criar');
    $routes->post('noticias/guardar',           'Admin\Noticias::guardar');
    $routes->get('noticias/editar/(:num)',      'Admin\Noticias::editar/$1');
    $routes->post('noticias/actualizar/(:num)', 'Admin\Noticias::actualizar/$1');
    $routes->get('noticias/apagar/(:num)',      'Admin\Noticias::apagar/$1');

});
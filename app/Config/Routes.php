<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/contacto/(:any)', 'Home::contacto/$1',['as' => 'paginaDeContacto']);

$routes->get('/image', 'Home::obtenerImagen');
$routes->get('/image/(:num)/(:any)', 'Home::obtenerImagen/$1/$2',['as' => 'get_image']);
$routes->get('/movie/image/(:num)', 'Movie::deleteImage/$1',['as' => 'image_delete']);

$routes->group('dashboard', static function ($routes) {
    $routes->presenter('movie');
    $routes->presenter('category',['except'=>['show']]);
});

$routes->get('/login', 'User::login',['as' => 'user_login_get']);
$routes->post('/login_post', 'User::login_post',['as' => 'user_login_post']);
$routes->post('/logout', 'User::logout',['as' => 'user_logout']);

// $routes->get('/dashboard/movie', 'Home::index',['as' => 'paginaDePeliculas']);
// $routes->get('/dashboard/movie/new', 'Home::index',['as' => 'nuevaPelicula']);
// $routes->get('/category', 'dashboard\CategoryController::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

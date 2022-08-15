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
    $routes->presenter('user',['except'=>['show']]);
    $routes->resource('movie');
});

$routes->get('/login', 'web\User::login',['as' => 'user_login_get']);
$routes->post('/login_post', 'web\User::login_post',['as' => 'user_login_post']);
$routes->post('/logout', 'web\User::logout',['as' => 'user_logout']);

//**REST */
$routes->get('/rest-movie/paginate', 'RestMovie::paginate');
$routes->get('/rest-movie/search', 'RestMovie::search');
$routes->resource('rest-movie', ['controller' => 'RestMovie']);
$routes->get('/rest-movie/categories', 'RestMovie::categories');

$routes->group('im', function($routes) {
    $routes->get('image_fit', 'ImageManipulation::image_fit');
    $routes->get('image_rotate', 'ImageManipulation::image_rotate');
    $routes->get('image_resize', 'ImageManipulation::image_resize');
    $routes->get('image_multiple', 'ImageManipulation::image_multiple');
    $routes->get('image_crop', 'ImageManipulation::image_crop');
    $routes->get('image_quality', 'ImageManipulation::image_quality');
});

$routes->get('/my_request', 'Home::my_request');
$routes->get('/my_transaction', 'Home::my_transaction');
$routes->get('/my_database', 'Home::my_database');

// librerias
$routes->group('lib', function($routes)
{
    $routes->get('curl_get', 'MyLibraries::curl_get');
	$routes->get('curl_post', 'MyLibraries::curl_post');
	$routes->get('curl_put', 'MyLibraries::curl_put');
	$routes->get('curl_remove', 'MyLibraries::curl_remove');
	$routes->get('agent', 'MyLibraries::agent');
	$routes->get('email', 'MyLibraries::email');
	$routes->get('encrypt', 'MyLibraries::encrypt');
	$routes->get('time', 'MyLibraries::time');
	$routes->get('uri', 'MyLibraries::uri');
	$routes->get('file', 'MyLibraries::file');
});

//Helpers
$routes->group('helper', function($routes)
{
    $routes->get('array', 'MyHelper::array');
    $routes->get('filesystem', 'MyHelper::filesystem');
    $routes->get('number', 'MyHelper::number');
    $routes->get('text', 'MyHelper::text');    
});

/** --------------------------------------------------------------------
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

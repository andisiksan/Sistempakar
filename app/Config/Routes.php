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
$routes->setAutoRoute(true);
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
if (session()->get('role_id') == 3) {
    $routes->get('/admin', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
    $routes->get('/admin/(:any)', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
    $routes->get('/dashboard', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
    $routes->get('/dashboard/(:any)', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
    $routes->get('/gejala', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
    $routes->get('/gejala/(:any)', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
    $routes->get('/makanan', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
    $routes->get('/makanan/(:any)', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
    $routes->get('/penyakit', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
    $routes->get('/penyakit/(:any)', function () {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    });
}



// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/home', 'Home::index');

$routes->get('/auth', 'Auth::index');
$routes->post('/auth/register', 'Auth::register');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');


$routes->get('/dashboard', 'Dashboard::index');


// $routes->get('/gejala/create', 'Gejala::create');

$routes->get('/gejala', 'Gejala::index');
$routes->get('/penyakit', 'Penyakit::index');

$routes->get('/home/pasien', 'Home::profile');

$routes->get('/konsultasi', 'Konsultasi::index');
$routes->post('/konsultasi', 'Konsultasi::konsul');
$routes->get('/konsultasi/(:num)', 'Konsultasi::hasil/$1');


// $routes->get('/gejala/(:num)', 'Gejala::index/$1');
// $routes->delete('/gejala/delete/(:segment)', 'Gejala::delete/$1');


$routes->get('/makanan', 'Makanan::index');

// data api
// $routes->post('/home/data-gejala', 'Home::dataGejala');

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

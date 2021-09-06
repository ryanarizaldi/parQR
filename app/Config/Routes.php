<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/dashboard', 'Dashboard::index', ['as' => 'dashboard']);
$routes->get('/vip', 'Parkiran::showVip', ['as' => 'showVip']);
$routes->get('/direksi', 'Parkiran::showDireksi', ['as' => 'direksi']);
$routes->get('/divisi', 'Parkiran::showDivisi', ['as' => 'divisi']);
$routes->get('/departemen', 'Parkiran::showDepartemen', ['as' => 'departemen']);
$routes->get('/vip/add', 'Parkiran::addVip', ['as' => 'vipAdd']);
$routes->get('/direksi/add', 'Parkiran::addDireksi', ['as' => 'direksiAdd']);
$routes->get('/divisi/add', 'Parkiran::addDivisi', ['as' => 'divisiAdd']);
$routes->get('/departemen/add', 'Parkiran::addDepartemen', ['as' => 'departemenAdd']);
$routes->get('/departemen/edit/(:any)', 'Parkiran::editDept/$1', ['as' => 'departemenEdit']);
$routes->get('/vip/edit/(:any)', 'Parkiran::editVip/$1', ['as' => 'vipEdit']);
$routes->get('/direksi/edit/(:any)', 'Parkiran::editDir/$1', ['as' => 'dirEdit']);
$routes->get('/divisi/edit/(:any)', 'Parkiran::editDiv/$1', ['as' => 'divEdit']);
$routes->get('/print/(:any)', 'Parkiran::printBarcode/$1', ['as' => 'print']);

// $routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

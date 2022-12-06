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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

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
$routes->get('listacuentas', 'Cuentas::index');
$routes->get('creacuenta', 'Cuentas::crear');
$routes->post('guardacuenta', 'Cuentas::guardar');
$routes->get('borracuenta/(:num)', 'Cuentas::borrar/$1');
$routes->get('editacuenta/(:num)', 'Cuentas::editar/$1');
$routes->post('actualizacuenta', 'Cuentas::actualizar');
$routes->get('listarubros', 'Rubros::index');
$routes->get('crearubro', 'Rubros::crear');
$routes->post('guardarubro', 'Rubros::guardar');
$routes->get('borrarubro/(:num)', 'Rubros::borrar/$1');
$routes->get('editarubro/(:num)', 'Rubros::editar/$1');
$routes->post('actualizarubro', 'Rubros::actualizar');
$routes->get('listapresupuestos', 'presupuestos::index');
$routes->get('creapresupuesto', 'presupuestos::crear');
$routes->post('guardapresupuesto', 'presupuestos::guardar');
$routes->get('borrapresupuesto/(:num)', 'presupuestos::borrar/$1');
$routes->get('editapresupuesto/(:num)', 'presupuestos::editar/$1');
$routes->post('actualizapresupuesto', 'presupuestos::actualizar');
$routes->get('listaprogramados', 'programados::index');
$routes->get('creaprogramado', 'programados::crear');
$routes->post('guardaprogramado', 'programados::guardar');
$routes->get('borraprogramado/(:num)', 'programados::borrar/$1');
$routes->get('editaprogramado/(:num)', 'programados::editar/$1');
$routes->post('actualizaprogramado', 'programados::actualizar');
$routes->get('listaejecutados', 'ejecutados::index');
$routes->get('creaejecutado', 'ejecutados::crear');
$routes->post('guardaejecutado', 'ejecutados::guardar');
$routes->get('borraejecutado/(:num)', 'ejecutados::borrar/$1');
$routes->get('editaejecutado/(:num)', 'ejecutados::editar/$1');
$routes->post('actualizaejecutado', 'ejecutados::actualizar');
$routes->get('balance', 'balance::index');
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::loginView');
$routes->get('auth/logout', 'AuthController::logout');
$routes->get('/dashboard', 'Home::index');

$routes->match(['get', 'post'], 'auth/register', 'AuthController::register');
$routes->post('auth/login', 'AuthController::login');
$routes->get('auth/display', 'AuthController::users');
$routes->match(['get', 'post'], 'auth/update/(:num)', 'AuthController::updateUser/$1');
$routes->get('auth/delete/(:num)', 'AuthController::deleteOne/$1');

$routes->match(['get', 'post'], 'empleado/register', 'EmpleadoController::register');
$routes->get('empleado/display', 'EmpleadoController::display');
$routes->match(['get', 'post'], 'empleado/update/(:num)', 'EmpleadoController::upgrade/$1');
$routes->get('empleado/delete/(:num)', 'EmpleadoController::remove/$1');
$routes->get('empleado/findone/(:num)', 'EmpleadoController::findone/$1');


$routes->match(['get', 'post'], 'departamento/register', 'DepartamentoController::register');
$routes->get('departamento/display', 'DepartamentoController::display');
$routes->match(['get', 'post'], 'departamento/update/(:num)', 'DepartamentoController::upgrade/$1');
$routes->get('departamento/delete/(:num)', 'DepartamentoController::remove/$1');

$routes->match(['get', 'post'], 'descuentofijo/register', 'DescuentoFijoController::register');
$routes->get('descuentofijo/display', 'DescuentoFijoController::display');
$routes->match(['get', 'post'], 'descuentofijo/update/(:num)', 'DescuentoFijoController::upgrade/$1');
$routes->get('descuentofijo/delete/(:num)', 'DescuentoFijoController::remove/$1');

$routes->match(['get', 'post'], 'permiso/register', 'PermisoController::register');
$routes->get('permiso/display', 'PermisoController::display');
$routes->match(['get', 'post'], 'permiso/update/(:num)', 'PermisoController::upgrade/$1');
$routes->get('permiso/delete/(:num)', 'PermisoController::remove/$1');

$routes->match(['get', 'post'], 'horaextra/register', 'HorasExtrasController::register');
$routes->get('horaextra/display', 'HorasExtrasController::display');
$routes->match(['get', 'post'], 'horaextra/update/(:num)', 'HorasExtrasController::upgrade/$1');
$routes->get('horaextra/delete/(:num)', 'HorasExtrasController::remove/$1');

$routes->match(['get', 'post'], 'prestamo/register', 'PrestamoController::register');
$routes->get('prestamo/display', 'PrestamoController::display');
$routes->match(['get', 'post'], 'prestamo/update/(:num)', 'PrestamoController::upgrade/$1');
$routes->get('prestamo/delete/(:num)', 'PrestamoController::remove/$1');


$routes->match(['get', 'post'], 'cobro/register', 'CobroController::register');
$routes->get('cobro/display', 'CobroController::display');
$routes->match(['get', 'post'], 'cobro/update/(:num)', 'CobroController::upgrade/$1');
$routes->get('cobro/delete/(:num)', 'CobroController::remove/$1');


$routes->match(['get', 'post'], 'nomina/register', 'NominaController::register');
$routes->get('nomina/display', 'NominaController::display');
$routes->match(['get', 'post'], 'nomina/update/(:num)', 'NominaController::upgrade/$1');
$routes->get('nomina/delete/(:num)', 'NominaController::remove/$1');


$routes->match(['get', 'post'], 'liquidacion/register', 'LiquidacionController::register');
$routes->get('liquidacion/display', 'LiquidacionController::display');
$routes->match(['get', 'post'], 'liquidacion/update/(:num)', 'LiquidacionController::upgrade/$1');
$routes->get('liquidacion/delete/(:num)', 'LiquidacionController::remove/$1');

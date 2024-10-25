<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::loginView');
$routes->get('auth/logout', 'AuthController::logout');
$routes->get('/dashboard', 'Home::index', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'auth/register', 'AuthController::register', ['filter' => 'authGuard']);
$routes->post('auth/login', 'AuthController::login',);
$routes->get('auth/display', 'AuthController::users', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'auth/update/(:num)', 'AuthController::updateUser/$1', ['filter' => 'authGuard']);
$routes->get('auth/delete/(:num)', 'AuthController::deleteOne/$1', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'empleado/register', 'EmpleadoController::register', ['filter' => 'authGuard']);
$routes->get('empleado/display', 'EmpleadoController::display', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'empleado/update/(:num)', 'EmpleadoController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('empleado/delete/(:num)', 'EmpleadoController::remove/$1', ['filter' => 'authGuard']);
$routes->get('empleado/findone/(:num)', 'EmpleadoController::findone/$1', ['filter' => 'authGuard']);


$routes->match(['get', 'post'], 'departamento/register', 'DepartamentoController::register', ['filter' => 'authGuard']);
$routes->get('departamento/display', 'DepartamentoController::display', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'departamento/update/(:num)', 'DepartamentoController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('departamento/delete/(:num)', 'DepartamentoController::remove/$1', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'descuentofijo/register', 'DescuentoFijoController::register', ['filter' => 'authGuard']);
$routes->get('descuentofijo/display', 'DescuentoFijoController::display', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'descuentofijo/update/(:num)', 'DescuentoFijoController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('descuentofijo/delete/(:num)', 'DescuentoFijoController::remove/$1', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'permiso/register', 'PermisoController::register', ['filter' => 'authGuard']);
$routes->get('permiso/display', 'PermisoController::display', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'permiso/update/(:num)', 'PermisoController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('permiso/delete/(:num)', 'PermisoController::remove/$1', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'horaextra/register', 'HorasExtrasController::register', ['filter' => 'authGuard']);
$routes->get('horaextra/display', 'HorasExtrasController::display', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'horaextra/update/(:num)', 'HorasExtrasController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('horaextra/delete/(:num)', 'HorasExtrasController::remove/$1', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'prestamo/register', 'PrestamoController::register', ['filter' => 'authGuard']);
$routes->get('prestamo/display', 'PrestamoController::display', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'prestamo/update/(:num)', 'PrestamoController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('prestamo/delete/(:num)', 'PrestamoController::remove/$1', ['filter' => 'authGuard']);


$routes->match(['get', 'post'], 'cobro/register', 'CobroController::register', ['filter' => 'authGuard']);
$routes->get('cobro/display', 'CobroController::display', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'cobro/update/(:num)', 'CobroController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('cobro/delete/(:num)', 'CobroController::remove/$1', ['filter' => 'authGuard']);


$routes->match(['get', 'post'], 'nomina/register', 'NominaController::register', ['filter' => 'authGuard']);
$routes->get('nomina/display', 'NominaController::display', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'nomina/update/(:num)', 'NominaController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('nomina/delete/(:num)', 'NominaController::remove/$1', ['filter' => 'authGuard']);


$routes->match(['get', 'post'], 'liquidacion/register', 'LiquidacionController::register', ['filter' => 'authGuard']);
$routes->get('liquidacion/display', 'LiquidacionController::display', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'liquidacion/update/(:num)', 'LiquidacionController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('liquidacion/delete/(:num)', 'LiquidacionController::remove/$1', ['filter' => 'authGuard']);


$routes->match(['get', 'post'], 'detalle/register', 'DetalleFamiliarController::register', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'detalle/update/(:num)', 'DetalleFamiliarController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('detalle/delete/(:num)', 'DetalleFamiliarController::remove/$1', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'salario/register', 'SalarioController::register', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'salario/update/(:num)', 'SalarioController::upgrade/$1', ['filter' => 'authGuard']);
$routes->get('salario/delete/(:num)', 'SalarioController::remove/$1', ['filter' => 'authGuard']);


$routes->match(['get', 'post'], 'documento/register', 'DocumentoController::register');
$routes->match(['get', 'post'], 'documento/update/(:num)', 'DocumentoController::upgrade/$1');
$routes->get('documento/delete/(:num)', 'DocumentoController::remove/$1', ['filter' => 'authGuard']);

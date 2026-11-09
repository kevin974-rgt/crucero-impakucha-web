<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/nosotros', 'Home::nosotros');
$routes->get('/servicios', 'Home::servicios');
$routes->get('/galeria', 'Home::galeria');
$routes->get('/contacto', 'Home::contacto');
$routes->post('/enviarMensaje', 'Home::enviarMensaje');


$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/autenticar', 'Admin::autenticar');
$routes->get('/admin/panel', 'Admin::panel');
$routes->get('/admin/cerrarSesion', 'Admin::cerrarSesion');



// Rutas del panel admin (las acciones que modifican datos van por POST)
$routes->get('/admin/mensajes', 'Admin::mensajes');
$routes->post('/admin/eliminarMensaje/(:num)', 'Admin::eliminarMensaje/$1');


$routes->get('/admin/reservas', 'Admin::reservas');
$routes->post('/admin/aprobarReserva/(:num)', 'Admin::aprobarReserva/$1');
$routes->post('/admin/rechazarReserva/(:num)', 'Admin::rechazarReserva/$1');
$routes->post('/admin/eliminarReserva/(:num)', 'Admin::eliminarReserva/$1');


$routes->get('/admin/testimonios', 'Admin::testimonios');
$routes->post('/admin/aprobarTestimonio/(:num)', 'Admin::aprobarTestimonio/$1');
$routes->post('/admin/rechazarTestimonio/(:num)', 'Admin::rechazarTestimonio/$1');
$routes->post('/admin/eliminarTestimonio/(:num)', 'Admin::eliminarTestimonio/$1');


$routes->get('/reservas', 'Home::reservas');
$routes->post('/enviarReserva', 'Home::enviarReserva');
$routes->get('/testimonios', 'Home::testimonios');
$routes->post('/enviarTestimonio', 'Home::enviarTestimonio');

$routes->post('/enviarContacto', 'Home::enviarContacto');


$routes->get('/admin/galeria', 'Admin::galeria');
$routes->post('/admin/subirArchivo', 'Admin::subirArchivo');
$routes->post('/admin/eliminarArchivo/(:num)', 'Admin::eliminarArchivo/$1');
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('listar', 'Imagenes::index')
;$routes->get('crear', 'Imagenes::crear')
;$routes->post('guardar', 'Imagenes::guardar')
;$routes->get('eliminar/(:num)', 'Imagenes::eliminar/$1')
;$routes->get('editar/(:num)', 'Imagenes::editar/$1');
;$routes->post('actualizar', 'Imagenes::actualizar');
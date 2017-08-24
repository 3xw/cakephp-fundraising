<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::prefix('admin', function (RouteBuilder $routes) {
	$routes->plugin('Trois/FR', ['path' => '/foundraising'], function (RouteBuilder $routes) {
		$routes->connect('/', ['controller' => 'Donations', 'action' => 'index'], ['routeClass' => DashedRoute::class]);
		$routes->fallbacks(DashedRoute::class);
	});
});

/*
Router::plugin('Trois/FR', ['path' => '/foundraising'], function (RouteBuilder $routes) {
  $routes->connect('/:controller');
  //$routes->fallbacks('DashedRoute');
});
*/

<?php
include('savant/Savant3.php');

//Include a PageError class which can be used later. You supply this class.
include('php-router/php-router.php');

//Create a new instance of Router (you'd likely use a factory or container to
// manage the instance)
$router = new Router;

//Get an instance of Dispatcher
$dispatcher = new Dispatcher;
$dispatcher->setClassPath('controllers');


$home_route = new Route( '/home' );
$home_route->setMapClass( 'home' )->setMapMethod( 'index' );
$router->addRoute( 'home', $home_route );

//Set up a 'catch all' default route and add it to the Router.
//You may want to set up an external file, define your routes there, and
// and include that file in place of this code block.
$std_route = new Route('/:class/:method/:id');
$std_route->addDynamicElement(':class', ':class')
          ->addDynamicElement(':method', ':method')
          ->addDynamicElement(':id', ':id');
$router->addRoute( 'std', $std_route );

//Set up your default route:
$default_route = new Route('/');
$default_route->setMapClass('default')->setMapMethod('index');
$router->addRoute( 'default', $default_route );

$url = urldecode($_SERVER['REQUEST_URI']);

try {
    $found_route = $router->findRoute($url);
    $dispatcher->dispatch( $found_route );
} catch (Exception $e){
    echo "you're dumb";
} 

<?php
//Include a PageError class which can be used later. You supply this class.
include('PageError.php');
include('php-router.php');

//Create a new instance of Router (you'd likely use a factory or container to
// manage the instance)
$router = new Router;


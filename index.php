<?php 

require("vendor/autoload.php");
require_once "config.php";


$router = new Router($_GET); // Get all url parameters
$controller = $router->createController();

if($controller){
	$controller->runAction();
}


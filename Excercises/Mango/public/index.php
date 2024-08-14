<?php
require_once __DIR__."/../vendor/autoload.php";

//checking route and redirect
$routes = require_once __DIR__."/../routes/web.php";
$request = explode('?',$_SERVER['REQUEST_URI'])[0];

if(isset($routes["$request"])){
	$controller = $routes["$request"][0] ?? null;
	$action = $routes["$request"][1] ?? null;
	
	//[$controller,$action] = $routes["$request"] ?? [null,null];
	
	if($controller && $action){
	$newController = new $controller();
	$newController->$action();
	}
}else{
	//throw new exception("404 Not Found"); 
	echo "404 Not Found"; 
}
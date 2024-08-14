<?php
function redirect($location=null){
header("Location:{$location}");
}
function view($view,$data=[]){
	extract($data);
	require __DIR__."/../resources/views/{$view}.php";
} 
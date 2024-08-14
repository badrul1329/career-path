<?php
use App\Controllers\BookController;
 
return [
	"/" => ["App\Controllers\Controller"],
	"/book" => ["App\Controllers\BookController","index"],
	"/book/edit" => [BookController::class,"edit"]
];
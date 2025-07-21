<?php

use App\Route;

// require_once "src/Route.php";

$route = new Route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

$route->handle();
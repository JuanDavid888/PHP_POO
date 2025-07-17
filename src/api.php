<?php
require_once "src/route.php";


$route = new Route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

$route->handle();
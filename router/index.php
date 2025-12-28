<?php

$routes = require base("router/routes.php");

$path = $_SERVER["REQUEST_URI"];
$url = parse_url($path)["path"];

if(array_key_exists($url, $routes)) {
    require base($routes[$url]);
}
<?php

require_once "router/Router.php";
$router = new Router;

require "router/routes.php";
require "bootstrapClasses.php";

$uri = htmlspecialchars(trim($_SERVER['REQUEST_URI'], '/'));

require $router->direct($uri);
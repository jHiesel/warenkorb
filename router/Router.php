<?php

class Router
{
    protected $routes = [];

    public function define($route)
    {
        $this->routes = $route;
    }

    public function direct($uri)
    {

            if (array_key_exists($uri, $this->routes)) {
                return $this->routes[$uri];
            } else {
                throw new Exception('Die Rute ' . $uri . ' wurde nicht Gefunden');
            }

    }
}
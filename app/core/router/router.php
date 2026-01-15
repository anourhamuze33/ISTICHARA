<?php
class Router{

    private static array $routes = [];
    public static function getRoutes($path, $controller)
    {
        self::$routes[$path]=$controller;
    } 

    public static function dispatch()
    {
        $url = $_GET['url'] ?? "";
        if(isset(self::$routes[$url])){
            $controller = self::$routes[$url];
            require_once "$controller";
        } else {
            echo "error page not found 404";
        }
    }
}

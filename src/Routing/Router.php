<?php
namespace MeuPHP\Routing;

class Router {
    protected static array $routes = [];

    public static function get($uri, $action) {
        self::$routes['GET'][$uri] = $action;
    }

    public static function dispatch() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $action = self::$routes[$method][$uri] ?? null;

        if ($action) {
            [$controller, $method] = explode('@', $action);
            $controller = "\\App\\Controllers\\" . $controller;
            echo call_user_func([new $controller, $method]);
        } else {
            http_response_code(404);
            echo "Página não encontrada.";
        }
    }
}

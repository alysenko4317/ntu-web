<?php

namespace Framework;

class Router {

    private $routes;

    private static $instance;

    private function __construct()
    {
        $this->routes = require BASE_PATH . '/config/routes.php';
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Router();
        }

        return self::$instance;
    }

    public function init() {
        $uri = $_SERVER["REQUEST_URI"];

        $segment = $uri;

        if (strpos($uri, "?") !== false) {
            $segment = explode("?", $uri)[0];
        }

        $segment = trim($segment, "/");

        if (!isset($this->routes[$_SERVER["REQUEST_METHOD"]])) {
            return;
        }

        $routes = $this->routes[$_SERVER["REQUEST_METHOD"]];

        for ($i = 0, $count = count($routes); $i < $count; $i++) {
            if (preg_match("#^" . $routes[$i]["uri"] . "$#", $segment)) {
                $params = $routes[$i]["params"];

                if (strpos($params, "$") !== false) {
                    $params = preg_replace("#^" . $routes[$i]["uri"] . "$#", $params, $segment);
                    $params = explode("/", $params);
                } else {
                    $params = [];
                }

                $class = $routes[$i]["controller"];

                $controller = new $class();

                if (!method_exists($controller, $routes[$i]["action"])) {
                    return;
                }

                call_user_func_array([$controller, $routes[$i]["action"]], $params);
            }
        }
    }
}

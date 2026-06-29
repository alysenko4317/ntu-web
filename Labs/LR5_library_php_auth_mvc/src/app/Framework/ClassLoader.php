<?php

namespace Framework;

class ClassLoader {

    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new ClassLoader();
        }

        return self::$instance;
    }

    public function init() {
        spl_autoload_register([self::$instance, "load"]);
    }

    public function load($name) {
        $filePath = BASE_PATH . "/app/" . str_replace("\\", "/", $name) . ".php";

        if (file_exists($filePath)) {
            include_once($filePath);
        }
    }
}

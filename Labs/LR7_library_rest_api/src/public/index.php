<?php

// Точка входу (Front Controller).
// public/ — кореневий каталог веб-сервера (DocumentRoot).
// app/   — PHP-застосунок, недоступний напряму через URL.
// config/— конфігурація маршрутів та бази даних.

define('BASE_PATH', dirname(__DIR__));

include_once(BASE_PATH . "/app/Framework/ClassLoader.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

\Framework\ClassLoader::getInstance()->init();

\Framework\Router::getInstance()->init();

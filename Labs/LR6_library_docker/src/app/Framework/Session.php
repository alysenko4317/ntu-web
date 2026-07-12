<?php

namespace Framework;

class Session {

    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public static function destroy() {
        session_start();
        session_unset();
        session_destroy();
    }

    public static function regenerate() {
        session_regenerate_id(true);
    }

    public static function setCookieParams($lifetime = 3600, $path = "/", $domain = "", $secure = false, $httponly = true) {
        session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);
    }
}

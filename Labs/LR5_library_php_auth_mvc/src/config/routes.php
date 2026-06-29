<?php

return [
    "GET" => [
        [
            "uri" => "",
            "controller" => "\\Controller\\HomeController",
            "action" => "index",
            "params" => "",
        ],
        [
            "uri" => "about",
            "controller" => "\\Controller\\AboutController",
            "action" => "index",
            "params" => "",
        ],
        [
            "uri" => "details",
            "controller" => "\\Controller\\AboutController",
            "action" => "details",
            "params" => "",
        ],
        [
            "uri" => "login",
            "controller" => "\\Controller\\ReaderController",
            "action" => "login",
            "params" => "",
        ],
        [
            "uri" => "register",
            "controller" => "\\Controller\\ReaderController",
            "action" => "register",
            "params" => "",
        ],
        [
            "uri" => "cabinet",
            "controller" => "\\Controller\\ReaderController",
            "action" => "cabinet",
            "params" => "",
        ],
        [
            "uri" => "logout",
            "controller" => "\\Controller\\ReaderController",
            "action" => "logout",
            "params" => "",
        ],
        [
            "uri" => "forgot-password",
            "controller" => "\\Controller\\ReaderController",
            "action" => "forgotPassword",
            "params" => "",
        ],
        [
            "uri" => "reset-password",
            "controller" => "\\Controller\\ReaderController",
            "action" => "resetPassword",
            "params" => "",
        ],
    ],
    "POST" => [
        [
            "uri" => "login",
            "controller" => "\\Controller\\ReaderController",
            "action" => "loginPost",
            "params" => "",
        ],
        [
            "uri" => "register",
            "controller" => "\\Controller\\ReaderController",
            "action" => "registerPost",
            "params" => "",
        ],
        [
            "uri" => "forgot-password",
            "controller" => "\\Controller\\ReaderController",
            "action" => "forgotPasswordPost",
            "params" => "",
        ],
        [
            "uri" => "reset-password",
            "controller" => "\\Controller\\ReaderController",
            "action" => "resetPasswordPost",
            "params" => "",
        ],
    ],
];

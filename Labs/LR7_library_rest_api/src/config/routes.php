<?php

return [
    // ==================== HTML-сторінки (з ЛР6) ====================
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

        // ==================== REST API (ЛР7) ====================
        [
            "uri" => "api/books",
            "controller" => "\\Controller\\Api\\BookApiController",
            "action" => "index",
            "params" => "",
        ],
        [
            "uri" => "api/books/(\\d+)",
            "controller" => "\\Controller\\Api\\BookApiController",
            "action" => "show",
            "params" => "$1",
        ],
        [
            "uri" => "api/readers",
            "controller" => "\\Controller\\Api\\ReaderApiController",
            "action" => "index",
            "params" => "",
        ],
        [
            "uri" => "api/readers/(\\d+)",
            "controller" => "\\Controller\\Api\\ReaderApiController",
            "action" => "show",
            "params" => "$1",
        ],
        [
            "uri" => "api/rooms",
            "controller" => "\\Controller\\Api\\RoomApiController",
            "action" => "index",
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

        // REST API: створення книги
        [
            "uri" => "api/books",
            "controller" => "\\Controller\\Api\\BookApiController",
            "action" => "store",
            "params" => "",
        ],
    ],

    // REST API: оновлення книги
    "PUT" => [
        [
            "uri" => "api/books/(\\d+)",
            "controller" => "\\Controller\\Api\\BookApiController",
            "action" => "update",
            "params" => "$1",
        ],
    ],

    // REST API: видалення книги
    "DELETE" => [
        [
            "uri" => "api/books/(\\d+)",
            "controller" => "\\Controller\\Api\\BookApiController",
            "action" => "destroy",
            "params" => "$1",
        ],
    ],
];

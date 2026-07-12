<?php

/**
 * Конфігурація підключення до бази даних.
 * Значення зчитуються зі змінних оточення Docker-контейнера.
 * Якщо змінна не задана — використовується значення за замовчуванням.
 */
return [
    'host'     => getenv('DB_HOST')     ?: 'db',
    'port'     => getenv('DB_PORT')     ?: '3306',
    'database' => getenv('DB_NAME')     ?: 'library',
    'username' => getenv('DB_USER')     ?: 'library_user',
    'password' => getenv('DB_PASSWORD') ?: 'library_pass',
    'charset'  => 'utf8mb4',
];

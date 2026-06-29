<?php

function startAppSession(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function isLoggedIn(): bool
{
    startAppSession();

    return isset($_SESSION['user_email']) && $_SESSION['user_email'] !== '';
}

function currentUserEmail(): ?string
{
    startAppSession();

    return $_SESSION['user_email'] ?? null;
}

function loginUser(string $email): void
{
    startAppSession();

    // Оновлюємо ідентифікатор сесії після успішного входу.
    session_regenerate_id(true);

    $_SESSION['user_email'] = $email;
}

function logoutUser(): void
{
    startAppSession();

    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    session_destroy();
}

function requireLogin(): void
{
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

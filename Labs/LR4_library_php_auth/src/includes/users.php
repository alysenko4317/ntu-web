<?php

require_once __DIR__ . '/helpers.php';

function usersFilePath(): string
{
    return __DIR__ . '/../data/users.json';
}

function normalizeEmail(string $email): string
{
    return mb_strtolower(trim($email), 'UTF-8');
}

function normalizeTicket(string $ticket): string
{
    return mb_strtoupper(trim($ticket), 'UTF-8');
}

function loadUsers(): array
{
    $file = usersFilePath();

    if (!file_exists($file)) {
        return [];
    }

    $json = file_get_contents($file);

    if ($json === false || trim($json) === '') {
        return [];
    }

    $users = json_decode($json, true);

    return is_array($users) ? $users : [];
}

function saveUsers(array $users): void
{
    $file = usersFilePath();
    $dir = dirname($file);

    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }

    $json = json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    file_put_contents($file, $json . PHP_EOL, LOCK_EX);
}

function findUserByEmail(string $email): ?array
{
    $email = normalizeEmail($email);

    foreach (loadUsers() as $user) {
        if (normalizeEmail($user['email'] ?? '') === $email) {
            return $user;
        }
    }

    return null;
}

function findUserByTicket(string $ticket): ?array
{
    $ticket = normalizeTicket($ticket);

    foreach (loadUsers() as $user) {
        if (normalizeTicket($user['ticket'] ?? '') === $ticket) {
            return $user;
        }
    }

    return null;
}

function findUserByLogin(string $login): ?array
{
    $login = trim($login);

    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        return findUserByEmail($login);
    }

    return findUserByTicket($login);
}

function saveUser(array $user): void
{
    $users = loadUsers();
    $users[] = $user;

    saveUsers($users);
}

<?php

namespace Controller\Api;

/**
 * Базовий контролер для REST API.
 *
 * На відміну від звичайного Controller (який рендерить HTML-шаблони),
 * ApiController повертає JSON-відповіді з відповідними HTTP-кодами.
 */
class ApiController {

    /**
     * Надіслати JSON-відповідь із заданим HTTP-кодом.
     */
    protected function json($data, int $statusCode = 200): void {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }

    /**
     * Прочитати JSON-тіло запиту (для POST / PUT).
     */
    protected function getJsonInput(): array {
        $raw = file_get_contents('php://input');
        $data = json_decode($raw, true);
        return is_array($data) ? $data : [];
    }

    /**
     * Відповідь 404 Not Found.
     */
    protected function notFound(string $message = 'Not found'): void {
        $this->json(['error' => $message], 404);
    }

    /**
     * Відповідь 400 Bad Request.
     */
    protected function badRequest(string $message = 'Bad request'): void {
        $this->json(['error' => $message], 400);
    }

    /**
     * Відповідь 204 No Content (для DELETE).
     */
    protected function noContent(): void {
        http_response_code(204);
        header('Content-Type: application/json');
        exit();
    }
}

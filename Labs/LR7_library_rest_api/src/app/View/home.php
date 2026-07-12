<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна — Library Base REST API</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/">
            <span class="logo-mark">LB</span>
            <span>Library Base API</span>
        </a>
        <button class="nav-toggle" type="button" aria-label="Відкрити меню">☰</button>
        <nav class="site-nav">
            <a class="nav-link active" href="/">Головна</a>
            <a class="nav-link" href="/about">Про проєкт</a>
            <a class="nav-link" href="/details">Структура</a>
        </nav>
        <div class="auth-links">
            <?php if ($isLoggedIn): ?>
                <a class="btn btn-outline" href="/cabinet">Кабінет</a>
                <a class="btn btn-primary" href="/logout">Вийти</a>
            <?php else: ?>
                <a class="btn btn-outline" href="/login">Увійти</a>
                <a class="btn btn-primary" href="/register">Реєстрація</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<main>

<section class="hero">
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">Навчальний проєкт</p>
            <h1>Електронна бібліотека — REST API</h1>
            <p class="lead">
                PHP-застосунок із ЛР6, доповнений REST API для книг, читачів та залів.
                Swagger UI для інтерактивного тестування ендпоінтів.
            </p>
            <div class="hero-actions">
                <?php if ($isLoggedIn): ?>
                    <a class="btn btn-primary" href="/cabinet">Відкрити кабінет</a>
                <?php else: ?>
                    <a class="btn btn-primary" href="/register">Створити профіль</a>
                <?php endif; ?>
                <a class="btn btn-outline" href="http://localhost:8088" target="_blank">Swagger UI</a>
            </div>
        </div>
        <div class="hero-panel">
            <h2>Що нового у ЛР7?</h2>
            <ul class="check-list">
                <li>REST API — GET, POST, PUT, DELETE</li>
                <li>ApiController — базовий контролер API</li>
                <li>BookApiController — повний CRUD книг</li>
                <li>OpenAPI 3.0 специфікація</li>
                <li>Swagger UI у Docker Compose</li>
            </ul>
        </div>
    </div>
</section>

<section class="container section">
    <div class="section-header">
        <div>
            <p class="eyebrow">Каталог</p>
            <h2>Топ книг бібліотеки</h2>
        </div>
        <span class="muted"><?= count($books) ?> книг</span>
    </div>
    <div class="book-grid">
        <?php foreach ($books as $book): ?>
            <article class="book-card">
                <div class="book-cover"><?= htmlspecialchars($book->code) ?></div>
                <div class="book-info">
                    <h3><?= htmlspecialchars($book->name) ?></h3>
                    <p>
                        <?php if (!empty($book->authors)): ?>
                            <?php
                                $names = array_map(function($a) {
                                    return htmlspecialchars($a->firstName . ' ' . $a->lastName);
                                }, $book->authors);
                                echo implode(', ', $names);
                            ?>
                        <?php else: ?>
                            <em>автор не зазначений</em>
                        <?php endif; ?>
                    </p>
                    <p class="muted"><?= htmlspecialchars($book->releaseDate ?: '—') ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="container section two-columns">
    <div class="card">
        <h2>REST API ендпоінти</h2>
        <p>
            <code>GET /api/books</code> — список книг<br>
            <code>POST /api/books</code> — створити книгу<br>
            <code>PUT /api/books/{id}</code> — оновити книгу<br>
            <code>DELETE /api/books/{id}</code> — видалити книгу<br>
            <code>GET /api/readers</code> — список читачів<br>
            <code>GET /api/rooms</code> — зали бібліотеки
        </p>
    </div>
    <div class="card">
        <h2>Тестування API</h2>
        <p>Swagger UI доступний за адресою <a href="http://localhost:8088" target="_blank">localhost:8088</a>.
           Через нього можна інтерактивно викликати всі ендпоінти, переглядати відповіді та документацію API.</p>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <strong>Library Base API</strong>
            <p>Навчальний PHP-сайт із REST API для лабораторної роботи №7.</p>
        </div>
        <div>
            <strong>Розділи</strong>
            <a href="/about">Про проєкт</a>
            <a href="/details">Структура</a>
        </div>
        <div>
            <strong>Стек</strong>
            <p>Docker Compose, PHP/Apache, MySQL, PDO, REST API, Swagger.</p>
        </div>
    </div>
</footer>

</body>
</html>

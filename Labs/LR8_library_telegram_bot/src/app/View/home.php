<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна — Library Base + Telegram Bot</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/">
            <span class="logo-mark">LB</span>
            <span>Library Base Bot</span>
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
            <h1>Електронна бібліотека — Telegram Bot</h1>
            <p class="lead">
                PHP-застосунок із REST API (ЛР7), інтегрований з Telegram-ботом на Python.
                Чотири Docker-контейнери в одній композиції.
            </p>
            <div class="hero-actions">
                <?php if ($isLoggedIn): ?>
                    <a class="btn btn-primary" href="/cabinet">Відкрити кабінет</a>
                <?php else: ?>
                    <a class="btn btn-primary" href="/register">Створити профіль</a>
                <?php endif; ?>
                <a class="btn btn-outline" href="/details">Структура проєкту</a>
            </div>
        </div>
        <div class="hero-panel">
            <h2>Що нового у ЛР8?</h2>
            <ul class="check-list">
                <li>Telegram-бот на Python</li>
                <li>Команди: /books, /book, /rooms</li>
                <li>HTTP-клієнт до REST API</li>
                <li>4 сервіси в Docker Compose</li>
                <li>Міжсервісна взаємодія через мережу</li>
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
        <h2>Telegram-бот</h2>
        <p>Бот отримує дані через REST API застосунку. Команда <code>/books</code> викликає <code>GET /api/books</code>, форматує відповідь і надсилає у Telegram.</p>
    </div>
    <div class="card">
        <h2>Архітектура</h2>
        <p>Чотири контейнери: <code>app</code> (PHP), <code>db</code> (MySQL), <code>bot</code> (Python), <code>swagger</code> (UI). Бот спілкується з app через внутрішню Docker-мережу.</p>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <strong>Library Base Bot</strong>
            <p>Навчальний PHP-сайт + Telegram-бот для лабораторної роботи №8.</p>
        </div>
        <div>
            <strong>Розділи</strong>
            <a href="/about">Про проєкт</a>
            <a href="/details">Структура</a>
        </div>
        <div>
            <strong>Стек</strong>
            <p>Docker Compose, PHP/Apache, MySQL, Python, Telegram Bot API.</p>
        </div>
    </div>
</footer>

</body>
</html>

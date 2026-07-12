<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна — Library Base Docker</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/">
            <span class="logo-mark">LB</span>
            <span>Library Base Docker</span>
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
            <h1>Електронна бібліотека — Docker + MySQL</h1>
            <p class="lead">
                PHP-застосунок із ЛР5, контейнеризований за допомогою Docker Compose.
                Дані зберігаються у MySQL замість JSON-файлів.
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
            <h2>Що нового у ЛР6?</h2>
            <ul class="check-list">
                <li>Dockerfile для PHP/Apache</li>
                <li>Docker Compose: app + MySQL</li>
                <li>PDO-підключення до бази даних</li>
                <li>Repository → SQL замість JSON</li>
                <li>init.sql — автоматична ініціалізація БД</li>
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
        <h2>Що змінилось?</h2>
        <p>Репозиторії тепер виконують SQL-запити через PDO замість читання JSON-файлів. Контролери та сервіси залишились без змін — саме це демонструє перевагу шарової архітектури.</p>
    </div>
    <div class="card">
        <h2>Контейнеризація</h2>
        <p>Весь проєкт запускається однією командою <code>docker compose up --build</code>. PHP/Apache та MySQL працюють у окремих контейнерах, з'єднаних Docker-мережею.</p>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <strong>Library Base Docker</strong>
            <p>Навчальний PHP-сайт, контейнеризований для лабораторної роботи №6.</p>
        </div>
        <div>
            <strong>Розділи</strong>
            <a href="/about">Про проєкт</a>
            <a href="/details">Структура</a>
        </div>
        <div>
            <strong>Стек</strong>
            <p>Docker Compose, PHP/Apache, MySQL, PDO.</p>
        </div>
    </div>
</footer>

</body>
</html>

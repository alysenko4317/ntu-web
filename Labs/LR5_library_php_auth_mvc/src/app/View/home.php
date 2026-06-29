<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна — Library Base MVC</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/">
            <span class="logo-mark">LB</span>
            <span>Library Base MVC</span>
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
            <h1>Електронна бібліотека — MVC-архітектура</h1>
            <p class="lead">
                PHP-версія сайту, реорганізована за шаблоном Model–View–Controller.
                Маршрутизатор, автозавантаження, сервісний шар і JSON-сховище.
            </p>
            <div class="hero-actions">
                <?php if ($isLoggedIn): ?>
                    <a class="btn btn-primary" href="/cabinet">Відкрити кабінет</a>
                <?php else: ?>
                    <a class="btn btn-primary" href="/register">Створити профіль</a>
                <?php endif; ?>
                <a class="btn btn-outline" href="/details">Структура MVC</a>
            </div>
        </div>
        <div class="hero-panel">
            <h2>Що реалізовано?</h2>
            <ul class="check-list">
                <li>Front Controller + маршрутизатор</li>
                <li>Автозавантаження класів (PSR-подібне)</li>
                <li>Controller → Service → Repository</li>
                <li>JSON-сховище користувачів і книг</li>
                <li>Авторизація, сесії, захищений кабінет</li>
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
        <p>Код більше не розкиданий по окремих PHP-файлах. Контролери обробляють запити, сервіси містять бізнес-логіку, репозиторії працюють із JSON-сховищем.</p>
    </div>
    <div class="card">
        <h2>Що залишилось?</h2>
        <p>HTML-структура, CSS-оформлення та JavaScript з попередніх лабораторних робіт збережено у каталозі <code>public/</code>.</p>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <strong>Library Base MVC</strong>
            <p>Навчальний PHP-сайт, реорганізований за шаблоном MVC для лабораторної роботи №5.</p>
        </div>
        <div>
            <strong>Розділи</strong>
            <a href="/about">Про проєкт</a>
            <a href="/details">Структура</a>
        </div>
        <div>
            <strong>MVC-версія</strong>
            <p>Front Controller, маршрутизатор, Controller → Service → Repository → JSON.</p>
        </div>
    </div>
</footer>

</body>
</html>

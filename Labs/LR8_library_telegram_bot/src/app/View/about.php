<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Про проєкт — Library Base + Telegram Bot</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base Bot</span></a>
        <button class="nav-toggle" type="button" aria-label="Відкрити меню">☰</button>
        <nav class="site-nav">
            <a class="nav-link" href="/">Головна</a>
            <a class="nav-link active" href="/about">Про проєкт</a>
            <a class="nav-link" href="/details">Структура</a>
        </nav>
        <div class="auth-links">
            <a class="btn btn-outline" href="/login">Увійти</a>
            <a class="btn btn-primary" href="/register">Реєстрація</a>
        </div>
    </div>
</header>

<main>

<section class="page-title">
    <div class="container">
        <p class="eyebrow">Про проєкт</p>
        <h1>Library Base — Telegram Bot</h1>
        <p>Інтеграція PHP-застосунку з Telegram-ботом через REST API.</p>
    </div>
</section>

<section class="container section">
    <div class="two-columns">
        <div class="card">
            <h2>Еволюція проєкту</h2>
            <p><strong>ЛР4:</strong> PHP-файли → JSON<br>
               <strong>ЛР5:</strong> Controller → Service → Repository → JSON<br>
               <strong>ЛР6:</strong> Docker Compose + MySQL<br>
               <strong>ЛР7:</strong> + REST API + Swagger<br>
               <strong>ЛР8:</strong> + Telegram-бот (Python)</p>
            <p>Кожна наступна робота додає новий компонент, не змінюючи попередні. Бот використовує API з ЛР7, яке використовує репозиторії з ЛР6.</p>
        </div>
        <div class="card">
            <h2>Як працює бот?</h2>
            <p>Python-скрипт працює у власному Docker-контейнері. Він підключається до Telegram Bot API через long polling та обробляє команди користувачів.</p>
            <p>Для отримання даних бот надсилає HTTP-запити до PHP-застосунку через внутрішню Docker-мережу: <code>http://app:80/api/books</code>.</p>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base Bot</strong><p>Навчальний PHP-сайт (ЛР8).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/details">Структура</a></div>
        <div><strong>Стек</strong><p>Docker Compose, PHP, MySQL, Python, Telegram Bot API</p></div>
    </div>
</footer>

</body>
</html>

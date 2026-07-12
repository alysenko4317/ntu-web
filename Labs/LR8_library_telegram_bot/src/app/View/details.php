<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Структура — Library Base + Telegram Bot</title>
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
            <a class="nav-link" href="/about">Про проєкт</a>
            <a class="nav-link active" href="/details">Структура</a>
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
        <p class="eyebrow">Архітектура</p>
        <h1>Структура проєкту з Telegram-ботом</h1>
        <p>Порівняно з ЛР7: додано каталог <code>bot/</code> з Python-ботом і четвертий Docker-сервіс.</p>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
<pre style="margin:0; font-size:13px; line-height:1.5;">
my_site_bot/
├── docker-compose.yml           — 4 сервіси: app + db + bot + swagger
├── Dockerfile                   — PHP/Apache (з ЛР7)
├── .env                         — TELEGRAM_BOT_TOKEN (не в Git!)
│
├── bot/                         — НОВИЙ: Telegram-бот (Python)
│   ├── Dockerfile               — python:3.11-slim
│   ├── requirements.txt         — python-telegram-bot, requests
│   ├── bot.py                   — точка входу, реєстрація команд
│   ├── commands/
│   │   ├── start.py             — /start, /help
│   │   ├── books.py             — /books, /book {id}
│   │   └── rooms.py             — /rooms
│   └── services/
│       └── api_client.py        — HTTP-клієнт до REST API
│
├── swagger/
│   └── openapi.yaml             — OpenAPI специфікація (з ЛР7)
├── database/
│   └── init.sql                 — DDL + дані (з ЛР6)
│
└── src/                         — PHP-застосунок (з ЛР7)
    ├── app/
    │   ├── Controller/
    │   │   ├── Controller.php, Home/About/ReaderController
    │   │   └── Api/
    │   │       ├── ApiController.php
    │   │       ├── BookApiController.php
    │   │       ├── ReaderApiController.php
    │   │       └── RoomApiController.php
    │   ├── Service/, Repository/, Model/, Framework/
    │   └── View/
    ├── config/
    └── public/
</pre>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
        <h2>Взаємодія компонентів</h2>
        <div class="timeline">
            <div class="timeline-item"><span>1</span><div><h3>Користувач → Telegram</h3><p>Користувач надсилає команду <code>/books</code> боту в Telegram.</p></div></div>
            <div class="timeline-item"><span>2</span><div><h3>Telegram → Bot (Python)</h3><p>Telegram Bot API передає повідомлення Python-боту через long polling.</p></div></div>
            <div class="timeline-item"><span>3</span><div><h3>Bot → REST API (PHP)</h3><p>Бот надсилає <code>GET http://app:80/api/books</code> через внутрішню Docker-мережу.</p></div></div>
            <div class="timeline-item"><span>4</span><div><h3>PHP → MySQL</h3><p>PHP-застосунок виконує SQL-запит через PDO і повертає JSON.</p></div></div>
            <div class="timeline-item"><span>5</span><div><h3>Bot → Telegram → Користувач</h3><p>Бот форматує відповідь і надсилає повідомлення з книгами у Telegram.</p></div></div>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base Bot</strong><p>Навчальний PHP-сайт (ЛР8).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/about">Про проєкт</a></div>
        <div><strong>Стек</strong><p>Docker Compose, PHP, MySQL, Python, Telegram Bot API</p></div>
    </div>
</footer>

</body>
</html>

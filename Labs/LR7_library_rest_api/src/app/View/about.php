<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Про проєкт — Library Base REST API</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base API</span></a>
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
        <h1>Library Base — REST API</h1>
        <p>Навчальний PHP-сайт із ЛР6, доповнений REST API та документацією Swagger.</p>
    </div>
</section>

<section class="container section">
    <div class="two-columns">
        <div class="card">
            <h2>Еволюція проєкту</h2>
            <p><strong>ЛР4:</strong> PHP-файли → JSON<br>
               <strong>ЛР5:</strong> Controller → Service → Repository → JSON<br>
               <strong>ЛР6:</strong> Controller → Service → Repository → MySQL (Docker)<br>
               <strong>ЛР7:</strong> + REST API контролери + Swagger UI</p>
            <p>Завдяки шаровій архітектурі, додавання API потребувало лише нових контролерів — репозиторії та сервіси використовуються без змін.</p>
        </div>
        <div class="card">
            <h2>Що таке REST API?</h2>
            <p><strong>REST</strong> (Representational State Transfer) — архітектурний стиль взаємодії клієнта і сервера через HTTP-методи:</p>
            <ul>
                <li><strong>GET</strong> — отримання даних</li>
                <li><strong>POST</strong> — створення ресурсу</li>
                <li><strong>PUT</strong> — оновлення ресурсу</li>
                <li><strong>DELETE</strong> — видалення ресурсу</li>
            </ul>
            <p>API повертає дані у форматі JSON.</p>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base API</strong><p>Навчальний PHP-сайт (ЛР7).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/details">Структура</a></div>
        <div><strong>Стек</strong><p>Docker Compose, PHP/Apache, MySQL, REST API, Swagger</p></div>
    </div>
</footer>

</body>
</html>

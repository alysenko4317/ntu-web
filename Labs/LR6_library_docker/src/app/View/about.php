<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Про проєкт — Library Base Docker</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base Docker</span></a>
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
        <h1>Library Base — Docker</h1>
        <p>Навчальний PHP-сайт із ЛР5, контейнеризований за допомогою Docker і переведений на MySQL.</p>
    </div>
</section>

<section class="container section">
    <div class="two-columns">
        <div class="card">
            <h2>Еволюція проєкту</h2>
            <p><strong>ЛР4:</strong> PHP-файли → JSON<br>
               <strong>ЛР5:</strong> Controller → Service → Repository → JSON<br>
               <strong>ЛР6:</strong> Controller → Service → Repository → MySQL</p>
            <p>Завдяки шаровій архітектурі з ЛР5, перехід на базу даних торкнувся лише Repository-шару. Контролери, сервіси та View залишились без змін.</p>
        </div>
        <div class="card">
            <h2>Docker Compose</h2>
            <p>Два контейнери — <code>app</code> (PHP/Apache) та <code>db</code> (MySQL 8.0) — запускаються однією командою. Дані бази зберігаються у Docker Volume і не втрачаються після перезапуску.</p>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base Docker</strong><p>Навчальний PHP-сайт (ЛР6).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/details">Структура</a></div>
        <div><strong>Стек</strong><p>Docker Compose, PHP/Apache, MySQL, PDO</p></div>
    </div>
</footer>

</body>
</html>

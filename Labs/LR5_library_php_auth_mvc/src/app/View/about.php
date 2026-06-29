<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Про проєкт — Library Base MVC</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base MVC</span></a>
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
        <h1>Library Base — MVC</h1>
        <p>Навчальний PHP-сайт, реорганізований за шаблоном Model–View–Controller.</p>
    </div>
</section>

<section class="container section">
    <div class="two-columns">
        <div class="card">
            <h2>Поділ відповідальності</h2>
            <p>Контролери обробляють HTTP-запити, сервіси містять бізнес-логіку, репозиторії працюють зі сховищем даних, а View формують HTML-відповідь.</p>
        </div>
        <div class="card">
            <h2>Спільна основа з ЛР4</h2>
            <p>Функціональність та стилі збережено з попередньої лабораторної. Змінилася внутрішня організація коду, а не зовнішній вигляд сайту.</p>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base MVC</strong><p>Навчальний PHP-сайт (ЛР5).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/details">Структура</a></div>
        <div><strong>MVC</strong><p>Controller → Service → Repository → JSON</p></div>
    </div>
</footer>

</body>
</html>

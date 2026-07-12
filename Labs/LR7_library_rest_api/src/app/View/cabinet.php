<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кабінет — Library Base API</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base API</span></a>
        <nav class="site-nav">
            <a class="nav-link" href="/">Головна</a>
            <a class="nav-link" href="/about">Про проєкт</a>
        </nav>
        <div class="auth-links">
            <a class="btn btn-outline" href="/cabinet">Кабінет</a>
            <a class="btn btn-primary" href="/logout">Вийти</a>
        </div>
    </div>
</header>

<main>

<section class="cabinet-header">
    <div class="container">
        <p class="eyebrow">Захищена сторінка</p>
        <h1>Кабінет, <?= htmlspecialchars($reader->firstName) ?>!</h1>
        <p>Дані профілю завантажені з таблиці <code>reader</code> у MySQL через <code>ReaderRepository</code>.</p>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
        <h2>Дані профілю</h2>
        <dl class="profile-list">
            <dt>Квиток</dt><dd><?= htmlspecialchars($reader->ticket) ?></dd>
            <dt>Ім'я</dt><dd><?= htmlspecialchars($reader->firstName) ?></dd>
            <dt>Прізвище</dt><dd><?= htmlspecialchars($reader->lastName) ?></dd>
            <dt>Дата народження</dt><dd><?= htmlspecialchars($reader->birthday) ?></dd>
            <dt>Телефон</dt><dd><?= htmlspecialchars($reader->phone) ?></dd>
            <dt>Зал</dt><dd><?= htmlspecialchars($reader->roomId) ?></dd>
        </dl>
        <div class="hero-actions">
            <a class="btn btn-outline" href="/">На головну</a>
            <a class="btn btn-primary" href="/logout">Вийти</a>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base API</strong><p>Навчальний PHP-сайт (ЛР7).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/about">Про проєкт</a></div>
        <div><strong>Стек</strong><p>Docker Compose, PHP/Apache, MySQL, REST API, Swagger</p></div>
    </div>
</footer>

</body>
</html>

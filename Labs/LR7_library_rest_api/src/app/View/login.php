<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід — Library Base API</title>
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
            <a class="btn btn-outline" href="/login">Увійти</a>
            <a class="btn btn-primary" href="/register">Реєстрація</a>
        </div>
    </div>
</header>

<main>

<section class="page-title">
    <div class="container">
        <p class="eyebrow">Вхід</p>
        <h1>Вхід до кабінету</h1>
        <p>Авторизація через <code>ReaderController</code> → <code>AuthService</code> → <code>ReaderRepository</code> → MySQL.</p>
    </div>
</section>

<section class="container section narrow">
    <form class="form-card" method="POST" action="/login">
        <?php if (isset($error)): ?>
            <ul class="alert-list"><li><?= htmlspecialchars($error) ?></li></ul>
        <?php endif; ?>

        <div class="form-row">
            <label for="ticket">Номер квитка</label>
            <input type="text" id="ticket" name="ticket" required>
            <span class="field-error"></span>
        </div>
        <div class="form-row">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required minlength="6">
            <span class="field-error"></span>
        </div>
        <button class="btn btn-primary w-100" type="submit">Увійти</button>
        <p class="centered">Немає профілю? <a href="/register">Зареєструватися</a></p>
        <p class="centered"><a href="/forgot-password">Забули пароль?</a></p>
    </form>
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

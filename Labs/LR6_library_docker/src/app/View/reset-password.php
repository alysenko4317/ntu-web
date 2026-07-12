<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новий пароль — Library Base Docker</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base Docker</span></a>
        <nav class="site-nav"><a class="nav-link" href="/">Головна</a></nav>
        <div class="auth-links">
            <a class="btn btn-outline" href="/login">Увійти</a>
        </div>
    </div>
</header>

<main>

<section class="page-title">
    <div class="container">
        <p class="eyebrow">Скидання пароля</p>
        <h1>Новий пароль</h1>
    </div>
</section>

<section class="container section narrow">
    <form class="form-card" method="POST" action="/reset-password">
        <?php if (isset($error)): ?>
            <ul class="alert-list"><li><?= htmlspecialchars($error) ?></li></ul>
        <?php endif; ?>

        <input type="hidden" name="token" value="<?= htmlspecialchars($token ?? '') ?>">
        <div class="form-row">
            <label for="password">Новий пароль</label>
            <input type="password" id="password" name="password" required minlength="6">
            <span class="field-error"></span>
        </div>
        <button class="btn btn-primary w-100" type="submit">Змінити пароль</button>
        <p class="centered"><a href="/login">Повернутися до входу</a></p>
    </form>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base Docker</strong><p>Навчальний PHP-сайт (ЛР6).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/about">Про проєкт</a></div>
        <div><strong>Стек</strong><p>Docker Compose, PHP/Apache, MySQL, PDO</p></div>
    </div>
</footer>

</body>
</html>

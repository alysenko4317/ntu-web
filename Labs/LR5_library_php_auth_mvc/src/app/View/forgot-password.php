<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Забули пароль — Library Base MVC</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base MVC</span></a>
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
        <h1>Забули пароль?</h1>
        <p>Введіть номер квитка. У реальному застосунку посилання надсилається на email.</p>
    </div>
</section>

<section class="container section narrow">
    <form class="form-card" method="POST" action="/forgot-password">
        <?php if (isset($error)): ?>
            <ul class="alert-list"><li><?= htmlspecialchars($error) ?></li></ul>
        <?php endif; ?>

        <?php if (isset($message)): ?>
            <div class="success-box">
                <?= htmlspecialchars($message) ?>
                <?php if (isset($resetLink)): ?>
                    <br><a href="<?= htmlspecialchars($resetLink) ?>"><?= htmlspecialchars($resetLink) ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="form-row">
            <label for="ticket">Номер квитка</label>
            <input type="text" id="ticket" name="ticket" required>
            <span class="field-error"></span>
        </div>
        <button class="btn btn-primary w-100" type="submit">Надіслати</button>
        <p class="centered"><a href="/login">Повернутися до входу</a></p>
    </form>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base MVC</strong><p>Навчальний PHP-сайт (ЛР5).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/about">Про проєкт</a></div>
        <div><strong>MVC</strong><p>Controller → Service → Repository → JSON</p></div>
    </div>
</footer>

</body>
</html>

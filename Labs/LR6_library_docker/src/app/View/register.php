<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація — Library Base Docker</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base Docker</span></a>
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
        <p class="eyebrow">Реєстрація</p>
        <h1>Створення профілю</h1>
        <p>Дані зберігаються у таблиці <code>reader</code> в MySQL (замість <code>users.json</code> у ЛР5).</p>
    </div>
</section>

<section class="container section narrow">
    <form class="form-card" method="POST" action="/register">
        <?php if (isset($error)): ?>
            <ul class="alert-list"><li><?= htmlspecialchars($error) ?></li></ul>
        <?php endif; ?>

        <div class="form-row">
            <label for="ticket">Номер квитка</label>
            <input type="text" id="ticket" name="ticket" required minlength="3">
            <span class="field-error"></span>
        </div>
        <div class="form-row">
            <label for="room_id">Зал бібліотеки</label>
            <select id="room_id" name="room_id" required>
                <option value="">Оберіть зал</option>
                <option value="large">Велика зала</option>
                <option value="middle">Середня зала</option>
                <option value="small">Мала зала</option>
            </select>
            <span class="field-error"></span>
        </div>
        <div class="form-row">
            <label for="first_name">Ім'я</label>
            <input type="text" id="first_name" name="first_name" required minlength="2">
            <span class="field-error"></span>
        </div>
        <div class="form-row">
            <label for="last_name">Прізвище</label>
            <input type="text" id="last_name" name="last_name" required minlength="2">
            <span class="field-error"></span>
        </div>
        <div class="form-row">
            <label for="birthday">Дата народження</label>
            <input type="date" id="birthday" name="birthday" required>
            <span class="field-error"></span>
        </div>
        <div class="form-row">
            <label for="phone">Телефон</label>
            <input type="text" id="phone" name="phone" required>
            <span class="field-error"></span>
        </div>
        <div class="form-row">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required minlength="6">
            <span class="field-error"></span>
        </div>
        <button class="btn btn-primary w-100" type="submit">Зареєструватися</button>
        <p class="centered">Вже маєте профіль? <a href="/login">Увійти</a></p>
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

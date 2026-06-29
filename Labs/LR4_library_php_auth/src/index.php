<?php
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/session.php';

$isLoggedIn = isLoggedIn();
$userEmail = currentUserEmail();
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Головна — Library Base</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js" defer></script>
</head>
<body>

<?php renderHeader('index'); ?>

<main>

<section class="hero">
  <div class="container hero-grid">
    <div>
      <p class="eyebrow">Навчальний проєкт</p>
      <h1>Електронна бібліотека з каталогом книг і формами користувача</h1>
      <p class="lead">
        Це PHP-версія сайту після додавання серверної авторизації.
        Форми реєстрації та входу тепер обробляються на сервері.
      </p>
      <?php if ($isLoggedIn): ?>
        <p class="lead">Ви увійшли як <strong><?= e($userEmail) ?></strong>.</p>
      <?php endif; ?>
      <div class="hero-actions">
        <a class="btn btn-primary" href="catalog.php">Перейти до каталогу</a>
        <?php if ($isLoggedIn): ?>
          <a class="btn btn-outline" href="cabinet.php">Відкрити кабінет</a>
        <?php else: ?>
          <a class="btn btn-outline" href="register.php">Створити читацький профіль</a>
        <?php endif; ?>
      </div>
    </div>
    <div class="hero-panel">
      <h2>Що додано у PHP-версії?</h2>
      <ul class="check-list">
        <li>серверна обробка форми реєстрації;</li>
        <li>серверна перевірка введених даних;</li>
        <li>збереження користувачів у JSON-файлі;</li>
        <li>хешування паролів;</li>
        <li>вхід, вихід і захищений кабінет.</li>
      </ul>
    </div>
  </div>
</section>

<section class="container section">
  <div class="section-header">
    <div>
      <p class="eyebrow">Популярні книги</p>
      <h2>Топ видань бібліотеки</h2>
    </div>
    <a href="catalog.php" class="text-link">Увесь каталог →</a>
  </div>
  <div class="book-grid">
    <article class="book-card">
      <div class="book-cover">PRG-001</div>
      <div class="book-info">
        <span class="badge">Programming</span>
        <h3>Clean Code</h3>
        <p>Robert C. Martin</p>
      </div>
    </article>
    <article class="book-card">
      <div class="book-cover">SWE-014</div>
      <div class="book-info">
        <span class="badge">Software Engineering</span>
        <h3>Design Patterns</h3>
        <p>Erich Gamma et al.</p>
      </div>
    </article>
    <article class="book-card">
      <div class="book-cover">ALG-101</div>
      <div class="book-info">
        <span class="badge">Algorithms</span>
        <h3>Introduction to Algorithms</h3>
        <p>Cormen, Leiserson, Rivest, Stein</p>
      </div>
    </article>
  </div>
</section>

<section class="container section two-columns">
  <div class="card">
    <h2>Що змінилося?</h2>
    <p>Сайт більше не є лише набором HTML-сторінок. PHP-код виконується на сервері, перевіряє дані форм і керує станом авторизації користувача.</p>
  </div>
  <div class="card">
    <h2>Що залишилося?</h2>
    <p>HTML-структура, CSS-оформлення та JavaScript-пошук у каталозі залишилися майже такими самими, як у статичній версії.</p>
  </div>
</section>

</main>

<?php renderFooter(); ?>

</body>
</html>

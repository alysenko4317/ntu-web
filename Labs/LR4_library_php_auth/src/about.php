<?php
require_once __DIR__ . '/includes/layout.php';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Про бібліотеку — Library Base</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js" defer></script>
</head>
<body>

<?php renderHeader('about'); ?>

<main>

<section class="page-title">
  <div class="container">
    <p class="eyebrow">Про бібліотеку</p>
    <h1>Library Base</h1>
    <p>Навчальний сайт умовної бібліотеки, який використовується для поступового додавання серверної логіки.</p>
  </div>
</section>

<section class="container section two-columns">
  <div class="card">
    <h2>Місія</h2>
    <p>Надати студентам зрозумілий приклад багатосторінкового сайту з реалістичною структурою, навігацією, формами та елементами інтерактивності.</p>
  </div>
  <div class="card">
    <h2>Навчальна ідея</h2>
    <p>Спочатку сайт існує як статичний проєкт. Потім до нього поступово додаються серверні можливості: реєстрація, авторизація, сесії та робота з даними.</p>
  </div>
</section>

<section class="container section">
  <h2>Можливі ролі користувачів</h2>
  <div class="role-grid">
    <article class="card">
      <h3>Гість</h3>
      <p>Може переглядати головну сторінку, каталог і загальну інформацію.</p>
    </article>
    <article class="card">
      <h3>Читач</h3>
      <p>Після входу може бачити особистий кабінет і персональні дані.</p>
    </article>
    <article class="card">
      <h3>Адміністратор</h3>
      <p>У подальших лабораторних роботах може отримати доступ до керування каталогом.</p>
    </article>
  </div>
</section>

</main>

<?php renderFooter(); ?>

</body>
</html>

<?php
require_once __DIR__ . '/includes/layout.php';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Деталі — Library Base</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js" defer></script>
</head>
<body>

<?php renderHeader('about'); ?>

<main>

<section class="page-title">
  <div class="container">
    <p class="eyebrow">Деталі проєкту</p>
    <h1>Як розвивається сайт</h1>
    <p>Ця сторінка пояснює, як статичний сайт поступово перетворюється на серверний веб-застосунок.</p>
  </div>
</section>

<section class="container section timeline">
  <article class="timeline-item">
    <span>1</span>
    <div>
      <h2>HTML і CSS</h2>
      <p>Створюється структура сторінок, навігація, каталог, форми та оформлення.</p>
    </div>
  </article>
  <article class="timeline-item">
    <span>2</span>
    <div>
      <h2>JavaScript</h2>
      <p>Додаються пошук, адаптивне меню, перевірка форм і невелика інтерактивність.</p>
    </div>
  </article>
  <article class="timeline-item">
    <span>3</span>
    <div>
      <h2>PHP</h2>
      <p>Форми надсилають дані на сервер, з’являється авторизація, сесії та захищений кабінет.</p>
    </div>
  </article>
  <article class="timeline-item">
    <span>4</span>
    <div>
      <h2>MVC або база даних</h2>
      <p>Проєкт можна розширити рефакторингом до MVC-структури та збереженням даних у базі даних.</p>
    </div>
  </article>
</section>

</main>

<?php renderFooter(); ?>

</body>
</html>

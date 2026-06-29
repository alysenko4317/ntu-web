<?php
require_once __DIR__ . '/includes/layout.php';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Контакти — Library Base</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js" defer></script>
</head>
<body>

<?php renderHeader('contacts'); ?>

<main>

<section class="page-title">
  <div class="container">
    <p class="eyebrow">Контакти</p>
    <h1>Зв’язок із бібліотекою</h1>
    <p>Ця форма залишена як приклад клієнтської перевірки JavaScript. Серверна обробка у ЛР4 реалізована для реєстрації та входу.</p>
  </div>
</section>

<section class="container section">
  <form class="form-card" id="contact-form" novalidate>
    <div class="form-row">
      <label for="contact-name">Ім’я</label>
      <input type="text" id="contact-name" name="name" required minlength="2">
      <span class="field-error"></span>
    </div>
    <div class="form-row">
      <label for="contact-email">Email</label>
      <input type="email" id="contact-email" name="email" required>
      <span class="field-error"></span>
    </div>
    <div class="form-row">
      <label for="contact-message">Повідомлення</label>
      <textarea id="contact-message" name="message" rows="5" required minlength="10"></textarea>
      <span class="field-error"></span>
    </div>
    <button class="btn btn-primary" type="submit">Надіслати</button>
    <p class="form-message" id="contact-form-message"></p>
  </form>
</section>

</main>

<?php renderFooter(); ?>

</body>
</html>

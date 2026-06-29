<?php
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/users.php';

requireLogin();

$user = findUserByEmail(currentUserEmail() ?? '');

if ($user === null) {
    logoutUser();

    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Кабінет — Library Base</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js" defer></script>
</head>
<body>

<?php renderHeader(); ?>

<main>

<section class="cabinet-header">
  <div class="container">
    <p class="eyebrow">Захищена сторінка</p>
    <h1>Кабінет читача</h1>
    <p>Ця сторінка доступна тільки після успішного входу. Якщо користувач не авторизований, PHP перенаправляє його на сторінку входу.</p>
  </div>
</section>

<section class="container section narrow">
  <div class="card">
    <h2>Дані читача</h2>
    <dl class="profile-list">
      <dt>Ім’я</dt><dd><?= e($user['name'] ?? '') ?></dd>
      <dt>Email</dt><dd><?= e($user['email'] ?? '') ?></dd>
      <dt>Квиток</dt><dd><?= e($user['ticket'] ?? '') ?></dd>
      <dt>Зал</dt><dd><?= e(roomName($user['room'] ?? '')) ?></dd>
    </dl>
    <div class="hero-actions">
      <a class="btn btn-outline" href="index.php">На головну</a>
      <a class="btn btn-primary" href="logout.php">Вийти</a>
    </div>
  </div>
</section>

</main>

<?php renderFooter(); ?>

</body>
</html>

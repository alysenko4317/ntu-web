<?php
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/users.php';

startAppSession();

$errors = [];
$login = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($login === '') {
        $errors[] = 'Введіть email або номер читацького квитка';
    }

    if ($password === '') {
        $errors[] = 'Введіть пароль';
    }

    if (empty($errors)) {
        $user = findUserByLogin($login);

        if ($user === null || !password_verify($password, $user['password_hash'] ?? '')) {
            $errors[] = 'Неправильний email, номер читацького квитка або пароль';
        } else {
            loginUser($user['email']);

            header('Location: cabinet.php');
            exit;
        }
    }
}

$registered = ($_GET['registered'] ?? '') === '1';
$logout = ($_GET['logout'] ?? '') === '1';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вхід — Library Base</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js" defer></script>
</head>
<body>

<?php renderHeader(); ?>

<main>

<section class="page-title">
  <div class="container">
    <p class="eyebrow">Вхід</p>
    <h1>Вхід до кабінету читача</h1>
    <p>Форма входу перевіряється на сервері. Після успішної авторизації створюється HTTP-сесія.</p>
  </div>
</section>

<section class="container section narrow">
  <form class="form-card" id="login-form" method="post" action="login.php">
    <?php if ($registered): ?>
      <div class="success-box">Реєстрацію виконано успішно. Тепер можна увійти.</div>
    <?php endif; ?>

    <?php if ($logout): ?>
      <div class="success-box">Ви вийшли із системи.</div>
    <?php endif; ?>

    <?php renderErrors($errors); ?>

    <div class="form-row">
      <label for="login-email">Email або номер читацького квитка</label>
      <input type="text" id="login-email" name="login" required value="<?= e($login) ?>">
      <span class="field-error"></span>
    </div>

    <div class="form-row">
      <label for="login-password">Пароль</label>
      <input type="password" id="login-password" name="password" required minlength="6">
      <span class="field-error"></span>
    </div>

    <button class="btn btn-primary w-100" type="submit">Увійти</button>
    <p class="centered">Ще немає профілю? <a href="register.php">Зареєструватися</a></p>
  </form>
</section>

</main>

<?php renderFooter(); ?>

</body>
</html>

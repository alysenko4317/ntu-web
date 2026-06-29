<?php
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/users.php';

startAppSession();

$errors = [];
$form = [
    'name' => '',
    'email' => '',
    'ticket' => '',
    'room' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['name'] = trim($_POST['name'] ?? '');
    $form['email'] = normalizeEmail($_POST['email'] ?? '');
    $form['ticket'] = normalizeTicket($_POST['ticket'] ?? '');
    $form['room'] = trim($_POST['room'] ?? '');

    $password = $_POST['password'] ?? '';
    $passwordConfirm = $_POST['password_confirm'] ?? '';

    if ($form['name'] === '') {
        $errors[] = 'Введіть ім’я';
    } elseif (mb_strlen($form['name'], 'UTF-8') < 2) {
        $errors[] = 'Ім’я має містити не менше 2 символів';
    }

    if ($form['email'] === '') {
        $errors[] = 'Введіть електронну пошту';
    } elseif (!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Електронна пошта має некоректний формат';
    } elseif (findUserByEmail($form['email']) !== null) {
        $errors[] = 'Користувач із такою електронною поштою вже зареєстрований';
    }

    if ($form['ticket'] === '') {
        $errors[] = 'Введіть номер читацького квитка';
    } elseif (mb_strlen($form['ticket'], 'UTF-8') < 3) {
        $errors[] = 'Номер читацького квитка має містити не менше 3 символів';
    } elseif (!preg_match('/^[A-ZА-ЯІЇЄҐ0-9\-]+$/u', $form['ticket'])) {
        $errors[] = 'Номер читацького квитка може містити літери, цифри та дефіс';
    } elseif (findUserByTicket($form['ticket']) !== null) {
        $errors[] = 'Користувач із таким номером читацького квитка вже зареєстрований';
    }

    if ($form['room'] === '' || !array_key_exists($form['room'], roomOptions())) {
        $errors[] = 'Оберіть зал бібліотеки';
    }

    if (strlen($password) < 6) {
        $errors[] = 'Пароль має містити не менше 6 символів';
    }

    if ($password !== $passwordConfirm) {
        $errors[] = 'Пароль і підтвердження пароля не збігаються';
    }

    if (empty($errors)) {
        $user = [
            'name' => $form['name'],
            'email' => $form['email'],
            'ticket' => $form['ticket'],
            'room' => $form['room'],
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'registered_at' => date('c'),
        ];

        saveUser($user);

        header('Location: login.php?registered=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Реєстрація — Library Base</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js" defer></script>
</head>
<body>

<?php renderHeader(); ?>

<main>

<section class="page-title">
  <div class="container">
    <p class="eyebrow">Реєстрація</p>
    <h1>Створення читацького профілю</h1>
    <p>У PHP-версії ці дані перевіряються на сервері та зберігаються у файлі <code>data/users.json</code>.</p>
  </div>
</section>

<section class="container section narrow">
  <form class="form-card" id="register-form" method="post" action="register.php">
    <?php renderErrors($errors); ?>

    <div class="form-row">
      <label for="reader-name">Ім’я</label>
      <input type="text" id="reader-name" name="name" required minlength="2" value="<?= fieldValue($form, 'name') ?>">
      <span class="field-error"></span>
    </div>

    <div class="form-row">
      <label for="reader-email">Email</label>
      <input type="email" id="reader-email" name="email" required value="<?= fieldValue($form, 'email') ?>">
      <span class="field-error"></span>
    </div>

    <div class="form-row">
      <label for="reader-ticket">Номер читацького квитка</label>
      <input type="text" id="reader-ticket" name="ticket" required minlength="3" value="<?= fieldValue($form, 'ticket') ?>">
      <span class="field-error"></span>
    </div>

    <div class="form-row">
      <label for="reader-room">Зал бібліотеки</label>
      <select id="reader-room" name="room" required>
        <option value="">Оберіть зал</option>
        <?php foreach (roomOptions() as $value => $label): ?>
          <option value="<?= e($value) ?>"<?= selected($form['room'], $value) ?>><?= e($label) ?></option>
        <?php endforeach; ?>
      </select>
      <span class="field-error"></span>
    </div>

    <div class="form-row">
      <label for="reader-password">Пароль</label>
      <input type="password" id="reader-password" name="password" required minlength="6">
      <small id="password-strength">Мінімум 6 символів.</small>
      <span class="field-error"></span>
    </div>

    <div class="form-row">
      <label for="reader-password-confirm">Підтвердження пароля</label>
      <input type="password" id="reader-password-confirm" name="password_confirm" required>
      <span class="field-error"></span>
    </div>

    <button class="btn btn-primary w-100" type="submit">Зареєструватися</button>
    <p class="centered">Вже маєте профіль? <a href="login.php">Увійти</a></p>
  </form>
</section>

</main>

<?php renderFooter(); ?>

</body>
</html>

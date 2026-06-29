<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/session.php';

function renderHeader(string $active = ''): void
{
    startAppSession();

    $email = currentUserEmail();
    ?>
<header class="site-header">
  <div class="container header-inner">
    <a class="logo" href="index.php">
      <span class="logo-mark">LB</span>
      <span>Library Base</span>
    </a>
    <button class="nav-toggle" type="button" aria-label="Відкрити меню">☰</button>
    <nav class="site-nav">
      <a class="nav-link <?= $active === 'index' ? 'active' : '' ?>" href="index.php">Головна</a>
      <a class="nav-link <?= $active === 'catalog' ? 'active' : '' ?>" href="catalog.php">Каталог</a>
      <a class="nav-link <?= $active === 'about' ? 'active' : '' ?>" href="about.php">Про бібліотеку</a>
      <a class="nav-link <?= $active === 'contacts' ? 'active' : '' ?>" href="contacts.php">Контакти</a>
    </nav>
    <div class="auth-links">
      <?php if ($email): ?>
        <span class="user-chip"><?= e($email) ?></span>
        <a class="btn btn-outline" href="cabinet.php">Кабінет</a>
        <a class="btn btn-primary" href="logout.php">Вийти</a>
      <?php else: ?>
        <a class="btn btn-outline" href="login.php">Увійти</a>
        <a class="btn btn-primary" href="register.php">Реєстрація</a>
      <?php endif; ?>
    </div>
  </div>
</header>
    <?php
}

function renderFooter(): void
{
    ?>
<footer class="site-footer">
  <div class="container footer-grid">
    <div>
      <strong>Library Base</strong>
      <p>Навчальний PHP-сайт електронної бібліотеки для лабораторної роботи з серверної реєстрації, авторизації та сесій.</p>
    </div>
    <div>
      <strong>Розділи</strong>
      <a href="catalog.php">Каталог</a>
      <a href="about.php">Про бібліотеку</a>
      <a href="contacts.php">Контакти</a>
    </div>
    <div>
      <strong>PHP-версія</strong>
      <p>Сайт використовує обробку форм на сервері, файл users.json, хешування паролів і HTTP-сесії.</p>
    </div>
  </div>
</footer>
    <?php
}

function renderErrors(array $errors): void
{
    if (empty($errors)) {
        return;
    }
    ?>
<ul class="alert-list">
    <?php foreach ($errors as $error): ?>
        <li><?= e($error) ?></li>
    <?php endforeach; ?>
</ul>
    <?php
}

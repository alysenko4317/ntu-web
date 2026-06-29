# Library Base — PHP-версія для ЛР4

Це готовий демонстраційний PHP-проєкт для лабораторної роботи №4: серверна реєстрація, авторизація, HTTP-сесії та захищений кабінет.

## Що реалізовано

- перехід основних сторінок з `.html` на `.php`;
- спільна динамічна шапка і футер у `includes/layout.php`;
- серверна реєстрація у `register.php`;
- серверний вхід у `login.php`;
- вихід із системи у `logout.php`;
- захищений кабінет у `cabinet.php`;
- збереження користувачів у `data/users.json`;
- хешування паролів через `password_hash()`;
- перевірка паролів через `password_verify()`;
- сесія користувача через `$_SESSION['user_email']`;
- збереження CSS і JavaScript з попередньої статичної версії.

## Структура

```text
library_base_php_lr4/
├── index.php
├── catalog.php
├── about.php
├── details.php
├── contacts.php
├── register.php
├── login.php
├── cabinet.php
├── logout.php
├── css/
│   └── style.css
├── js/
│   └── main.js
├── includes/
│   ├── helpers.php
│   ├── layout.php
│   ├── session.php
│   └── users.php
└── data/
    └── users.json
```

## Як запустити у WSL + Apache

1. Скопіювати каталог `library_base_php_lr4` у веб-каталог Apache, наприклад:

```bash
sudo cp -r library_base_php_lr4 /var/www/html/
```

2. За потреби надати Apache право запису у файл `data/users.json`:

```bash
sudo chown -R www-data:www-data /var/www/html/library_base_php_lr4/data
sudo chmod -R 775 /var/www/html/library_base_php_lr4/data
```

3. Відкрити у браузері:

```text
http://localhost/library_base_php_lr4/
```

## Навчальні примітки

Файл `data/users.json` використовується тільки як просте навчальне сховище. У реальному застосунку для користувачів зазвичай використовують базу даних.

Форми `register.php` і `login.php` не мають атрибута `novalidate`, щоб вони могли надсилатися на сервер. Контактна форма залишена як приклад клієнтської JavaScript-перевірки.

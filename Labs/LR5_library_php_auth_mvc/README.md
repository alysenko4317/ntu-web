# Library Base — MVC-версія (еталон ЛР5)

Демонстраційний PHP-проєкт для лабораторної роботи №5: рефакторинг PHP-застосунку з ЛР4 до архітектури **Model–View–Controller**.

> **Тема «електронна бібліотека» — демонстраційна.** Кожен студент адаптує цю структуру під власну предметну галузь, обрану в ЛР1.

## Що змінилося порівняно з ЛР4

У ЛР4 вся серверна логіка розміщувалася безпосередньо у PHP-файлах сторінок. У ЛР5 ту саму функціональність реорганізовано за шаблоном MVC:

| ЛР4 (плоска структура) | ЛР5 (MVC) |
|-------------------------|-----------|
| `register.php` — і форма, і обробка POST | `Controller/ReaderController.php` → `register()` / `registerPost()` |
| `login.php` — і форма, і обробка POST | `Controller/ReaderController.php` → `login()` / `loginPost()` |
| `includes/users.php` — функції роботи з JSON | `Repository/ReaderRepository.php` (наслідує `BaseRepository`) |
| `includes/session.php` — функції сесій | `Framework/Session.php` (статичний клас) |
| `includes/layout.php` — шапка/футер | `View/*.php` (окремі шаблони, той самий CSS) |
| Прямий виклик файлів (`login.php`) | `Framework/Router.php` + `config/routes.php` (Front Controller) |
| `css/`, `js/` поруч із PHP | `public/css/`, `public/js/` — окремо від серверного коду |
| — | `Service/AuthService.php` — бізнес-логіка авторизації |
| — | `Model/Reader.php`, `Book.php` тощо — моделі даних |

## Рекомендована структура проєкту

```text
library-mvc/
├── public/                     — DocumentRoot веб-сервера
│   ├── index.php               — точка входу (Front Controller)
│   ├── .htaccess               — перенаправлення запитів на index.php
│   ├── css/
│   │   └── style.css           — стилі (з ЛР3/ЛР4)
│   └── js/
│       └── main.js             — клієнтські скрипти (з ЛР3/ЛР4)
│
├── app/                        — PHP-застосунок (поза DocumentRoot)
│   ├── Controller/
│   │   ├── Controller.php      — базовий контролер (data, display, redirect)
│   │   ├── HomeController.php  — головна сторінка + каталог книг
│   │   ├── AboutController.php — інформаційні сторінки
│   │   └── ReaderController.php — авторизація, кабінет, скидання пароля
│   ├── Service/
│   │   └── AuthService.php     — бізнес-логіка (login, register, forgot/reset password)
│   ├── Repository/
│   │   ├── BaseRepository.php  — базовий клас (читання/запис JSON)
│   │   ├── ReaderRepository.php — робота з users.json
│   │   ├── BookRepository.php  — робота з books.json
│   │   └── RoomRepository.php  — робота з rooms.json
│   ├── Model/
│   │   ├── Reader.php          — модель користувача
│   │   ├── Book.php            — модель книги
│   │   ├── Author.php          — модель автора
│   │   ├── Publisher.php       — модель видавця
│   │   └── Room.php            — модель залу бібліотеки
│   ├── Framework/
│   │   ├── ClassLoader.php     — автозавантаження класів (spl_autoload_register)
│   │   ├── Router.php          — маршрутизатор (URI → Controller → Action)
│   │   └── Session.php         — обгортка над PHP-сесіями
│   └── View/
│       ├── home.php, about.php, details.php
│       ├── login.php, register.php, cabinet.php
│       └── forgot-password.php, reset-password.php
│
├── data/                       — JSON-сховище даних
│   ├── users.json              — користувачі (авторизація)
│   ├── books.json              — каталог книг
│   └── rooms.json              — зали бібліотеки
│
└── config/
    └── routes.php              — таблиця маршрутів (GET / POST → Controller → Action)
```

## Як запустити

Проєкт потребує Apache з увімкненим `mod_rewrite` та PHP.

1. Скопіювати вміст `src/` у каталог веб-сервера:

```bash
sudo cp -r src /var/www/html/lr5
```

2. Налаштувати Apache так, щоб `public/` був DocumentRoot (або використати підкаталог із відповідним `RewriteBase`).

3. Надати право запису у `data/`:

```bash
sudo chown -R www-data:www-data /var/www/html/lr5/data
sudo chmod -R 775 /var/www/html/lr5/data
```

4. Відкрити у браузері: `http://localhost/` (або відповідний шлях).

## Ключові MVC-концепції

| Концепція | Де у проєкті |
|-----------|-------------|
| **Front Controller** | `public/index.php` — єдина точка входу |
| **Поділ public / app** | Статичні файли у DocumentRoot, PHP-код — окремо |
| **Автозавантаження** | `Framework/ClassLoader.php` + `spl_autoload_register` |
| **Маршрутизація** | `Framework/Router.php` + `config/routes.php` |
| **Контролер** | Обробка запиту, виклик сервісу, передача даних у View |
| **Сервіс** | Бізнес-логіка (`AuthService`), незалежна від HTTP |
| **Репозиторій** | Абстракція доступу до JSON-сховища |
| **Модель** | POPO — Plain Old PHP Object для передачі даних |
| **View** | PHP-шаблон з CSS/JS з ЛР4 |
| **Конфігурація** | `config/routes.php` — окремий файл, повертає масив |

---

[← Повернутися до переліку лабораторних робіт](../README.md)

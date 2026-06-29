<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Структура — Library Base MVC</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base MVC</span></a>
        <button class="nav-toggle" type="button" aria-label="Відкрити меню">☰</button>
        <nav class="site-nav">
            <a class="nav-link" href="/">Головна</a>
            <a class="nav-link" href="/about">Про проєкт</a>
            <a class="nav-link active" href="/details">Структура</a>
        </nav>
        <div class="auth-links">
            <a class="btn btn-outline" href="/login">Увійти</a>
            <a class="btn btn-primary" href="/register">Реєстрація</a>
        </div>
    </div>
</header>

<main>

<section class="page-title">
    <div class="container">
        <p class="eyebrow">Архітектура</p>
        <h1>Структура MVC-проєкту</h1>
        <p>Поділ на <code>public/</code>, <code>app/</code>, <code>data/</code> та <code>config/</code>.</p>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
<pre style="margin:0; font-size:13px; line-height:1.5;">
library-mvc/
├── public/                     — DocumentRoot веб-сервера
│   ├── index.php               — точка входу (Front Controller)
│   ├── .htaccess               — перенаправлення запитів
│   ├── css/style.css           — стилі (з ЛР4)
│   └── js/main.js              — клієнтські скрипти (з ЛР4)
│
├── app/                        — PHP-застосунок (поза DocumentRoot)
│   ├── Controller/
│   │   ├── Controller.php      — базовий (data, display, redirect)
│   │   ├── HomeController.php  — головна + каталог книг
│   │   ├── AboutController.php — інформаційні сторінки
│   │   └── ReaderController.php — авторизація, кабінет
│   ├── Service/
│   │   └── AuthService.php     — бізнес-логіка авторизації
│   ├── Repository/
│   │   ├── BaseRepository.php  — базовий (читання/запис JSON)
│   │   ├── ReaderRepository.php — users.json
│   │   ├── BookRepository.php  — books.json
│   │   └── RoomRepository.php  — rooms.json
│   ├── Model/
│   │   ├── Reader.php, Book.php, Author.php
│   │   ├── Publisher.php, Room.php
│   ├── Framework/
│   │   ├── ClassLoader.php     — автозавантаження (spl_autoload_register)
│   │   ├── Router.php          — маршрутизатор (URI → Controller → Action)
│   │   └── Session.php         — обгортка PHP-сесій
│   └── View/
│       ├── home, about, details, login
│       ├── register, cabinet
│       └── forgot-password, reset-password
│
├── data/                       — JSON-сховище
│   ├── users.json
│   ├── books.json
│   └── rooms.json
│
└── config/
    └── routes.php              — таблиця маршрутів
</pre>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
        <h2>Потік обробки запиту</h2>
        <div class="timeline">
            <div class="timeline-item"><span>1</span><div><h3>index.php</h3><p>Визначає <code>BASE_PATH</code>, підключає <code>ClassLoader</code>, запускає <code>Router</code>.</p></div></div>
            <div class="timeline-item"><span>2</span><div><h3>Router</h3><p>Завантажує маршрути з <code>config/routes.php</code>, знаходить відповідний контролер та action за URI.</p></div></div>
            <div class="timeline-item"><span>3</span><div><h3>Controller</h3><p>Викликає сервіс, формує дані, передає їх у View через метод <code>display()</code>.</p></div></div>
            <div class="timeline-item"><span>4</span><div><h3>Service → Repository</h3><p>Бізнес-логіка звертається до репозиторію, який читає/записує JSON-файли з <code>data/</code>.</p></div></div>
            <div class="timeline-item"><span>5</span><div><h3>View</h3><p>PHP-шаблон формує HTML, підключає CSS/JS з <code>public/</code>.</p></div></div>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base MVC</strong><p>Навчальний PHP-сайт (ЛР5).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/about">Про проєкт</a></div>
        <div><strong>MVC</strong><p>Controller → Service → Repository → JSON</p></div>
    </div>
</footer>

</body>
</html>

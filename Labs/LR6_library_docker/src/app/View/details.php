<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Структура — Library Base Docker</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base Docker</span></a>
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
        <h1>Структура Docker-проєкту</h1>
        <p>Порівняно з ЛР5: додано Docker-інфраструктуру, <code>Database.php</code>, <code>config/database.php</code> та <code>init.sql</code>.</p>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
<pre style="margin:0; font-size:13px; line-height:1.5;">
my_site_docker/
├── docker-compose.yml              — композиція сервісів (app + db)
├── Dockerfile                      — образ PHP/Apache з PDO MySQL
├── database/
│   └── init.sql                    — створення таблиць та початкові дані
│
└── src/
    ├── public/                     — DocumentRoot веб-сервера
    │   ├── index.php               — точка входу (Front Controller)
    │   ├── .htaccess               — перенаправлення запитів
    │   ├── css/style.css           — стилі (з ЛР4)
    │   └── js/main.js              — клієнтські скрипти (з ЛР4)
    │
    ├── app/                        — PHP-застосунок
    │   ├── Controller/             — контролери (без змін з ЛР5)
    │   ├── Service/                — бізнес-логіка (без змін)
    │   ├── Repository/
    │   │   ├── BaseRepository.php  — базовий (PDO замість JSON)
    │   │   ├── ReaderRepository.php — SQL-запити до таблиці reader
    │   │   ├── BookRepository.php  — SQL + JOIN written_by/author
    │   │   └── RoomRepository.php  — SQL-запити до таблиці room
    │   ├── Model/                  — моделі даних (без змін)
    │   ├── Framework/
    │   │   ├── ClassLoader.php     — автозавантаження
    │   │   ├── Router.php          — маршрутизатор
    │   │   ├── Session.php         — обгортка PHP-сесій
    │   │   └── Database.php        — НОВИЙ: PDO-обгортка (singleton)
    │   └── View/                   — PHP-шаблони
    │
    └── config/
        ├── routes.php              — таблиця маршрутів
        └── database.php            — НОВИЙ: параметри підключення до БД
</pre>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
        <h2>Потік обробки запиту</h2>
        <div class="timeline">
            <div class="timeline-item"><span>1</span><div><h3>Docker Compose</h3><p>Запускає контейнер <code>app</code> (PHP/Apache) та <code>db</code> (MySQL). БД ініціалізується через <code>init.sql</code>.</p></div></div>
            <div class="timeline-item"><span>2</span><div><h3>index.php</h3><p>Визначає <code>BASE_PATH</code>, підключає <code>ClassLoader</code>, запускає <code>Router</code>.</p></div></div>
            <div class="timeline-item"><span>3</span><div><h3>Router</h3><p>Завантажує маршрути з <code>config/routes.php</code>, знаходить контролер та action за URI.</p></div></div>
            <div class="timeline-item"><span>4</span><div><h3>Controller</h3><p>Викликає сервіс, формує дані, передає їх у View через метод <code>display()</code>.</p></div></div>
            <div class="timeline-item"><span>5</span><div><h3>Service → Repository → MySQL</h3><p>Бізнес-логіка звертається до репозиторію, який виконує SQL-запити через <code>Database</code> (PDO).</p></div></div>
            <div class="timeline-item"><span>6</span><div><h3>View</h3><p>PHP-шаблон формує HTML, підключає CSS/JS з <code>public/</code>.</p></div></div>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base Docker</strong><p>Навчальний PHP-сайт (ЛР6).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/about">Про проєкт</a></div>
        <div><strong>Стек</strong><p>Docker Compose, PHP/Apache, MySQL, PDO</p></div>
    </div>
</footer>

</body>
</html>

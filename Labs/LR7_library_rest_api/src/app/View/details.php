<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Структура — Library Base REST API</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js" defer></script>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="/"><span class="logo-mark">LB</span><span>Library Base API</span></a>
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
        <h1>Структура REST API проєкту</h1>
        <p>Порівняно з ЛР6: додано <code>Controller/Api/</code>, оновлено маршрути та <code>BookRepository</code>.</p>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
<pre style="margin:0; font-size:13px; line-height:1.5;">
my_site_api/
├── docker-compose.yml              — app + db + swagger-ui
├── Dockerfile                      — PHP/Apache з PDO MySQL
├── swagger/
│   └── openapi.yaml                — НОВИЙ: OpenAPI 3.0 специфікація
├── database/
│   └── init.sql                    — створення таблиць та дані
│
└── src/
    ├── public/
    │   ├── index.php, .htaccess, css/, js/
    │
    ├── app/
    │   ├── Controller/
    │   │   ├── Controller.php       — базовий (HTML views)
    │   │   ├── HomeController.php
    │   │   ├── AboutController.php
    │   │   ├── ReaderController.php
    │   │   └── Api/                 — НОВИЙ каталог
    │   │       ├── ApiController.php     — базовий API (JSON)
    │   │       ├── BookApiController.php — CRUD книг
    │   │       ├── ReaderApiController.php — читачі (GET)
    │   │       └── RoomApiController.php — зали (GET)
    │   ├── Service/                 — без змін
    │   ├── Repository/
    │   │   ├── BaseRepository.php   — без змін
    │   │   ├── ReaderRepository.php — без змін
    │   │   ├── BookRepository.php   — ОНОВЛЕНИЙ: + create/update/delete
    │   │   └── RoomRepository.php   — без змін
    │   ├── Model/                   — без змін
    │   ├── Framework/               — без змін
    │   └── View/
    │
    └── config/
        ├── routes.php               — ОНОВЛЕНИЙ: + API маршрути
        └── database.php
</pre>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
        <h2>REST API ендпоінти</h2>
        <div class="timeline">
            <div class="timeline-item"><span>G</span><div><h3>GET /api/books</h3><p>Повертає JSON-масив усіх книг з авторами.</p></div></div>
            <div class="timeline-item"><span>G</span><div><h3>GET /api/books/{id}</h3><p>Повертає одну книгу за ID або 404.</p></div></div>
            <div class="timeline-item"><span>P</span><div><h3>POST /api/books</h3><p>Створює нову книгу. Тіло запиту — JSON з полями <code>code</code>, <code>name</code>.</p></div></div>
            <div class="timeline-item"><span>U</span><div><h3>PUT /api/books/{id}</h3><p>Оновлює існуючу книгу за ID.</p></div></div>
            <div class="timeline-item"><span>D</span><div><h3>DELETE /api/books/{id}</h3><p>Видаляє книгу за ID. Повертає 204 No Content.</p></div></div>
            <div class="timeline-item"><span>G</span><div><h3>GET /api/readers</h3><p>Список усіх зареєстрованих читачів.</p></div></div>
            <div class="timeline-item"><span>G</span><div><h3>GET /api/rooms</h3><p>Список залів бібліотеки.</p></div></div>
        </div>
    </div>
</section>

<section class="container section narrow">
    <div class="card">
        <h2>Потік обробки API-запиту</h2>
        <div class="timeline">
            <div class="timeline-item"><span>1</span><div><h3>HTTP-запит</h3><p>Клієнт (Swagger UI, curl, бот) надсилає запит: <code>GET /api/books</code>.</p></div></div>
            <div class="timeline-item"><span>2</span><div><h3>Router</h3><p>Зіставляє URI з маршрутом, визначає <code>BookApiController::index</code>.</p></div></div>
            <div class="timeline-item"><span>3</span><div><h3>ApiController</h3><p>Контролер викликає репозиторій, отримує дані, повертає JSON через <code>$this->json()</code>.</p></div></div>
            <div class="timeline-item"><span>4</span><div><h3>Repository → MySQL</h3><p>Репозиторій виконує SQL-запит через PDO, повертає масив моделей.</p></div></div>
            <div class="timeline-item"><span>5</span><div><h3>JSON-відповідь</h3><p>Клієнт отримує <code>Content-Type: application/json</code> з даними та HTTP-кодом.</p></div></div>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div><strong>Library Base API</strong><p>Навчальний PHP-сайт (ЛР7).</p></div>
        <div><strong>Розділи</strong><a href="/">Головна</a><a href="/about">Про проєкт</a></div>
        <div><strong>Стек</strong><p>Docker Compose, PHP/Apache, MySQL, REST API, Swagger</p></div>
    </div>
</footer>

</body>
</html>

# Лабораторні роботи

Методичні матеріали та вихідний код до лабораторних робіт курсу **«Основи веб-технологій»**.

Лабораторні роботи 1–8 утворюють наскрізний ланцюжок: кожна наступна ЛР розвиває **власний сайт студента**, розпочатий у ЛР1.

### Власний домен студента та еталонний код

У **ЛР1** кожен студент самостійно обирає предметну галузь (або погоджує її з викладачем) і створює багатосторінковий статичний сайт під обрану тематику. У **ЛР3–ЛР8** цей сайт поступово доповнюється JavaScript, PHP-логікою, MVC-архітектурою, контейнеризацією, REST API та інтеграцією з Telegram-ботом — **зберігаючи обраний домен**.

Каталоги `LR1_html_css_basics/`, `LR3_library_*`, `LR4_library_*`, …, `LR8_library_*` містять **демонстраційний еталон** на темі «електронна бібліотека». Він показує очікувану технічну реалізацію, але не замінює індивідуальний проєкт студента.

| № | Тема | Каталог | Методичка | Код |
|---|------|---------|-----------|-----|
| ЛР1 | HTML, CSS, Apache | [`LR1_html_css_basics/`](LR1_html_css_basics/) | `lab1_html_css_apache_basics.docx` | [`src/`](LR1_html_css_basics/src/) |
| ЛР2 | Мережеві утиліти та протоколи | [`LR2_networks_basics/`](LR2_networks_basics/) | `lab2_net_utils_and_protocols.docx` | — |
| ЛР3 | JavaScript, статичний сайт (еталон: бібліотека) | [`LR3_library_static_site/`](LR3_library_static_site/) | `lab3_js_basics.docx` | [`src/`](LR3_library_static_site/src/) |
| ЛР4 | PHP: сесії та авторизація (еталон: бібліотека) | [`LR4_library_php_auth/`](LR4_library_php_auth/) | `lab4_php_auth.docx` | [`src/`](LR4_library_php_auth/src/) |
| ЛР5 | PHP: MVC-архітектура (еталон: бібліотека) | [`LR5_library_php_auth_mvc/`](LR5_library_php_auth_mvc/) | `lab5_php_auth_mvc.docx` | [`src/`](LR5_library_php_auth_mvc/src/) |
| ЛР6 | Docker, Docker Compose, MySQL | [`LR6_library_docker/`](LR6_library_docker/) | `lab6_docker_intro.docx` | [`src/`](LR6_library_docker/src/) |
| ЛР7 | REST API, Swagger | [`LR7_library_rest_api/`](LR7_library_rest_api/) | — | [`src/`](LR7_library_rest_api/src/) |
| ЛР8 | Telegram Bot (Python) | [`LR8_library_telegram_bot/`](LR8_library_telegram_bot/) | — | [`src/`](LR8_library_telegram_bot/src/), [`bot/`](LR8_library_telegram_bot/bot/) |

---

## ЛР1 — HTML, CSS та Apache

**Мета:** ознайомитися з базовою розміткою HTML, стилями CSS і розгортанням статичного сайту на Apache HTTP Server. Студент **обирає власну тематику** майбутнього сайту — саме цей проєкт розвивається в ЛР3–ЛР8.

> Еталон у `LR1_html_css_basics/src/` реалізовано на темі «електронна бібліотека» — багатосторінковий статичний сайт (HTML + CSS, без JavaScript).

| Компонент | Опис |
|-----------|------|
| [`lab1_html_css_apache_basics.docx`](_docx/lab1_html_css_apache_basics.docx) | Методичні вказівки |
| [`src/`](LR1_html_css_basics/src/) | Вихідний код еталонного рішення |
| [`README.md`](LR1_html_css_basics/README.md) | Документація до проєкту |

**Сторінки проєкту:** `index.html`, `catalog.html`, `about.html`, `contacts.html`, `login.html`, `register.html`, `cabinet.html`.

**Передумови:** браузер, текстовий редактор, Apache (рекомендовано WSL + Apache).

---

## ЛР2 — Мережеві основи

**Мета:** вивчити базові мережеві утиліти (`ping`, `tracert`, `nslookup`, `curl` тощо) та принципи роботи протоколів ARP, ICMP, DNS, TCP, HTTP, HTTPS.

> У цій лабораторній роботі не передбачається створення програмного коду. Результатом є звіт із прикладами виконаних команд та поясненнями.

| Компонент | Опис |
|-----------|------|
| [`lab2_net_utils_and_protocols.docx`](_docx/lab2_net_utils_and_protocols.docx) | Методичні вказівки |
| [`README.md`](LR2_networks_basics/README.md) | Довідник команд та структура звіту |

**Передумови:** командний рядок (Windows / Linux / WSL), доступ до мережі.

---

## ЛР3 — Статичний сайт (JavaScript)

**Мета:** розвинути **власний** багатосторінковий статичний сайт з HTML, CSS і JavaScript — клієнтська валідація форм, інтерактивність (наприклад, пошук у каталозі).

> Еталон у `LR3_library_static_site/src/` реалізовано на темі «електронна бібліотека» лише як демонстраційний приклад.

| Компонент | Опис |
|-----------|------|
| [`lab3_js_basics.docx`](_docx/lab3_js_basics.docx) | Методичні вказівки |
| [`src/`](LR3_library_static_site/src/) | Вихідний код еталонного рішення |
| [`README.md`](LR3_library_static_site/README.md) | Документація до проєкту |

**Сторінки проєкту:** `index.html`, `catalog.html`, `about.html`, `details.html`, `contacts.html`, `login.html`, `register.html`, `cabinet.html`.

**Передумови:** ЛР1 (власний статичний сайт), базові знання JavaScript.

---

## ЛР4 — PHP: реєстрація, авторизація, сесії

**Мета:** перетворити **власний** статичний сайт (з ЛР3) на серверний PHP-застосунок із реєстрацією, входом, HTTP-сесіями та захищеним особистим кабінетом.

> Еталон у `LR4_library_php_auth/src/` відповідає вимогам методички щодо PHP, `users.json`, `password_hash()` / `password_verify()` і HTTP-сесій. Тема бібліотеки в еталоні — лише приклад домену; студент виконує ту саму технічну роботу на базі свого сайту з обраною тематикою.

| Компонент | Опис |
|-----------|------|
| [`lab4_php_auth.docx`](_docx/lab4_php_auth.docx) | Методичні вказівки |
| [`src/`](LR4_library_php_auth/src/) | Вихідний код еталонного рішення |
| [`README.md`](LR4_library_php_auth/README.md) | Документація та інструкція з запуску |

**Ключові технології:** PHP, `$_SESSION`, `password_hash()` / `password_verify()`, JSON-сховище користувачів, спільний layout (`includes/layout.php`).

**Самостійна частина** (не входить до еталону в `src/`): серверна контактна форма (`data/messages.json`) і редагування профілю в кабінеті — див. [`INDIVIDUAL_TASK.md`](LR4_library_php_auth/INDIVIDUAL_TASK.md).

**Передумови:** власний сайт з ЛР3, Apache + PHP (рекомендовано WSL).

---

## ЛР5 — PHP: MVC-архітектура

**Мета:** реорганізувати **власний** PHP-застосунок (з ЛР4) за шаблоном Model–View–Controller: розділити логіку, представлення та маршрутизацію.

> Еталон у `LR5_library_php_auth_mvc/src/` — рефакторинг ЛР4 до MVC за рекомендованою структурою: `public/` (DocumentRoot, CSS/JS), `app/` (Controller, Service, Repository, Model, Framework, View), `data/` (JSON-сховище), `config/` (маршрути). Front Controller, `Framework/Router`, `Framework/ClassLoader`, Controller → Service → Repository → JSON. Тема бібліотеки демонстраційна.

| Компонент | Опис |
|-----------|------|
| [`lab5_php_auth_mvc.docx`](_docx/lab5_php_auth_mvc.docx) | Методичні вказівки |
| [`src/`](LR5_library_php_auth_mvc/src/) | Вихідний код еталонного рішення |
| [`README.md`](LR5_library_php_auth_mvc/README.md) | Документація та інструкція з запуску |

**Ключові компоненти:** `public/index.php` (Front Controller), `config/routes.php`, `Framework/Router.php`, `Framework/ClassLoader.php`, `Controller/ → Service/ → Repository/ → data/*.json`.

**Передумови:** ЛР4.

---

## ЛР6 — Docker, Docker Compose та MySQL

**Мета:** контейнеризувати **власний** PHP-застосунок (з ЛР5) за допомогою Docker і Docker Compose, а також замінити JSON-сховище на реляційну базу даних MySQL.

> Еталон у `LR6_library_docker/src/` — рефакторинг ЛР5: Repository-шар переписано на SQL-запити через PDO/MySQL, додано `Database` Singleton, `docker-compose.yml` піднімає PHP/Apache + MySQL + init.sql.

| Компонент | Опис |
|-----------|------|
| [`lab6_docker_intro.docx`](_docx/lab6_docker_intro.docx) | Методичні вказівки |
| [`src/`](LR6_library_docker/src/) | Вихідний код еталонного рішення |
| [`docker-compose.yml`](LR6_library_docker/docker-compose.yml) | Docker Compose конфігурація |
| [`README.md`](LR6_library_docker/README.md) | Документація та інструкція з запуску |

**Ключові компоненти:** `Dockerfile`, `docker-compose.yml`, `database/init.sql`, `Framework/Database.php`, PDO-based Repository layer.

**Передумови:** ЛР5, Docker Desktop.

---

## ЛР7 — REST API та Swagger

**Мета:** додати до **власного** PHP-застосунку (з ЛР6) шар REST API та підключити Swagger UI для документування і тестування API.

> Еталон у `LR7_library_rest_api/src/` — додано `Controller/Api/` (ApiController, BookApiController, ReaderApiController, RoomApiController), розширено BookRepository CRUD-методами, додано Swagger UI як Docker-контейнер.

| Компонент | Опис |
|-----------|------|
| [`src/`](LR7_library_rest_api/src/) | Вихідний код еталонного рішення |
| [`swagger/openapi.yaml`](LR7_library_rest_api/swagger/openapi.yaml) | OpenAPI 3.0 специфікація |
| [`docker-compose.yml`](LR7_library_rest_api/docker-compose.yml) | Docker Compose конфігурація |
| [`README.md`](LR7_library_rest_api/README.md) | Документація та інструкція з запуску |

**Ключові компоненти:** `Controller/Api/*`, REST endpoints (GET/POST/PUT/DELETE), `openapi.yaml`, Swagger UI контейнер.

**Передумови:** ЛР6.

---

## ЛР8 — Telegram Bot (Python)

**Мета:** створити Telegram-бота на Python, який взаємодіє з REST API (з ЛР7), і розгорнути весь програмний комплекс у Docker Compose.

> Еталон у `LR8_library_telegram_bot/` — додано `bot/` (Python-бот на `python-telegram-bot`), команди `/start`, `/help`, `/books`, `/book`, `/rooms` викликають REST API через HTTP-запити всередині Docker-мережі.

| Компонент | Опис |
|-----------|------|
| [`src/`](LR8_library_telegram_bot/src/) | PHP-застосунок + REST API |
| [`bot/`](LR8_library_telegram_bot/bot/) | Код Telegram-бота (Python) |
| [`docker-compose.yml`](LR8_library_telegram_bot/docker-compose.yml) | Docker Compose конфігурація |
| [`README.md`](LR8_library_telegram_bot/README.md) | Документація та інструкція з запуску |

**Ключові компоненти:** `bot/bot.py`, `bot/commands/`, `bot/services/api_client.py`, `python-telegram-bot`, Docker Compose з 4 сервісами (app, db, bot, swagger).

**Передумови:** ЛР7, Telegram Bot Token (через @BotFather).

---

## Рекомендований порядок виконання

```text
ЛР1 (HTML/CSS/Apache + вибір власної тематики)
  └─► ЛР2 (Мережі)
        └─► ЛР3 (власний статичний сайт + JS)
              └─► ЛР4 (PHP + авторизація на базі свого сайту)
                    └─► ЛР5 (PHP + MVC)
                          └─► ЛР6 (Docker + MySQL)
                                └─► ЛР7 (REST API + Swagger)
                                      └─► ЛР8 (Telegram Bot)
```

ЛР1 і ЛР2 можна виконувати паралельно або в будь-якому порядку; ЛР3–ЛР8 — послідовно.

---

[← Повернутися до кореня репозиторію](../README.md)

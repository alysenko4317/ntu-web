# Матеріали до лекцій

Покажчик демонстраційного коду та супровідних файлів до лекцій курсу **«Основи веб-технологій»**.

| Лекція | Тема | Каталог |
|--------|------|---------|
| L2 | Веб-клієнти та прості HTTP-сервери | [`L2 - WebClients/`](L2%20-%20WebClients/) |
| L3–L4 | HTML, розгортання через Apache/Docker | [`L3_4 - HTML/`](L3_4%20-%20HTML/) |
| L5–L6 | CSS, Bootstrap, верстка | [`L5_6 - CSS/`](L5_6%20-%20CSS/) |
| L7–L9 | JavaScript, DOM, AJAX | [`L7_8_9 - JS/`](L7_8_9%20-%20JS/) |
| L13 | WSGI — інтерфейс Python-веб-застосунків | [`L13 - WSGI/`](L13%20-%20WSGI/) |
| L14 | Вступ до Django | [`L14 - Django Intro/`](L14%20-%20Django%20Intro/) |
| L15 | Django ORM та робота з БД | [`L15 - Django Models/`](L15%20-%20Django%20Models/) |
| L16 | Автентифікація у Django | [`L16 - Auth/`](L16%20-%20Auth/) |
| L17 | Docker та розгортання | [`L17 - Docker/`](L17%20-%20Docker/) |

---

## L2 — WebClients

**Тема:** клієнт–серверна взаємодія, HTTP-запити та відповіді, прості веб-сервери.

| Компонент | Опис |
|-----------|------|
| [`java/hello_servlet/`](L2%20-%20WebClients/java/hello_servlet/) | Мінімальний Java Servlet (Tomcat 9) |
| [`java/client/`](L2%20-%20WebClients/java/client/) | HTTP-клієнт на Java |
| [`python/simple_http_server/`](L2%20-%20WebClients/python/simple_http_server/) | Прості HTTP-сервери на Python (stdlib, Flask, REST) |
| [`python/client/`](L2%20-%20WebClients/python/client/) | HTTP-клієнт на Python (Jupyter notebook) |

Інструкції з запуску Java- та Python-версій — у [`readme.txt`](L2%20-%20WebClients/readme.txt).

---

## L3–L4 — HTML

**Тема:** структура HTML-документа, сучасні веб-API, розгортання статичного контенту.

| Приклад | Опис |
|---------|------|
| [`0a. docker-apache-vanilla/`](L3_4%20-%20HTML/0a.%20docker-apache-vanilla/) | Apache у Docker — мінімальна конфігурація |
| [`0b. docker-apache-python/`](L3_4%20-%20HTML/0b.%20docker-apache-python/) | Apache + mod_wsgi (Python) |
| [`0c. docker-apache-php/`](L3_4%20-%20HTML/0c.%20docker-apache-php/) | Apache + PHP |
| [`1. canvas Demo/`](L3_4%20-%20HTML/1.%20canvas%20Demo/) | HTML5 Canvas |
| [`2. webGL Demo/`](L3_4%20-%20HTML/2.%20webGL%20Demo/) | WebGL |
| [`3a. webWorker Demo/`](L3_4%20-%20HTML/3a.%20webWorker%20Demo/) | Web Workers (локальний запуск) |
| [`3b. webWorker (docker-apache)/`](L3_4%20-%20HTML/3b.%20webWorker%20(docker-apache)/) | Web Workers у Docker-середовищі |

---

## L5–L6 — CSS

**Тема:** каскадні таблиці стилів, селектори, позиціонування, Bootstrap.

| Файл | Тема |
|------|------|
| `0.html` … `2_with_css.html` | Базовий HTML і підключення CSS |
| `4_pseudo.html`, `pseudo.css` | Псевдокласи та псевдоелементи |
| `5_display_none.html` | Властивість `display` |
| `6_fixed_absolute.html` | Позиціонування (`fixed`, `absolute`) |
| `7_bootstrap_ui.html`, `8_bootstrap_grid.html` | Компоненти та сітка Bootstrap |
| `9_dialog.html` | Діалогові елементи HTML |
| `A_bootstrap_tabs.html` | Вкладки Bootstrap |
| `bw.css`, `dark.css`, `flat.css` | Альтернативні теми оформлення |

Файли розташовані безпосередньо в [`L5_6 - CSS/`](L5_6%20-%20CSS/).

---

## L7–L9 — JavaScript

**Тема:** мова JavaScript у браузері — DOM, події, динамічна верстка, AJAX, об'єкти.

Демо згруповано за номерами; префікс `_` позначає базові вправи, числові папки — розширені теми.

| Каталог | Тема |
|---------|------|
| [`_0. dom_navigation_sample/`](L7_8_9%20-%20JS/_0.%20dom_navigation_sample/) | Навігація по DOM |
| [`_1. javascript_hello_world/`](L7_8_9%20-%20JS/_1.%20javascript_hello_world/) | Перший скрипт |
| [`_2. query_selector_and_style_change/`](L7_8_9%20-%20JS/_2.%20query_selector_and_style_change/) | `querySelector`, зміна стилів |
| [`_3. query_selector_and_class_change/`](L7_8_9%20-%20JS/_3.%20query_selector_and_class_change/) | Робота з CSS-класами |
| [`_4. function_declaration_and_strings/`](L7_8_9%20-%20JS/_4.%20function_declaration_and_strings/) | Функції та рядки |
| [`_5. closures_and_variables (quiz_2)/`](L7_8_9%20-%20JS/_5.%20closures_and_variables%20(quiz_2)/) | Замикання та області видимості |
| [`_6. inner_outer_html_text/`](L7_8_9%20-%20JS/_6.%20inner_outer_html_text/) | `innerHTML`, `outerHTML`, `textContent` |
| [`_7.get_computed_style/`](L7_8_9%20-%20JS/_7.get_computed_style/) | Обчислені стилі |
| [`_8. create_page_dynamically (table_generation)/`](L7_8_9%20-%20JS/_8.%20create_page_dynamically%20(table_generation)/) | Динамічне створення таблиць |
| [`_9. create_page_dynamically (main_menu)/`](L7_8_9%20-%20JS/_9.%20create_page_dynamically%20(main_menu)/) | Динамічне меню |
| [`10.css_only_menu_with_submenus/`](L7_8_9%20-%20JS/10.css_only_menu_with_submenus/) | Меню лише на CSS |
| [`11.menu_with_submenus/`](L7_8_9%20-%20JS/11.menu_with_submenus/) | Меню з підменю (JS) |
| [`12.objects_in_javascript/`](L7_8_9%20-%20JS/12.objects_in_javascript/) | Об'єкти в JavaScript |
| [`13.list_of_urls_and_ajax/`](L7_8_9%20-%20JS/13.list_of_urls_and_ajax/) | AJAX-запити |
| [`14.event_loop/`](L7_8_9%20-%20JS/14.event_loop/) | Цикл подій (event loop) |
| [`index.html`](L7_8_9%20-%20JS/index.html) | Демо компіляції TypeScript у браузері |

---

## L13 — WSGI

**Тема:** стандарт WSGI, мінімальний Python-веб-застосунок.

| Файл | Опис |
|------|------|
| [`wsgi_hello_sample.py`](L13%20-%20WSGI/wsgi_hello_sample.py) | Найпростіша WSGI-функція `application` |
| [`runsrv.bat`](L13%20-%20WSGI/runsrv.bat) | Запуск через Waitress (`waitress-serve --port=8000`) |

---

## L14 — Django Intro

**Тема:** структура Django-проєкту, MTV, маршрутизація, views, forms, admin.

Проєкт [`my_first_project/`](L14%20-%20Django%20Intro/my_first_project/) — CRM-застосунок для управління постами (CRUD: create, view, update, delete, list).

```
my_first_project/
├── manage.py
├── my_first_project/    # settings, urls, wsgi
└── crm/                 # models, views, forms, templates, migrations
```

Запуск: `python manage.py runserver` (потрібен встановлений Django 4.x).

---

## L15 — Django Models

**Тема:** ORM Django, міграції, робота з базою даних.

| Компонент | Опис |
|-----------|------|
| [`django_models/`](L15%20-%20Django%20Models/django_models/) | Django-проєкт з моделями та міграціями |
| [`pure_python/db-api.ipynb`](L15%20-%20Django%20Models/pure_python/db-api.ipynb) | DB-API 2.0 — робота з SQLite без Django |
| [`console_apps/test.py`](L15%20-%20Django%20Models/django_models/console_apps/test.py) | Консольні скрипти для роботи з ORM |

---

## L16 — Auth

**Тема:** автентифікація, сесії, cookies, middleware у Django.

Проєкт [`app_with_auth/`](L16%20-%20Auth/app_with_auth/) демонструє:

- власну реалізацію логіну/логауту через cookies (`sessid`);
- middleware для перевірки сесії;
- модель `Session` у базі даних;
- шаблони `login.html`, `welcome.html`.

---

## L17 — Docker

**Тема:** контейнеризація, Dockerfile, nginx, Redis.

| Приклад | Опис |
|---------|------|
| [`1. HelloWorld/`](L17%20-%20Docker/1.%20HelloWorld/) | Мінімальний Docker-образ (Python) |
| [`2. HelloLong/`](L17%20-%20Docker/2.%20HelloLong/) | Довготривалий процес у контейнері |
| [`3. nginx/`](L17%20-%20Docker/3.%20nginx/) | Базовий nginx-образ |
| [`5. nginx/`](L17%20-%20Docker/5.%20nginx/) | Оптимізований nginx (multi-stage build) |
| [`data/`](L17%20-%20Docker/data/) | Дані для демонстрацій |
| `redis.bat`, `redis_term.bat` | Скрипти запуску Redis у Docker |

---

[← Повернутися до кореня репозиторію](../README.md)

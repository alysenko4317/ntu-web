# Матеріали до лекцій

Покажчик демонстраційного коду та супровідних файлів до лекцій курсу **«Основи веб-технологій»**.

| Лекція | Тема | Каталог |
|--------|------|---------|
| L1 | Вступ до вебтехнологій | [`L1 - Intro/`](L1%20-%20Intro/) |
| L2 | HTML, структура веб-сторінки, Docker, сучасні веб-API | [`L2 - HTML/`](L2%20-%20HTML/) |

---

## L1 — Intro

**Тема:** вступ до вебтехнологій, клієнт-серверна взаємодія, HTTP, URL, DNS.

Конспект лекції — у [`SUMMARY.md`](L1%20-%20Intro/SUMMARY.md).

---

## L2 — HTML

**Тема:** мова розмітки HTML, структура веб-сторінки, форми, таблиці, семантична верстка; знайомство з Docker; сучасні браузерні API.

Усі приклади розташовані в [`L2 - HTML/src/`](L2%20-%20HTML/src/) і згруповані за трьома напрямками:

**Основи HTML** — [`src/basics/`](L2%20-%20HTML/src/basics/):

| Файл | Тема |
|------|------|
| [`1.hello.html`](L2%20-%20HTML/src/basics/1.hello.html) | Мінімальна HTML-сторінка (заголовки, посилання, списки) |
| [`2.table.html`](L2%20-%20HTML/src/basics/2.table.html) | Таблиці, `rowspan`/`colspan` |
| [`3.form.html`](L2%20-%20HTML/src/basics/3.form.html) | Проста HTML-форма (без стилів) |
| [`4.form_styled.html`](L2%20-%20HTML/src/basics/4.form_styled.html) | Форма з Bootstrap (CDN) |
| [`5.semantic.html`](L2%20-%20HTML/src/basics/5.semantic.html) | Семантична структура HTML5 |

**Docker** — [`src/docker/`](L2%20-%20HTML/src/docker/):

| Каталог | Тема |
|---------|------|
| [`1.docker-apache-vanilla/`](L2%20-%20HTML/src/docker/1.docker-apache-vanilla/) | Мінімальний Apache у Docker (статичний HTML) |
| [`2.docker-apache-php/`](L2%20-%20HTML/src/docker/2.docker-apache-php/) | Apache + PHP (`php:8.1-apache`) |
| [`3.docker-apache-python/`](L2%20-%20HTML/src/docker/3.docker-apache-python/) | Apache + Python/Flask через mod_wsgi |

**Сучасні веб-API** — [`src/js/`](L2%20-%20HTML/src/js/):

| Каталог | Тема |
|---------|------|
| [`1.canvas/`](L2%20-%20HTML/src/js/1.canvas/) | HTML5 Canvas та SVG-анімація |
| [`2.webGL/`](L2%20-%20HTML/src/js/2.webGL/) | WebGL — шейдери та рендеринг примітивів |
| [`3.webWorker/`](L2%20-%20HTML/src/js/3.webWorker/) | Web Workers (локальний запуск) |
| [`4.webWorker.docker-apache/`](L2%20-%20HTML/src/js/4.webWorker.docker-apache/) | Web Workers у Docker-середовищі |

Детальний опис, інструкції з запуску та зв'язок з ЛР1 — у [`README.md`](L2%20-%20HTML/README.md).

---

[← Повернутися до кореня репозиторію](../README.md)

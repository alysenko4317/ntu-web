# Матеріали до лекцій

Покажчик демонстраційного коду та супровідних файлів до лекцій курсу **«Основи веб-технологій»**.

| Лекція | Тема | Каталог |
|--------|------|---------|
| L1 | Вступ до вебтехнологій | [`L1 - Intro/`](L1%20-%20Intro/) |
| L2 | HTML, структура веб-сторінки, Docker, сучасні веб-API | [`L2 - HTML/`](L2%20-%20HTML/) |
| L3 | CSS, Bootstrap, адаптивна верстка | [`L3 - CSS/`](L3%20-%20CSS/) |

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

## L3 — CSS

**Тема:** каскадні таблиці стилів, селектори, позиціонування, Bootstrap.

Усі приклади розташовані в [`L3 - CSS/src/`](L3%20-%20CSS/src/):

| Файл | Тема |
|------|------|
| [`0.font_tags.html`](L3%20-%20CSS/src/0.font_tags.html) | Застарілі HTML-теги оформлення (`<font>`, `<b>`) |
| [`1.inline_styles.html`](L3%20-%20CSS/src/1.inline_styles.html) | Вбудовані стилі (`style=""`) |
| [`2.external_css.html`](L3%20-%20CSS/src/2.external_css.html) | Зовнішня таблиця стилів + теми (`dark.css`, `flat.css`, `bw.css`) |
| [`4.pseudo.html`](L3%20-%20CSS/src/4.pseudo.html) | Псевдоелементи `::before`, `::after` |
| [`5.display_none.html`](L3%20-%20CSS/src/5.display_none.html) | Властивість `display` і показ/приховування |
| [`6.fixed_absolute.html`](L3%20-%20CSS/src/6.fixed_absolute.html) | Позиціонування `fixed` та `absolute` |
| [`7.bootstrap_ui.html`](L3%20-%20CSS/src/7.bootstrap_ui.html) | Компоненти Bootstrap (navbar, cards) |
| [`8.bootstrap_grid.html`](L3%20-%20CSS/src/8.bootstrap_grid.html) | Адаптивна сітка Bootstrap |
| [`9.dialog.html`](L3%20-%20CSS/src/9.dialog.html) | Нативний HTML-елемент `<dialog>` |
| [`a.bootstrap_tabs.html`](L3%20-%20CSS/src/a.bootstrap_tabs.html) | Вкладки Bootstrap 5 |

Детальний опис та зв'язок з лабораторним практикумом — у [`README.md`](L3%20-%20CSS/README.md).

---

[← Повернутися до кореня репозиторію](../README.md)

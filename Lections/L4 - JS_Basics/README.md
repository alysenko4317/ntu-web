# Лекція 4. Вступ до JavaScript

## Тема

**Основи мови JavaScript та її використання у веббраузері.**

## Основний напрямок

Лекція знайомить із роллю JavaScript у сучасній веброзробці, базовим синтаксисом мови та особливостями її виконання у браузері. Розглядаються змінні, типи даних, оператори, функції, масиви й об'єкти, а також початкові засоби взаємодії з DOM і подіями вебсторінки.

## Розглянуті питання

- роль JavaScript у клієнтській частині вебзастосунку;
- співвідношення JavaScript, ECMAScript і браузерних API;
- використання JavaScript у браузері та середовищі Node.js;
- підключення сценаріїв до HTML-документа;
- атрибути `defer` і `async`;
- робота з консоллю та інструментами розробника;
- оголошення змінних за допомогою `let`, `const` і `var`;
- основні типи даних і оператор `typeof`;
- динамічна типізація та приведення типів;
- строге й нестроге порівняння;
- умовні конструкції та цикли;
- оголошення, виклик і передавання функцій;
- функціональні вирази та стрілочні функції;
- створення й обробка масивів;
- створення об'єктів і робота з їх властивостями;
- формат JSON та перетворення даних;
- пошук і зміна елементів DOM;
- реєстрація обробників подій;
- однопотокова модель виконання JavaScript;
- базове уявлення про асинхронні події та цикл подій.

---

## Демонстраційні приклади

Усі приклади розташовані в каталозі [`src/`](src/).

### Базові вправи

| Каталог | Тема | Що демонструє |
|---------|------|---------------|
| [`_0. dom_navigation_sample/`](src/_0.%20dom_navigation_sample/) | Навігація по DOM-дереву | `firstChild`, `nextSibling`, `firstChild.nextSibling` — обхід вузлів, різниця між текстовими вузлами й елементами |
| [`_1. javascript_hello_world/`](src/_1.%20javascript_hello_world/) | Перший скрипт | Підключення `main.js`, `console.log`, обробник кнопки, зовнішній CSS |
| [`_2. query_selector_and_style_change/`](src/_2.%20query_selector_and_style_change/) | querySelector і стилі | `querySelectorAll`, зміна `style` елементів через JS |
| [`_3. query_selector_and_class_change/`](src/_3.%20query_selector_and_class_change/) | Робота з CSS-класами | `classList.add`, `classList.toggle` — зміна оформлення без маніпуляцій зі `style` |
| [`_4. function_declaration_and_strings/`](src/_4.%20function_declaration_and_strings/) | Функції та рядки | Оголошення функцій, шаблонні рядки (template literals), робота з DOM-елементами |
| [`_6. inner_outer_html_text/`](src/_6.%20inner_outer_html_text/) | innerHTML / textContent | Різниця між `innerHTML`, `outerHTML` та `textContent` |
| [`_7.get_computed_style/`](src/_7.get_computed_style/) | Обчислені стилі | `getComputedStyle` — отримання фактичних стилів елемента |

### Динамічне створення елементів

| Каталог | Тема | Що демонструє |
|---------|------|---------------|
| [`_8.create_page_dynamically (table_generation)/`](src/_8.create_page_dynamically%20(table_generation)/) | Динамічні таблиці | Послідовне ускладнення: `createElement` → `innerHTML` → стилізація; 5 варіантів одного завдання |
| [`_9.create_page_dynamically (main_menu)/`](src/_9.create_page_dynamically%20(main_menu)/) | Динамічне меню | Генерація навігації через JS; варіант з AJAX-завантаженням |
| [`10.css_only_menu_with_submenus/`](src/10.css_only_menu_with_submenus/) | Меню на чистому CSS | Розкривне меню без JavaScript — для порівняння підходів |

### Об'єкти та просунуті теми

| Каталог | Тема | Що демонструє |
|---------|------|---------------|
| [`12.objects_in_javascript/`](src/12.objects_in_javascript/) | Об'єкти JavaScript | Літерал об'єкта, властивості, методи, динамічне додавання; `defer`-підключення |
| [`14.event_loop/`](src/14.event_loop/) | Цикл подій (event loop) | `setInterval`, `setTimeout`, послідовне та асинхронне виконання — наочна демонстрація однопотоковості |
| [`index.html`](src/index.html) + [`test.ts`](src/test.ts) | TypeScript у браузері | Компіляція `.ts`-файлу прямо в браузері через ESM-імпорт бібліотеки TypeScript |

### Як переглянути

Більшість прикладів можна відкрити безпосередньо у браузері. Для прикладів з AJAX (`_9` з варіантом AJAX) потрібен веб-сервер (наприклад, `python -m http.server 8080`).

---

## Зв'язок з лабораторним практикумом

| Лабораторна | Каталог | Які теми лекції застосовуються |
|-------------|---------|-------------------------------|
| **ЛР3** — статичний сайт + JS | [`Labs/LR3_library_static_site/`](../../Labs/LR3_library_static_site/) | Підключення скриптів, querySelector, події, валідація форм, динамічний пошук у каталозі |

### Що спробувати після лекції

1. Відкрити [`_1. javascript_hello_world/`](src/_1.%20javascript_hello_world/) і додати другу кнопку з іншою дією.
2. У [`_4. function_declaration_and_strings/`](src/_4.%20function_declaration_and_strings/) створити функцію, яка приймає масив імен і повертає відформатований список.
3. Порівняти 5 варіантів генерації таблиці у [`_8.create_page_dynamically/`](src/_8.create_page_dynamically%20(table_generation)/) — від найпростішого до стилізованого.
4. Відкрити [`14.event_loop/`](src/14.event_loop/) і простежити в консолі, в якому порядку виконуються `console.log`, `setTimeout` і `setInterval`.

---

[← Повернутися до переліку лекцій](../README.md)

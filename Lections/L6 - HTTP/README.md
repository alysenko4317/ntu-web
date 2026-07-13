# Лекція 6. Протокол HTTP

## Тема

**Принципи роботи протоколу HTTP та організація обміну даними між клієнтом і сервером.**

## Основний напрямок

Лекція пояснює, як HTTP структурує обмін даними поверх TCP та забезпечує взаємодію між вебклієнтом і сервером. Розглядаються формат HTTP-запитів і відповідей, методи, заголовки, коди стану, передавання вмісту, підтримка сесій, кешування, стиснення, захищене з’єднання HTTPS і використання проміжних серверів.

## Розглянуті питання

- мережевий протокол як набір правил обміну даними;
- TCP-з’єднання, сокети та потік даних;
- місце HTTP у стеку мережевих протоколів;
- використання HTTP не лише у браузерах;
- модель «запит — відповідь»;
- відсутність стану в HTTP;
- структура HTTP-запиту;
- структура HTTP-відповіді;
- стартовий рядок, заголовки та тіло повідомлення;
- версії HTTP та повторне використання з’єднання;
- методи `GET`, `POST`, `HEAD`, `PUT`, `PATCH`, `DELETE`;
- заголовки `Host`, `Content-Type`, `Content-Length`, `Accept` та `User-Agent`;
- передавання HTML, текстових і бінарних даних;
- MIME-типи та кодування символів;
- cookie, сесії й ідентифікація користувача;
- кешування та перевірка актуальності ресурсів;
- стиснення даних;
- групи кодів стану `1xx`–`5xx`;
- перенаправлення та типові помилки клієнта й сервера;
- різниця між HTTP і HTTPS;
- шифрування, сертифікати та перевірка сервера;
- проксі-сервери, балансування навантаження та application server;
- аналіз запитів у DevTools;
- використання `curl`;
- створення найпростішого HTTP-сервера.

---

## Демонстраційні приклади

Усі приклади розташовані в каталозі [`src/`](src/) і згруповані за тематикою — від мінімального сервера до програмного клієнта та опційного Java Servlet.

Покроковий сценарій лекційної демонстрації: [`6.demo_guide.md`](6.demo_guide.md).

### 1. Найпростіший HTTP-сервер — [`src/1.simple_http_server/`](src/1.simple_http_server/)

Мінімальний сервер на стандартній бібліотеці Python: власний маршрут `/hello` і роздача статичних файлів з каталогу.

| Файл | Що демонструє |
|------|---------------|
| [`http_simple_server.py`](src/1.simple_http_server/http_simple_server.py) | Обробка `GET`, код `200`, заголовок `Content-Type`, тіло відповіді; для інших шляхів — файли з диска |
| [`index.html`](src/1.simple_http_server/index.html) | Статична сторінка, яку віддає той самий сервер |

**Як запустити.**

```bash
cd "Lections/L6 - HTTP/src/1.simple_http_server"
python http_simple_server.py
```

Перевірка:

- браузер: http://localhost:8001/hello та http://localhost:8001/
- `curl -v http://localhost:8001/hello`

Порт: **8001**.

> Зверніть увагу: у `/hello` тіло містить HTML-розмітку, але `Content-Type` встановлено як `text/plain` — браузер покаже теги як текст. Це добре ілюструє роль MIME-типу.

---

### 2. Flask: маршрути, параметри, заголовки — [`src/2.flask_routes/`](src/2.flask_routes/)

Той самий HTTP, але через фреймворк: query-параметри, заголовки клієнта, `GET` і `POST`.

| Файл | Що демонструє |
|------|---------------|
| [`flask_based_server.py`](src/2.flask_routes/flask_based_server.py) | `/hello` — query `name` і `User-Agent`; `/hello2` — `GET`/`POST`, власний заголовок `X-token` |

**Як запустити.**

```bash
cd "Lections/L6 - HTTP/src/2.flask_routes"
python -m venv .venv
# Windows:
.venv\Scripts\activate
pip install -r requirements.txt
python flask_based_server.py
```

Перевірка:

```bash
curl -v "http://localhost:8002/hello?name=Alice"
curl -v -H "X-token: secret" -d "name=Bob" http://localhost:8002/hello2
```

Порт: **8002**.

---

### 3. REST API (JSON) — [`src/3.rest_api/`](src/3.rest_api/)

Простий JSON API з CORS — місток до AJAX-прикладів лекції 4 (`/getMenu`).

| Файл | Що демонструє |
|------|---------------|
| [`restapi_http_server.py`](src/3.rest_api/restapi_http_server.py) | `GET /getMenu`, `GET /getListItems?version=v2`, відповіді `application/json`, CORS |

**Як запустити.**

```bash
cd "Lections/L6 - HTTP/src/3.rest_api"
pip install -r requirements.txt
python restapi_http_server.py
```

Перевірка: http://localhost:8080/getMenu · `curl http://localhost:8080/getListItems?version=v2`

Порт: **8080**.

---

### 4. HTTP-клієнт на Python — [`src/4.http_client_python/`](src/4.http_client_python/)

Програмний клієнт без браузера: ілюструє тезу лекції «HTTP-клієнт не обов’язково є браузером».

| Файл | Що демонструє |
|------|---------------|
| [`http_client.py`](src/4.http_client_python/http_client.py) | `urllib.request`: статус, `Content-Type`, тіло; власні заголовки |
| [`urllib.ipynb`](src/4.http_client_python/urllib.ipynb) | Той самий сценарій у Jupyter (`urllib3`) |

**Як запустити.** Спочатку підніміть Flask (`2.flask_routes`, порт 8002), потім:

```bash
cd "Lections/L6 - HTTP/src/4.http_client_python"
python http_client.py
```

---

### 5. HTTP-клієнт на Java — [`src/5.http_client_java/`](src/5.http_client_java/)

Консольний клієнт через `HttpURLConnection` — той самий протокол, інша мова.

| Файл | Що демонструє |
|------|---------------|
| [`HttpClient.java`](src/5.http_client_java/src/main/java/HttpClient.java) | `GET` на `http://localhost:8001/hello`, код відповіді та тіло |

**Як запустити.** Спочатку `1.simple_http_server` (порт 8001). Далі в IDE (IntelliJ) відкрити каталог як Maven-проєкт і запустити `main`, або скомпілювати вручну:

```bash
cd "Lections/L6 - HTTP/src/5.http_client_java"
javac -d out src/main/java/HttpClient.java
java -cp out HttpClient
```

---

### 6. Java Servlet (опційно) — [`src/6.hello_servlet/`](src/6.hello_servlet/)

Той самий HTTP на рівні application server (Tomcat). Для основної лекції не обов’язковий — багато інфраструктури.

| Файл | Що демонструє |
|------|---------------|
| [`HelloServlet.java`](src/6.hello_servlet/src/main/java/com/khpi/alysenko/HelloServlet.java) | `doGet`, `Content-Type: text/html`, HTML у відповіді |
| [`web.xml`](src/6.hello_servlet/src/main/webapp/WEB-INF/web.xml) | Мапінг `/hello` → servlet |

**Як запустити.** IntelliJ Ultimate (trial/edu) + Tomcat 9: відкрити каталог як проєкт, створити Run Configuration з Tomcat, задеплоїти WAR. Нотатки щодо збірки Maven: [`issues.txt`](src/6.hello_servlet/issues.txt).

---

## Порти (швидкий довідник)

| Приклад | Порт | Базовий URL |
|---------|-----:|-------------|
| Simple server | 8001 | http://localhost:8001 |
| Flask routes | 8002 | http://localhost:8002 |
| REST API | 8080 | http://localhost:8080 |

Не запускайте кілька серверів на одному порті одночасно.

---

## Зв’язок з іншими лекціями

| Лекція | Зв’язок |
|--------|---------|
| **L4 — JavaScript** | `3.rest_api` надає `/getMenu` для AJAX-демо (`localhost:8080`) |
| **L2 — HTML / Docker** | інший фокус (розмітка, контейнери); HTTP-сервери цієї лекції — про протокол, не про Docker |

---

## Матеріали лекції

| Файл | Призначення |
|------|-------------|
| [`6.lecture_plan.md`](6.lecture_plan.md) | План лекції |
| [`6.lecture_notes.md`](6.lecture_notes.md) | Конспект |
| [`6.demo_guide.md`](6.demo_guide.md) | Як подати й продемонструвати приклади на парі |
| [`src/`](src/) | Демонстраційний код |

---

[← Повернутися до переліку лекцій](../README.md)

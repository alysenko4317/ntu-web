# Library Base — REST API (еталон ЛР7)

Демонстраційний PHP-проєкт для лабораторної роботи №7: проектування та реалізація REST API на основі Docker-застосунку з ЛР6.

> **Тема «електронна бібліотека» — демонстраційна.** Кожен студент адаптує цю структуру під власну предметну галузь, обрану в ЛР1.

## Що змінилося порівняно з ЛР6

У ЛР6 застосунок повертав лише HTML-сторінки. У ЛР7 додано REST API, який повертає дані у форматі JSON, та Swagger UI для інтерактивного тестування:

| ЛР6 (тільки HTML) | ЛР7 (+ REST API) |
|--------------------|-------------------|
| Тільки HTML-контролери | + API-контролери у `Controller/Api/` |
| — | `ApiController.php` — базовий (JSON-відповіді, HTTP-коди) |
| — | `BookApiController.php` — повний CRUD книг |
| — | `ReaderApiController.php` — читання списку читачів |
| — | `RoomApiController.php` — читання списку залів |
| `BookRepository` — тільки читання | + `create()`, `updateBook()`, `deleteBook()` |
| `routes.php` — GET/POST | + PUT/DELETE маршрути для API |
| — | `swagger/openapi.yaml` — OpenAPI 3.0 специфікація |
| 2 Docker-сервіси (app + db) | 3 сервіси (app + db + swagger-ui) |

### Що залишилось без змін

- **Контролери HTML-сторінок** — ідентичні ЛР6
- **Сервіси** — `AuthService` без змін
- **Моделі** — ідентичні ЛР6
- **Framework** — `Router`, `ClassLoader`, `Session`, `Database` — ідентичні
- **View** — мінімальні текстові оновлення

Це знову демонструє перевагу шарової архітектури: API-контролери використовують ті самі репозиторії, що й HTML-контролери.

## Еволюція проєкту через лабораторні роботи

```
ЛР4: PHP-файли  →  JSON
ЛР5: Controller → Service → Repository → JSON
ЛР6: Controller → Service → Repository → MySQL (Docker)
ЛР7: Controller → Service → Repository → MySQL
     + Api Controller → Repository → MySQL (JSON responses)
```

## REST API ендпоінти

| Метод | URL | Опис | Коди |
|-------|-----|------|------|
| `GET` | `/api/books` | Список усіх книг з авторами | 200 |
| `GET` | `/api/books/{id}` | Одна книга за ID | 200, 404 |
| `POST` | `/api/books` | Створити книгу | 201, 400 |
| `PUT` | `/api/books/{id}` | Оновити книгу | 200, 400, 404 |
| `DELETE` | `/api/books/{id}` | Видалити книгу | 204, 404 |
| `GET` | `/api/readers` | Список усіх читачів | 200 |
| `GET` | `/api/readers/{id}` | Один читач за ID | 200, 404 |
| `GET` | `/api/rooms` | Список залів бібліотеки | 200 |

### Приклади запитів (curl)

```bash
# Отримати всі книги
curl http://localhost:8087/api/books

# Отримати книгу за ID
curl http://localhost:8087/api/books/1

# Створити нову книгу
curl -X POST http://localhost:8087/api/books \
  -H "Content-Type: application/json" \
  -d '{"code": "PHP-101", "name": "PHP for Beginners", "release_date": "2023"}'

# Оновити книгу
curl -X PUT http://localhost:8087/api/books/1 \
  -H "Content-Type: application/json" \
  -d '{"name": "Clean Code (2nd Edition)", "release_date": "2020"}'

# Видалити книгу
curl -X DELETE http://localhost:8087/api/books/1

# Отримати список читачів
curl http://localhost:8087/api/readers

# Отримати список залів
curl http://localhost:8087/api/rooms
```

## Структура проєкту

```text
LR7_library_rest_api/
├── docker-compose.yml              — 3 сервіси: app + db + swagger-ui
├── Dockerfile                      — PHP 8.2 / Apache з PDO MySQL
├── .dockerignore
├── run.bat                         — швидкий запуск (Windows)
├── swagger/
│   └── openapi.yaml                — OpenAPI 3.0 специфікація
├── database/
│   └── init.sql                    — DDL + початкові дані
│
└── src/
    ├── public/
    │   ├── index.php, .htaccess, css/, js/
    │
    ├── app/
    │   ├── Controller/
    │   │   ├── Controller.php       — базовий HTML-контролер
    │   │   ├── HomeController.php, AboutController.php, ReaderController.php
    │   │   └── Api/                 — НОВИЙ: REST API контролери
    │   │       ├── ApiController.php     — базовий (json, getJsonInput, notFound)
    │   │       ├── BookApiController.php — GET/POST/PUT/DELETE книг
    │   │       ├── ReaderApiController.php — GET читачів
    │   │       └── RoomApiController.php — GET залів
    │   ├── Service/
    │   │   └── AuthService.php      — без змін
    │   ├── Repository/
    │   │   ├── BaseRepository.php   — без змін
    │   │   ├── ReaderRepository.php — без змін
    │   │   ├── BookRepository.php   — ОНОВЛЕНИЙ: + create, updateBook, deleteBook
    │   │   └── RoomRepository.php   — без змін
    │   ├── Model/                   — без змін
    │   ├── Framework/               — без змін
    │   └── View/
    │
    └── config/
        ├── routes.php               — ОНОВЛЕНИЙ: + API маршрути (GET/POST/PUT/DELETE)
        └── database.php
```

## Як запустити

Потрібен встановлений [Docker Desktop](https://www.docker.com/products/docker-desktop/).

### Варіант 1: run.bat (Windows)

```
run.bat
```

### Варіант 2: вручну

```bash
docker compose up --build
```

| Сервіс | URL | Опис |
|--------|-----|------|
| Сайт | http://localhost:8087 | PHP-застосунок з HTML-сторінками |
| Swagger UI | http://localhost:8088 | Інтерактивна документація API |
| MySQL | localhost:33070 | library_user / library_pass |

### Зупинити

```bash
docker compose down
```

### Повний перезапуск (з очищенням БД)

```bash
docker compose down -v && docker compose up --build
```

## Docker Compose — сервіси

| Сервіс | Образ | Порт | Опис |
|--------|-------|------|------|
| `app` | Власний (PHP 8.2 / Apache) | 8087 → 80 | PHP-застосунок + REST API |
| `db` | `mysql:8.0` | 33070 → 3306 | База даних MySQL |
| `swagger` | `swaggerapi/swagger-ui` | 8088 → 8080 | Swagger UI для тестування API |

## Ключові концепції ЛР7

| Концепція | Де у проєкті |
|-----------|-------------|
| **REST API** | `Controller/Api/` — окремі контролери для JSON-відповідей |
| **HTTP-методи** | GET (читання), POST (створення), PUT (оновлення), DELETE (видалення) |
| **JSON-відповіді** | `ApiController::json()` — `Content-Type: application/json` + HTTP-код |
| **Читання JSON-тіла** | `ApiController::getJsonInput()` — `php://input` + `json_decode` |
| **HTTP-коди** | 200 OK, 201 Created, 204 No Content, 400 Bad Request, 404 Not Found |
| **OpenAPI 3.0** | `swagger/openapi.yaml` — формальний опис API |
| **Swagger UI** | Docker-контейнер для інтерактивного тестування ендпоінтів |
| **CRUD** | Create, Read, Update, Delete — повний набір операцій для книг |
| **Два типи контролерів** | `Controller` (HTML views) + `ApiController` (JSON) — спільні репозиторії |
| **Повторне використання** | API-контролери використовують ті самі Repository, що й HTML-контролери |

## Корисні команди

```bash
# Стан контейнерів
docker compose ps

# Логи
docker compose logs
docker compose logs app

# Зайти в контейнер
docker exec -it lr7-php-app bash

# Зайти в MySQL
docker exec -it lr7-mysql-db mysql -u library_user -plibrary_pass library

# Перебудувати
docker compose up --build

# Повний перезапуск
docker compose down -v && docker compose up --build
```

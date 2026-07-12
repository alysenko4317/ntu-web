# Library Base — Telegram Bot (еталон ЛР8)

Демонстраційний проєкт для лабораторної роботи №8: створення Telegram-бота на Python, який взаємодіє з PHP-застосунком через REST API (ЛР7). Весь програмний комплекс розгортається у Docker Compose.

> **Тема «електронна бібліотека» — демонстраційна.** Кожен студент адаптує цю структуру під власну предметну галузь, обрану в ЛР1.

## Що змінилося порівняно з ЛР7

| ЛР7 (REST API) | ЛР8 (+ Telegram Bot) |
|-----------------|----------------------|
| 3 сервіси (app + db + swagger) | 4 сервіси (+ bot) |
| — | `bot/` — Python Telegram-бот |
| — | `bot/Dockerfile` — `python:3.11-slim` |
| — | `bot/bot.py` — точка входу, реєстрація команд |
| — | `bot/commands/` — обробники /start, /books, /book, /rooms |
| — | `bot/services/api_client.py` — HTTP-клієнт до REST API |
| — | `.env` — токен бота (не в Git!) |

### Що залишилось без змін

- **PHP-застосунок** — повністю ідентичний ЛР7 (REST API + HTML-сторінки)
- **База даних** — та сама MySQL з init.sql
- **Swagger UI** — та сама OpenAPI специфікація

## Еволюція проєкту через лабораторні роботи

```
ЛР4: PHP-файли  →  JSON
ЛР5: Controller → Service → Repository → JSON
ЛР6: Docker Compose + MySQL
ЛР7: + REST API + Swagger UI
ЛР8: + Telegram Bot (Python) → REST API → MySQL
```

## Telegram-бот — команди

| Команда | Опис | API-виклик |
|---------|------|------------|
| `/start` | Привітання та список команд | — |
| `/help` | Те саме, що /start | — |
| `/books` | Список усіх книг з авторами | `GET /api/books` |
| `/book <id>` | Деталі книги за ID | `GET /api/books/{id}` |
| `/rooms` | Зали бібліотеки | `GET /api/rooms` |

## Архітектура взаємодії

```
Користувач
    │
    ▼
Telegram (cloud)
    │
    ▼ (long polling)
┌──────────────────────────────────────────┐
│  Docker Compose                          │
│                                          │
│  ┌─────────┐    HTTP     ┌─────────┐    │
│  │   bot   │ ─────────► │   app   │    │
│  │ Python  │  /api/...   │ PHP +   │    │
│  │         │ ◄───JSON──  │ Apache  │    │
│  └─────────┘             └────┬────┘    │
│                               │ SQL     │
│                          ┌────▼────┐    │
│                          │   db    │    │
│                          │  MySQL  │    │
│                          └─────────┘    │
│                                          │
│  ┌─────────┐                             │
│  │ swagger │  (Swagger UI, порт 8090)    │
│  └─────────┘                             │
└──────────────────────────────────────────┘
```

## Структура проєкту

```text
LR8_library_telegram_bot/
├── docker-compose.yml              — 4 сервіси: app + db + bot + swagger
├── Dockerfile                      — PHP/Apache (з ЛР7)
├── .dockerignore
├── .env.example                    — шаблон для TELEGRAM_BOT_TOKEN
├── .env                            — токен бота (створити вручну!)
├── run.bat
│
├── bot/                            — Telegram-бот (Python)
│   ├── Dockerfile                  — python:3.11-slim + залежності
│   ├── requirements.txt            — python-telegram-bot, requests
│   ├── bot.py                      — точка входу, Application + handlers
│   ├── commands/
│   │   ├── start.py                — /start, /help — привітання
│   │   ├── books.py                — /books, /book <id> — книги
│   │   └── rooms.py                — /rooms — зали
│   └── services/
│       └── api_client.py           — HTTP-клієнт (requests → REST API)
│
├── swagger/
│   └── openapi.yaml                — OpenAPI 3.0 (з ЛР7)
├── database/
│   └── init.sql                    — DDL + дані (з ЛР6)
│
└── src/                            — PHP-застосунок (з ЛР7, без змін)
    ├── app/Controller/Api/         — REST API контролери
    ├── app/Repository/             — SQL-запити через PDO
    ├── config/routes.php           — маршрути (HTML + API)
    └── public/                     — точка входу
```

## Як запустити

### Крок 1: Створити Telegram-бота

1. Відкрити [@BotFather](https://t.me/BotFather) у Telegram
2. Надіслати `/newbot`, вказати ім'я та username
3. Скопіювати отриманий токен

### Крок 2: Налаштувати .env

```bash
copy .env.example .env
```

Відкрити `.env` і вставити токен:

```
TELEGRAM_BOT_TOKEN=1234567890:ABCdefGHIjklMNOpqrsTUVwxyz
```

### Крок 3: Запустити

```bash
docker compose up --build
```

Або на Windows:
```
run.bat
```

| Сервіс | URL | Опис |
|--------|-----|------|
| Сайт | http://localhost:8089 | PHP-застосунок |
| Swagger UI | http://localhost:8090 | Тестування API |
| MySQL | localhost:33080 | library_user / library_pass |
| Bot | — | Працює у Telegram |

### Зупинити

```bash
docker compose down
```

## Docker Compose — сервіси

| Сервіс | Образ | Порт | Опис |
|--------|-------|------|------|
| `app` | PHP 8.2 / Apache | 8089 → 80 | PHP-застосунок + REST API |
| `db` | mysql:8.0 | 33080 → 3306 | База даних |
| `bot` | python:3.11-slim | — | Telegram-бот |
| `swagger` | swaggerapi/swagger-ui | 8090 → 8080 | Swagger UI |

## Корисні команди

```bash
# Стан контейнерів
docker compose ps

# Логи бота
docker compose logs bot -f

# Логи PHP-застосунку
docker compose logs app -f

# Перезапустити лише бота
docker compose restart bot

# Зайти в контейнер бота
docker exec -it lr8-telegram-bot bash

# Повний перезапуск
docker compose down -v && docker compose up --build
```

## Ключові концепції ЛР8

| Концепція | Де у проєкті |
|-----------|-------------|
| **Telegram Bot API** | `python-telegram-bot` — обробка команд через long polling |
| **Міжсервісна взаємодія** | Bot → `http://app:80/api/...` через Docker-мережу |
| **HTTP-клієнт** | `services/api_client.py` — `requests.get()` до REST API |
| **Розділення відповідальності** | `commands/` — обробники, `services/` — доступ до API |
| **Змінні оточення** | `TELEGRAM_BOT_TOKEN` через `.env`, `API_BASE_URL` через compose |
| **4 Docker-контейнери** | PHP, MySQL, Python, Swagger UI — одна мережа |
| **Повторне використання** | Бот не має прямого доступу до БД — лише через REST API |

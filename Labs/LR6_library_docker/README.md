# Library Base — Docker-версія (еталон ЛР6)

Демонстраційний PHP-проєкт для лабораторної роботи №6: контейнеризація PHP-застосунку з ЛР5 за допомогою Docker Compose та перехід зі зберігання даних у JSON-файлах на реляційну базу даних MySQL.

> **Тема «електронна бібліотека» — демонстраційна.** Кожен студент адаптує цю структуру під власну предметну галузь, обрану в ЛР1.

## Що змінилося порівняно з ЛР5

У ЛР5 дані зберігались у JSON-файлах (`users.json`, `books.json`, `rooms.json`). У ЛР6 ту саму функціональність переведено на MySQL, а проєкт запускається у Docker-контейнерах:

| ЛР5 (JSON-сховище) | ЛР6 (Docker + MySQL) |
|---------------------|----------------------|
| `BaseRepository` — читання/запис JSON | `BaseRepository` — SQL-запити через PDO |
| `ReaderRepository` → `users.json` | `ReaderRepository` → таблиця `reader` |
| `BookRepository` → `books.json` | `BookRepository` → таблиці `book` + `written_by` + `author` |
| `RoomRepository` → `rooms.json` | `RoomRepository` → таблиця `room` |
| — | `Framework/Database.php` — PDO singleton-обгортка |
| — | `config/database.php` — параметри підключення |
| — | `Dockerfile` — образ PHP 8.2 / Apache з PDO MySQL |
| — | `docker-compose.yml` — app + db сервіси |
| — | `database/init.sql` — створення таблиць та початкові дані |
| `data/users.json`, `books.json`, `rooms.json` | Видалені (дані у БД) |

### Що залишилось без змін

- **Контролери** — не потребували змін
- **Сервіси** — `AuthService` без змін (працює через репозиторій)
- **Моделі** — `Reader`, `Book`, `Author`, `Room`, `Publisher` — ідентичні
- **View** — мінімальні текстові оновлення (назва, описи)
- **Framework** — `Router`, `ClassLoader`, `Session` — ідентичні

Це демонструє перевагу шарової архітектури: заміна сховища даних торкнулась лише Repository-шару.

## Еволюція проєкту через лабораторні роботи

```
ЛР4: PHP-файли  →  users.json / books.json
ЛР5: Controller → Service → Repository → JSON-файли
ЛР6: Controller → Service → Repository → MySQL (Docker)
```

## Структура проєкту

```text
LR6_library_docker/
├── docker-compose.yml              — композиція сервісів (app + db)
├── Dockerfile                      — образ PHP 8.2 / Apache з PDO MySQL
├── .dockerignore                   — файли, що не копіюються в образ
├── run.bat                         — швидкий запуск (Windows)
├── database/
│   └── init.sql                    — DDL + початкові дані
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
    │   │   ├── Controller.php      — базовий контролер
    │   │   ├── HomeController.php  — головна + каталог книг
    │   │   ├── AboutController.php — інформаційні сторінки
    │   │   └── ReaderController.php— авторизація, кабінет
    │   ├── Service/
    │   │   └── AuthService.php     — бізнес-логіка (без змін)
    │   ├── Repository/
    │   │   ├── BaseRepository.php  — базовий (PDO замість JSON)
    │   │   ├── ReaderRepository.php— SQL-запити до таблиці reader
    │   │   ├── BookRepository.php  — SQL + JOIN written_by/author
    │   │   └── RoomRepository.php  — SQL-запити до таблиці room
    │   ├── Model/
    │   │   ├── Reader.php, Book.php, Author.php
    │   │   ├── Publisher.php, Room.php
    │   ├── Framework/
    │   │   ├── ClassLoader.php     — автозавантаження
    │   │   ├── Router.php          — маршрутизатор
    │   │   ├── Session.php         — обгортка PHP-сесій
    │   │   └── Database.php        — PDO-обгортка (singleton)
    │   └── View/
    │       ├── home, about, details, login
    │       ├── register, cabinet
    │       └── forgot-password, reset-password
    │
    └── config/
        ├── routes.php              — таблиця маршрутів
        └── database.php            — параметри підключення до MySQL
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

Сайт буде доступний за адресою: **http://localhost:8086**

### Зупинити

```bash
docker compose down
```

### Зупинити та видалити дані БД

```bash
docker compose down -v
```

## Docker Compose — сервіси

| Сервіс | Образ | Порт | Опис |
|--------|-------|------|------|
| `app` | Власний (PHP 8.2 / Apache) | 8086 → 80 | PHP-застосунок |
| `db` | `mysql:8.0` | 33060 → 3306 | База даних MySQL |

### Змінні оточення

Передаються через `docker-compose.yml` → `environment`:

| Змінна | Значення | Опис |
|--------|----------|------|
| `DB_HOST` | `db` | Ім'я MySQL-контейнера |
| `DB_PORT` | `3306` | Внутрішній порт MySQL |
| `DB_NAME` | `library` | Назва бази даних |
| `DB_USER` | `library_user` | Користувач БД |
| `DB_PASSWORD` | `library_pass` | Пароль користувача |

## Корисні команди Docker

```bash
# Перевірити стан контейнерів
docker compose ps

# Переглянути логи
docker compose logs
docker compose logs app
docker compose logs db

# Зайти в контейнер застосунку
docker exec -it lr6-php-app bash

# Зайти в MySQL
docker exec -it lr6-mysql-db mysql -u library_user -plibrary_pass library

# Перебудувати після змін
docker compose up --build

# Повний перезапуск (з очищенням БД)
docker compose down -v && docker compose up --build
```

## Ключові концепції ЛР6

| Концепція | Де у проєкті |
|-----------|-------------|
| **Dockerfile** | Створення власного образу PHP/Apache з розширенням PDO MySQL |
| **Docker Compose** | Оркестрація двох сервісів (app + db) в одній мережі |
| **Docker Volume** | Збереження даних MySQL між перезапусками (`db_data`) |
| **Healthcheck** | Очікування готовності MySQL перед запуском app |
| **Змінні оточення** | Конфігурація БД через environment (не захардкоджено в PHP) |
| **init.sql** | Автоматична ініціалізація бази при першому запуску |
| **PDO** | Безпечне підключення до БД з prepared statements |
| **Repository pattern** | Заміна JSON → MySQL без змін у Controller / Service |

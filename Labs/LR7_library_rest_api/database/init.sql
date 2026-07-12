-- ============================================================
-- Ініціалізація бази даних для ЛР6: Library Base — Docker
-- СУБД: MySQL 8.0
-- ============================================================

CREATE TABLE IF NOT EXISTS room (
    id   VARCHAR(20) PRIMARY KEY,
    name VARCHAR(60)  NOT NULL
);

CREATE TABLE IF NOT EXISTS reader (
    id                   INT AUTO_INCREMENT PRIMARY KEY,
    ticket               VARCHAR(20)  NOT NULL UNIQUE,
    first_name           VARCHAR(60)  NOT NULL,
    last_name            VARCHAR(60)  NOT NULL,
    birthday             DATE         NULL,
    phone                VARCHAR(20)  NOT NULL DEFAULT '',
    room_id              VARCHAR(20)  NULL,
    password_hash        VARCHAR(255) NOT NULL,
    password_reset_token VARCHAR(64)  NULL,
    registered_at        DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES room(id)
);

CREATE TABLE IF NOT EXISTS author (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(60) NOT NULL,
    last_name  VARCHAR(60) NOT NULL
);

CREATE TABLE IF NOT EXISTS book (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    code         VARCHAR(20)  NOT NULL UNIQUE,
    name         VARCHAR(200) NOT NULL,
    release_date VARCHAR(10)  NULL
);

CREATE TABLE IF NOT EXISTS written_by (
    book_id   INT NOT NULL,
    author_id INT NOT NULL,
    PRIMARY KEY (book_id, author_id),
    FOREIGN KEY (book_id)   REFERENCES book(id),
    FOREIGN KEY (author_id) REFERENCES author(id)
);

-- ============================================================
-- Початкові дані
-- ============================================================

INSERT INTO room (id, name) VALUES
    ('large',  'Велика зала'),
    ('middle', 'Середня зала'),
    ('small',  'Мала зала');

INSERT INTO author (id, first_name, last_name) VALUES
    (1, 'Robert',      'Martin'),
    (2, 'Erich',       'Gamma'),
    (3, 'Richard',     'Helm'),
    (4, 'Thomas',      'Cormen'),
    (5, 'Charles',     'Leiserson'),
    (6, 'Douglas',     'Crockford'),
    (7, 'James',       'Kurose'),
    (8, 'Keith',       'Ross'),
    (9, 'Abraham',     'Silberschatz'),
    (10, 'Andrew',     'Hunt'),
    (11, 'David',      'Thomas'),
    (12, 'Martin',     'Fowler'),
    (13, 'Christopher','Bishop');

INSERT INTO book (id, code, name, release_date) VALUES
    (1,  'PRG-001', 'Clean Code',                               '2008'),
    (2,  'SWE-014', 'Design Patterns',                          '1994'),
    (3,  'ALG-101', 'Introduction to Algorithms',               '1990'),
    (4,  'WEB-007', 'JavaScript: The Good Parts',               '2008'),
    (5,  'NET-003', 'Computer Networking: A Top-Down Approach',  '2000'),
    (6,  'DB-022',  'Database System Concepts',                  '1986'),
    (7,  'OS-010',  'Operating System Concepts',                 '1983'),
    (8,  'PRG-042', 'The Pragmatic Programmer',                  '1999'),
    (9,  'PRG-055', 'Refactoring',                               '1999'),
    (10, 'ML-001',  'Pattern Recognition and Machine Learning',  '2006');

INSERT INTO written_by (book_id, author_id) VALUES
    (1, 1),
    (2, 2), (2, 3),
    (3, 4), (3, 5),
    (4, 6),
    (5, 7), (5, 8),
    (6, 9),
    (7, 9),
    (8, 10), (8, 11),
    (9, 12),
    (10, 13);

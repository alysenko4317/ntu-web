<?php

namespace Repository;

use Model\Book;
use Model\Author;

/**
 * Репозиторій книг.
 *
 * У ЛР6 підтримував лише читання (getAll, getTopBooks).
 * У ЛР7 додано повний CRUD для REST API: create, updateBook, deleteBook.
 */
class BookRepository extends BaseRepository {

    public function __construct() {
        parent::__construct('book');
    }

    /**
     * Повернути топ-N книг (за датою видання, найновіші першими) разом з авторами.
     */
    public function getTopBooks(int $limit = 10): array {
        return $this->getBooksWithAuthors(
            "ORDER BY b.release_date DESC LIMIT :lim",
            ['lim' => $limit]
        );
    }

    /**
     * Повернути всі книги разом з авторами.
     */
    public function getAll(): array {
        return $this->getBooksWithAuthors();
    }

    /**
     * Повернути одну книгу за ID разом з авторами.
     */
    public function getByIdWithAuthors(int $id): ?Book {
        $books = $this->getBooksWithAuthors(
            "WHERE b.id = :id",
            ['id' => $id]
        );
        return $books[0] ?? null;
    }

    /**
     * Створити нову книгу. Повертає ID.
     */
    public function create(array $data): int {
        $this->db->execute(
            "INSERT INTO book (code, name, release_date) VALUES (:code, :name, :release_date)",
            [
                'code'         => $data['code'],
                'name'         => $data['name'],
                'release_date' => $data['release_date'] ?? null,
            ]
        );
        return (int) $this->db->lastInsertId();
    }

    /**
     * Оновити книгу за ID.
     */
    public function updateBook(int $id, array $data): void {
        $fields = [];
        $params = ['id' => $id];

        if (isset($data['code'])) {
            $fields[] = 'code = :code';
            $params['code'] = $data['code'];
        }
        if (isset($data['name'])) {
            $fields[] = 'name = :name';
            $params['name'] = $data['name'];
        }
        if (array_key_exists('release_date', $data)) {
            $fields[] = 'release_date = :release_date';
            $params['release_date'] = $data['release_date'];
        }

        if (!empty($fields)) {
            $sql = "UPDATE book SET " . implode(', ', $fields) . " WHERE id = :id";
            $this->db->execute($sql, $params);
        }
    }

    /**
     * Видалити книгу за ID (каскадно видаляє зв'язки з авторами).
     */
    public function deleteBook(int $id): void {
        $this->db->execute("DELETE FROM written_by WHERE book_id = :id", ['id' => $id]);
        $this->db->execute("DELETE FROM book WHERE id = :id", ['id' => $id]);
    }

    /**
     * Універсальний метод: SELECT книг із JOIN авторів.
     */
    private function getBooksWithAuthors(string $extraSql = '', array $params = []): array {
        $sql = "SELECT b.*, a.id AS author_id, a.first_name AS author_first, a.last_name AS author_last
                  FROM book b
             LEFT JOIN written_by wb ON b.id = wb.book_id
             LEFT JOIN author a     ON wb.author_id = a.id
                $extraSql";

        $rows = $this->db->query($sql, $params);

        $books = [];
        foreach ($rows as $row) {
            $bookId = $row['id'];
            if (!isset($books[$bookId])) {
                $books[$bookId] = $this->mapResult($row);
            }
            if (!empty($row['author_id'])) {
                $author = new Author();
                $author->id        = $row['author_id'];
                $author->firstName = $row['author_first'];
                $author->lastName  = $row['author_last'];
                $books[$bookId]->authors[] = $author;
            }
        }

        return array_values($books);
    }

    protected function mapResult(array $row): Book {
        $book = new Book();
        $book->id          = $row['id'] ?? null;
        $book->code        = $row['code'] ?? '';
        $book->name        = $row['name'] ?? '';
        $book->releaseDate = $row['release_date'] ?? '';
        $book->authors     = [];
        return $book;
    }
}

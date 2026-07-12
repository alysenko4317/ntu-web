<?php

namespace Repository;

use Model\Book;
use Model\Author;

/**
 * Репозиторій книг.
 *
 * У ЛР5 працював із файлом books.json (авторів зберігав як вкладений масив).
 * У ЛР6 — з таблицями book, author та written_by у MySQL.
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

<?php

namespace Repository;

use Model\Book;
use Model\Author;

class BookRepository extends BaseRepository {

    public function __construct() {
        parent::__construct(BASE_PATH . '/data/books.json');
    }

    public function getAll(): array {
        $results = [];
        foreach ($this->loadAll() as $row) {
            $results[] = $this->mapResult($row);
        }
        return $results;
    }

    public function getTopBooks(int $limit = 10): array {
        $all = $this->getAll();

        usort($all, function ($a, $b) {
            return strcmp($b->releaseDate, $a->releaseDate);
        });

        return array_slice($all, 0, $limit);
    }

    private function mapResult(array $row): Book {
        $book = new Book();
        $book->id = $row['id'] ?? null;
        $book->code = $row['code'] ?? '';
        $book->name = $row['name'] ?? '';
        $book->releaseDate = $row['release_date'] ?? '';

        if (!empty($row['authors'])) {
            foreach ($row['authors'] as $authorRow) {
                $author = new Author();
                $author->id = $authorRow['id'] ?? null;
                $author->firstName = $authorRow['first_name'] ?? '';
                $author->lastName = $authorRow['last_name'] ?? '';
                $book->authors[] = $author;
            }
        }

        return $book;
    }
}

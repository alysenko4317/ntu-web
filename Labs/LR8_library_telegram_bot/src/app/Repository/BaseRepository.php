<?php

namespace Repository;

use Framework\Database;

/**
 * Базовий репозиторій, що працює з базою даних через PDO.
 *
 * У ЛР5 цей клас читав/записував JSON-файли.
 * У ЛР6 — виконує SQL-запити через клас Database (PDO-обгортка).
 */
abstract class BaseRepository {

    protected $db;
    protected $table;

    public function __construct(string $table) {
        $this->db = Database::getInstance();
        $this->table = $table;
    }

    public function getAll(): array {
        $rows = $this->db->query("SELECT * FROM {$this->table}");
        return $this->mapResults($rows);
    }

    public function getById($id) {
        $row = $this->db->queryOne(
            "SELECT * FROM {$this->table} WHERE id = :id",
            ['id' => $id]
        );
        return $row ? $this->mapResult($row) : null;
    }

    protected function mapResults(array $rows): array {
        $results = [];
        foreach ($rows as $row) {
            $results[] = $this->mapResult($row);
        }
        return $results;
    }

    abstract protected function mapResult(array $row);
}

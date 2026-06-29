<?php

namespace Repository;

abstract class BaseRepository {

    protected $filePath;

    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    protected function loadAll(): array {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $json = file_get_contents($this->filePath);

        if ($json === false || trim($json) === '') {
            return [];
        }

        $data = json_decode($json, true);

        return is_array($data) ? $data : [];
    }

    protected function saveAll(array $records): void {
        $dir = dirname($this->filePath);

        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $json = json_encode($records, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($this->filePath, $json . PHP_EOL, LOCK_EX);
    }
}

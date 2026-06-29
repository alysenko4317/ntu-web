<?php

namespace Repository;

use Model\Room;

class RoomRepository extends BaseRepository {

    public function __construct() {
        parent::__construct(BASE_PATH . '/data/rooms.json');
    }

    public function getAll(): array {
        $results = [];
        foreach ($this->loadAll() as $row) {
            $results[] = $this->mapResult($row);
        }
        return $results;
    }

    public function getById(string $id): ?Room {
        foreach ($this->loadAll() as $row) {
            if (($row['id'] ?? '') === $id) {
                return $this->mapResult($row);
            }
        }
        return null;
    }

    public function getNameById(string $id): string {
        $room = $this->getById($id);
        return $room ? $room->name : $id;
    }

    private function mapResult(array $row): Room {
        $room = new Room();
        $room->id = $row['id'] ?? '';
        $room->name = $row['name'] ?? '';
        return $room;
    }
}

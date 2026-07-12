<?php

namespace Repository;

use Model\Room;

/**
 * Репозиторій залів бібліотеки.
 *
 * У ЛР5 працював із файлом rooms.json.
 * У ЛР6 — з таблицею room у MySQL.
 */
class RoomRepository extends BaseRepository {

    public function __construct() {
        parent::__construct('room');
    }

    public function getNameById(string $id): string {
        $room = $this->getById($id);
        return $room ? $room->name : $id;
    }

    protected function mapResult(array $row): Room {
        $room = new Room();
        $room->id   = $row['id'] ?? '';
        $room->name = $row['name'] ?? '';
        return $room;
    }
}

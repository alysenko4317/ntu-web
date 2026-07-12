<?php

namespace Repository;

use Model\Reader;

/**
 * Репозиторій користувачів (читачів бібліотеки).
 *
 * У ЛР5 працював із файлом users.json.
 * У ЛР6 — з таблицею reader у MySQL.
 */
class ReaderRepository extends BaseRepository {

    public function __construct() {
        parent::__construct('reader');
    }

    public function findByTicket(string $ticket): ?Reader {
        $row = $this->db->queryOne(
            "SELECT * FROM reader WHERE UPPER(ticket) = UPPER(:ticket)",
            ['ticket' => trim($ticket)]
        );
        return $row ? $this->mapResult($row) : null;
    }

    public function findByPasswordResetToken(string $token): ?Reader {
        $row = $this->db->queryOne(
            "SELECT * FROM reader WHERE password_reset_token = :token",
            ['token' => $token]
        );
        return $row ? $this->mapResult($row) : null;
    }

    public function save(Reader $reader): bool {
        $this->db->execute(
            "INSERT INTO reader (ticket, first_name, last_name, birthday, phone, room_id, password_hash)
             VALUES (:ticket, :first_name, :last_name, :birthday, :phone, :room_id, :password_hash)",
            [
                'ticket'        => $reader->ticket,
                'first_name'    => $reader->firstName,
                'last_name'     => $reader->lastName,
                'birthday'      => $reader->birthday,
                'phone'         => $reader->phone,
                'room_id'       => $reader->roomId,
                'password_hash' => $reader->password,
            ]
        );

        $reader->id = (int) $this->db->lastInsertId();
        return true;
    }

    public function update(Reader $reader): bool {
        $affected = $this->db->execute(
            "UPDATE reader
                SET first_name = :first_name,
                    last_name  = :last_name,
                    birthday   = :birthday,
                    phone      = :phone,
                    room_id    = :room_id,
                    password_hash        = :password_hash,
                    password_reset_token = :password_reset_token
              WHERE id = :id",
            [
                'first_name'           => $reader->firstName,
                'last_name'            => $reader->lastName,
                'birthday'             => $reader->birthday,
                'phone'                => $reader->phone,
                'room_id'              => $reader->roomId,
                'password_hash'        => $reader->password,
                'password_reset_token' => $reader->passwordResetToken,
                'id'                   => $reader->id,
            ]
        );
        return $affected > 0;
    }

    public function hashPassword(string $password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword(string $password, string $hashedPassword): bool {
        return password_verify($password, $hashedPassword);
    }

    protected function mapResult(array $row): Reader {
        $reader = new Reader();
        $reader->id                 = $row['id'] ?? null;
        $reader->ticket             = $row['ticket'] ?? '';
        $reader->firstName          = $row['first_name'] ?? '';
        $reader->lastName           = $row['last_name'] ?? '';
        $reader->birthday           = $row['birthday'] ?? '';
        $reader->phone              = $row['phone'] ?? '';
        $reader->roomId             = $row['room_id'] ?? '';
        $reader->password           = $row['password_hash'] ?? '';
        $reader->passwordResetToken = $row['password_reset_token'] ?? null;
        $reader->registeredAt       = $row['registered_at'] ?? '';
        return $reader;
    }
}

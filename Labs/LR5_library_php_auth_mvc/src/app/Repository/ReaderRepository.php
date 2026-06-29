<?php

namespace Repository;

use Model\Reader;

class ReaderRepository extends BaseRepository {

    public function __construct() {
        parent::__construct(BASE_PATH . '/data/users.json');
    }

    /**
     * Завантажити всіх користувачів як масив об'єктів Reader.
     */
    public function getAll(): array {
        $results = [];
        foreach ($this->loadAll() as $row) {
            $results[] = $this->mapResult($row);
        }
        return $results;
    }

    /**
     * Знайти користувача за id.
     */
    public function getById(int $id): ?Reader {
        foreach ($this->loadAll() as $row) {
            if ((int)($row['id'] ?? 0) === $id) {
                return $this->mapResult($row);
            }
        }
        return null;
    }

    /**
     * Знайти користувача за password reset token.
     */
    public function findByPasswordResetToken(string $token): ?Reader {
        foreach ($this->loadAll() as $row) {
            if (!empty($row['password_reset_token']) && $row['password_reset_token'] === $token) {
                return $this->mapResult($row);
            }
        }
        return null;
    }

    /**
     * Знайти користувача за ticket.
     */
    public function findByTicket(string $ticket): ?Reader {
        $ticket = mb_strtoupper(trim($ticket), 'UTF-8');
        foreach ($this->loadAll() as $row) {
            if (mb_strtoupper(trim($row['ticket'] ?? ''), 'UTF-8') === $ticket) {
                return $this->mapResult($row);
            }
        }
        return null;
    }

    /**
     * Зберегти нового користувача (додати до масиву).
     */
    public function save(Reader $reader): bool {
        $records = $this->loadAll();

        $maxId = 0;
        foreach ($records as $r) {
            if (($r['id'] ?? 0) > $maxId) {
                $maxId = $r['id'];
            }
        }

        $reader->id = $maxId + 1;

        $records[] = $this->toArray($reader);
        $this->saveAll($records);

        return true;
    }

    /**
     * Оновити існуючого користувача за id.
     */
    public function update(Reader $reader): bool {
        $records = $this->loadAll();
        $found = false;

        foreach ($records as &$row) {
            if ((int)($row['id'] ?? 0) === (int)$reader->id) {
                $row = $this->toArray($reader);
                $found = true;
                break;
            }
        }
        unset($row);

        if ($found) {
            $this->saveAll($records);
        }

        return $found;
    }

    public function hashPassword(string $password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword(string $password, string $hashedPassword): bool {
        return password_verify($password, $hashedPassword);
    }

    private function mapResult(array $row): Reader {
        $reader = new Reader();
        $reader->id = $row['id'] ?? null;
        $reader->ticket = $row['ticket'] ?? '';
        $reader->firstName = $row['first_name'] ?? '';
        $reader->lastName = $row['last_name'] ?? '';
        $reader->birthday = $row['birthday'] ?? '';
        $reader->phone = $row['phone'] ?? '';
        $reader->roomId = $row['room_id'] ?? '';
        $reader->password = $row['password_hash'] ?? '';
        $reader->passwordResetToken = $row['password_reset_token'] ?? null;
        $reader->registeredAt = $row['registered_at'] ?? '';
        return $reader;
    }

    private function toArray(Reader $reader): array {
        return [
            'id' => $reader->id,
            'ticket' => $reader->ticket,
            'first_name' => $reader->firstName,
            'last_name' => $reader->lastName,
            'birthday' => $reader->birthday,
            'phone' => $reader->phone,
            'room_id' => $reader->roomId,
            'password_hash' => $reader->password,
            'password_reset_token' => $reader->passwordResetToken,
            'registered_at' => $reader->registeredAt ?: date('c'),
        ];
    }
}

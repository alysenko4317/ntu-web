<?php

namespace Service;

use Model\Reader;
use Repository\ReaderRepository;

class AuthService {

    private $repository;

    public function __construct() {
        $this->repository = new ReaderRepository();
    }

    public function register(array $data): bool {
        $reader = new Reader();
        $reader->ticket    = $data['ticket'];
        $reader->firstName = $data['first_name'];
        $reader->lastName  = $data['last_name'];
        $reader->birthday  = $data['birthday'];
        $reader->phone     = $data['phone'];
        $reader->roomId    = $data['room_id'];
        $reader->password  = $this->repository->hashPassword($data['password']);

        return $this->repository->save($reader);
    }

    public function login(string $ticket, string $password): ?Reader {
        $reader = $this->repository->findByTicket($ticket);

        if ($reader && $this->repository->verifyPassword($password, $reader->password)) {
            return $reader;
        }

        return null;
    }

    public function getReaderById(int $readerId): ?Reader {
        return $this->repository->getById($readerId);
    }

    /**
     * Генерує токен скидання пароля та зберігає його у профілі користувача.
     */
    public function forgotPassword(string $ticket): ?string {
        $reader = $this->repository->findByTicket($ticket);

        if (!$reader) {
            return null;
        }

        $token = bin2hex(random_bytes(16));
        $reader->passwordResetToken = $token;
        $this->repository->update($reader);

        return $token;
    }

    /**
     * Скидає пароль за токеном.
     */
    public function resetPassword(string $token, string $newPassword): bool {
        $reader = $this->repository->findByPasswordResetToken($token);

        if (!$reader) {
            return false;
        }

        $reader->password = $this->repository->hashPassword($newPassword);
        $reader->passwordResetToken = null;

        return $this->repository->update($reader);
    }
}

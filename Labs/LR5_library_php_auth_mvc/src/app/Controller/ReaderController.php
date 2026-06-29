<?php

namespace Controller;

use Service\AuthService;
use Framework\Session;

class ReaderController extends Controller {

    private $authService;

    public function __construct() {
        parent::__construct();
        $this->authService = new AuthService();
    }

    public function login() {
        $this->display("login");
    }

    public function register() {
        $this->display('register');
    }

    public function forgotPassword() {
        $this->display('forgot-password');
    }

    public function resetPassword() {
        $token = $_GET['token'] ?? '';
        $this->display('reset-password', ['token' => $token]);
    }

    // --- POST handlers ---

    /**
     * Обробник POST-запиту для входу користувача:
     * - Ініціалізує сесію
     * - Збирає дані з HTTP-запиту (ticket, password)
     * - Делегує процедуру аутентифікації authService::login()
     * - Якщо авторизація вдала — зберігає reader_id в сесії і перенаправляє в кабінет
     * - Якщо ні — показує форму з повідомленням про помилку
     */
    public function loginPost() {
        Session::start();

        $ticket = $_POST['ticket'] ?? '';
        $password = $_POST['password'] ?? '';

        $reader = $this->authService->login($ticket, $password);

        if ($reader) {
            Session::regenerate();
            Session::set('reader_id', $reader->id);
            $this->redirect('/cabinet');
        } else {
            $this->display('login', ['error' => 'Неправильний квиток або пароль']);
        }
    }

    public function registerPost() {
        $data = [
            'ticket' => $_POST['ticket'] ?? '',
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'birthday' => $_POST['birthday'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'room_id' => $_POST['room_id'] ?? '',
            'password' => $_POST['password'] ?? '',
        ];

        if ($this->authService->register($data)) {
            $this->redirect('/login');
        } else {
            $this->display('register', ['error' => 'Реєстрація не вдалась']);
        }
    }

    public function forgotPasswordPost() {
        $ticket = $_POST['ticket'] ?? '';
        $token = $this->authService->forgotPassword($ticket);

        if ($token) {
            $this->display('forgot-password', [
                'message' => 'Посилання для скидання пароля (у реальному застосунку надсилається на email):',
                'resetLink' => '/reset-password?token=' . $token,
            ]);
        } else {
            $this->display('forgot-password', [
                'error' => 'Користувача з таким квитком не знайдено',
            ]);
        }
    }

    public function resetPasswordPost() {
        $token = $_POST['token'] ?? '';
        $newPassword = $_POST['password'] ?? '';

        if ($this->authService->resetPassword($token, $newPassword)) {
            $this->redirect('/login');
        } else {
            $this->display('reset-password', [
                'token' => $token,
                'error' => 'Недійсний або прострочений токен',
            ]);
        }
    }

    public function logout() {
        Session::destroy();
        $this->redirect('/login');
    }

    public function cabinet() {
        Session::start();
        $readerId = Session::get('reader_id');

        if (!$readerId) {
            $this->redirect('/login');
            return;
        }

        $reader = $this->authService->getReaderById($readerId);

        if (!$reader) {
            Session::destroy();
            $this->redirect('/login');
            return;
        }

        $this->display('cabinet', ['reader' => $reader]);
    }
}

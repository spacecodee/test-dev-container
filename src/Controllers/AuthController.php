<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\UserModel;

class AuthController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login(): void
    {
        // If already logged in, redirect to dashboard
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
            exit();
        }

        echo View::render('Auth/Login', ['title' => 'Login - Document Management']);
    }

    public function authenticate(): void
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
            return;
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        try {
            $user = $this->userModel->findByEmail($email);

            if (!$user || !password_verify($password, $user['clave'])) {
                http_response_code(401);
                echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
                return;
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nombre'];
            $_SESSION['user_email'] = $user['correo'];

            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful',
                'redirect' => '/dashboard'
            ]);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'An error occurred']);
        }
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /login');
        exit();
    }
}

<?php

namespace App\Middleware;

class AuthMiddleware
{
    public static function handle(): void
    {
        // Don't redirect if already on login page
        if (!isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] !== '/login') {
            header('Location: /login');
            exit();
        }

        // Redirect to dashboard if logged in and trying to access login page
        if (isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] === '/login') {
            header('Location: /dashboard');
            exit();
        }
    }
}

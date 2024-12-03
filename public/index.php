<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Application;
use App\Core\Exceptions\ErrorHandler;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Start session at the beginning
session_start();

// Basic error handling
error_reporting(E_ALL);
ini_set('display_errors', $_ENV['APP_DEBUG'] ?? false);

// Initialize application
try {
    $app = Application::getInstance();

    // Add asset path constant to your configuration
    define('ASSET_PATH', '/assets');

    // Add routes
    $router = $app->getRouter();

    // Public routes first
    $router->get('/login', 'AuthController@login');
    $router->post('/auth/authenticate', 'AuthController@authenticate');
    $router->get('/logout', 'AuthController@logout');

    // Protected routes
    $router->get('/', 'HomeController@index')->middleware('Auth');
    $router->get('/dashboard', 'DashboardController@index')->middleware('Auth');

    // Run the application
    $app->run();
} catch (Exception $e) {
    error_log($e->getMessage());
    ErrorHandler::render($e);
}

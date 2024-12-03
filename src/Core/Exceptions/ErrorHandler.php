<?php

namespace App\Core\Exceptions;

use Exception;

class ErrorHandler
{
    public static function render(Exception $e): void
    {
        http_response_code(500);

        $debug = isset($_ENV['APP_DEBUG']) && $_ENV['APP_DEBUG'];
        $message = $debug ? $e->getMessage() : 'An error occurred';

        self::renderTemplate($message, $debug);
    }

    private static function renderTemplate(string $message, bool $debug): void
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Error</title>
        </head>

        <body>
        <h1>An error occurred</h1>
        <?php if ($debug): ?>
            <pre><?= htmlspecialchars($message) ?></pre>
        <?php endif; ?>
        </body>

        </html>
        <?php
    }
}

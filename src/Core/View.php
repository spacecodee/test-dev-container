<?php

namespace App\Core;

use App\Core\Interfaces\ViewInterface;
use RuntimeException;

class View implements ViewInterface
{
    public static function render(string $view, array $data = []): string
    {
        $viewClass = 'App\\Views\\' . str_replace('/', '\\', ucfirst($view)) . 'View';

        if (!class_exists($viewClass)) {
            throw new RuntimeException("View class {$viewClass} not found");
        }

        $template = new $viewClass($data);
        return $template->render();
    }
}

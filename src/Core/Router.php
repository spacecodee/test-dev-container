<?php

namespace App\Core;

class Router
{
    private array $routes = [];
    private array $middleware = [];

    public function get(string $path, string $callback): self
    {
        $this->routes['GET'][$path] = [
            'callback' => $callback,
            'middleware' => []
        ];
        return $this;
    }

    public function post(string $path, string $callback): self
    {
        $this->routes['POST'][$path] = [
            'callback' => $callback,
            'middleware' => []
        ];
        return $this;
    }

    public function middleware(string $middleware): self
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            $this->routes[$method][$path]['middleware'][] = $middleware;
        }

        return $this;
    }

    /**
     * @throws \Exception
     */
    public function resolve()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $route = $this->routes[$method][$path] ?? null;

        if (!$route) {
            throw new \Exception('Route not found');
        }

        // Check middleware
        foreach ($route['middleware'] as $middleware) {
            $middlewareClass = "App\\Middleware\\{$middleware}Middleware";
            if (method_exists($middlewareClass, 'handle')) {
                $middlewareClass::handle();
            }
        }

        $callback = $route['callback'];
        if (is_string($callback)) {
            [$controller, $action] = explode('@', $callback);
            $controllerClass = "App\\Controllers\\{$controller}";
            $controller = new $controllerClass();
            return $controller->$action();
        }

        return $callback();
    }
}

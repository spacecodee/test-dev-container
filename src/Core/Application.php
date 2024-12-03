<?php

namespace App\Core;

class Application
{
    private static ?self $instance = null;
    private Router $router;

    public function __construct()
    {
        self::$instance = $this;
        $this->router = new Router();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

    public function run(): void
    {
        try {
            $this->router->resolve();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

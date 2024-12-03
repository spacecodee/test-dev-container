<?php

namespace App\Core\Template;

abstract class ViewTemplate
{
    protected array $data = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    abstract public function render(): string;

    protected function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}

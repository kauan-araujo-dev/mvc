<?php

namespace App\Core;

class Request
{
    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    public function input(string $key, mixed $default = null): string | array
    {
        return array_merge($_GET, $_POST)[$key] ?: $default;
    }

    public function get(string $key, mixed $default = null): string | array
    {
        return $_GET[$key] ?? $default;
    }

    public function post(string $key, mixed $default = null): string | array
    {
        return $_POST[$key] ?? $default;
    }

    public function json(): array
    {
        return json_decode(file_get_contents("php://input"), true);
    }
}

<?php
use App\Config\Database;

if (!function_exists('db')) {
    function db(): PDO
    {
        return Database::getInstance()->getConnection();
    }
}

if (!function_exists('redirect')) {
    function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}

if (!function_exists('e')) {
    function e(string $text): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}
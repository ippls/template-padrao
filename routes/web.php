<?php
/**
 * Rotas Web - Template Padrão IPPLS
 * Sistema de roteamento centralizado com tratamento de erros
 */

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

// ===============================
// CAPTURA DA URL
// ===============================
// page = páginas normais
// action = ações de CRUD
$page   = $_GET['page']   ?? null;
$action = $_GET['action'] ?? null;

try {

    // ===============================
    // 1. ROTAS DE PÁGINAS
    // ===============================
    if ($page) {

        switch ($page) {
            case 'home':
                $controller = new HomeController();
                return $controller->index();

            case 'users':
                $controller = new UserController();
                return $controller->index();

            case 'docs':
                $controller = new HomeController();
                return $controller->docs();
                exit;

            default:
                http_response_code(404);
                require ERRORS_PATH . '/404.php';
                exit;
        }
    }

    // ===============================
    // 2. ROTAS DE AÇÕES (CRUD)
    // ===============================
    if ($action) {

        switch ($action) {
            case 'index':
                $controller = new UserController();
                return $controller->index();

            case 'create':
                $controller = new UserController();
                return $controller->create();

            case 'update':
                $controller = new UserController();
                return $controller->update();

            case 'delete':
                $controller = new UserController();
                return $controller->delete();

            default:
                http_response_code(404);
                require ERRORS_PATH . '/404.php';
                exit;
        }
    }

    // ===============================
    // 3. SE NADA FOI DEFINIDO → HOME
    // ===============================
    $controller = new HomeController();
    return $controller->index();


} catch (\Exception $e) {

    // ===============================
    // TRATAMENTO DE ERROS 500
    // ===============================
    error_log("ERRO NO SISTEMA: " . $e->getMessage());
    error_log("ARQUIVO: " . $e->getFile());
    error_log("LINHA: " . $e->getLine());

    http_response_code(500);

    if (APP_ENV === 'development') {
        echo "<h1>Erro 500 - Desenvolvimento</h1>";
        echo "<p><strong>Mensagem:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<p><strong>Arquivo:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
        echo "<p><strong>Linha:</strong> " . $e->getLine() . "</p>";
        echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    } else {
        require ERRORS_PATH . '/500.php';
    }
}
<?php
/**
 * Template Padrão - MVC Profissional com Composer
 * IPPLS - Instituto Politécnico Privado Lucrêcio dos Santos
 *
 * ORDEM DE CARREGAMENTO CRÍTICA:
 * 1. Composer Autoload
 * 2. Configurações (app.php)
 * 3. Database (com função helper db())
 * 4. Sessão
 * 5. Rotas (que usam Controllers que usam Models que usam db())
 */

// ============================================
// 1. AUTOLOADER DO COMPOSER (PSR-4)
// ============================================
require_once __DIR__ . '/vendor/autoload.php';

// ============================================
// 2. CONFIGURAÇÕES DA APLICAÇÃO
// ============================================
require_once __DIR__ . '/app/config/app.php';

// ============================================
// 2.1. CONSTANTES GLOBAIS ⭐ DEVE VIR ANTES
// ============================================
require_once __DIR__ . '/app/config/constants.php';

// ============================================
// 3. DATABASE (CRÍTICO: Deve carregar ANTES das rotas)
// ============================================
require_once CONFIG_PATH . '/database.php';

// ============================================
// 4. HELPERS (função db() global) ⭐ CRÍTICO
// ============================================
require_once CONFIG_PATH . '/helpers.php';

// ============================================
// 5. INICIAR SESSÃO
// ============================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ============================================
// 6. SISTEMA DE ROTAS (Agora db() está disponível)
// ============================================
require_once ROUTES_PATH . '/web.php';
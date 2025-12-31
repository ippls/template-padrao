<?php
/**
 * Configuração da Aplicação
 */

define('APP_NAME', 'Projeto IPPLS');
define('APP_URL', 'http://localhost');
define('APP_ENV', 'development');

// Timezone
date_default_timezone_set('Africa/Luanda');

// Error reporting
if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
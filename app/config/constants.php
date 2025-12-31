<?php
/**
 * Constantes Globais - Template Padrão MVC
 * Define caminhos e configurações centralizadas
 */

// ============================================
// CAMINHOS BASE
// ============================================

define('BASE_PATH', dirname(__DIR__, 2));           // c:\xampp\htdocs\projeto_padrao
define('APP_PATH', BASE_PATH . '/app');              // c:\xampp\htdocs\projeto_padrao\app
define('VIEWS_PATH', BASE_PATH . '/views');          // c:\xampp\htdocs\projeto_padrao\views
define('ASSETS_PATH', BASE_PATH . '/assets');        // c:\xampp\htdocs\projeto_padrao\assets
define('CONFIG_PATH', APP_PATH . '/config');         // c:\xampp\htdocs\projeto_padrao\app\config
define('CONTROLLERS_PATH', APP_PATH . '/Http/Controllers');  // c:\xampp\htdocs\projeto_padrao\app/Http/Controllers
define('MODELS_PATH', APP_PATH . '/Models');         // c:\xampp\htdocs\projeto_padrao\app/Models
define('ROUTES_PATH', BASE_PATH . '/routes');        // c:\xampp\htdocs\projeto_padrao\routes
define('VENDOR_PATH', BASE_PATH . '/vendor');        // c:\xampp\htdocs\projeto_padrao\vendor

// ============================================
// CAMINHOS ESPECÍFICOS DE VIEWS
// ============================================

define('LAYOUTS_PATH', VIEWS_PATH . '/layouts');     // c:\xampp\htdocs\projeto_padrao\views\layouts
define('PAGES_PATH', VIEWS_PATH . '/pages');         // c:\xampp\htdocs\projeto_padrao\views\pages
define('COMPONENTS_PATH', VIEWS_PATH . '/components');  // c:\xampp\htdocs\projeto_padrao\views\components
define('ERRORS_PATH', VIEWS_PATH . '/errors');       // c:\xampp\htdocs\projeto_padrao\views\errors

// ============================================
// CAMINHOS DE ASSETS
// ============================================

define('CSS_PATH', ASSETS_PATH . '/css');            // c:\xampp\htdocs\projeto_padrao\assets\css
define('JS_PATH', ASSETS_PATH . '/js');              // c:\xampp\htdocs\projeto_padrao\assets\js
define('IMAGES_PATH', ASSETS_PATH . '/images');      // c:\xampp\htdocs\projeto_padrao\assets\images

// ============================================
// AMBIENTE E DEBUG
// ============================================

define('IS_DEVELOPMENT', APP_ENV === 'development');
define('IS_PRODUCTION', APP_ENV === 'production');
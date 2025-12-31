<?php

namespace App\Http\Controllers;

class HomeController
{
    public function index(): void
    {
        // Título da página (view)
        $title = 'Template Padrão MVC - IPPLS';

        // Conteúdo da página (view)
        $content = PAGES_PATH . '/home.php';

        // Redireciona para a view do layout principal
        require LAYOUTS_PATH . '/main.php';
    }

    public function docs(): void
    {
        // Título da página de documentação (view)
        $title = 'Documentação do Template';

        // Conteúdo da página de documentação (view)
        $content = PAGES_PATH . '/docs.php';

        // Redireciona para a view do layout principal
        require LAYOUTS_PATH . '/main.php';
    }
}
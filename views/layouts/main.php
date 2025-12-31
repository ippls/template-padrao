<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'IPPLS Template' ?></title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- Arquivo de importação dos Componentes CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Fonteawesome para icones -->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
</head>
<body>
    <!-- Barra de navegação (Menu) -->
    <?php require COMPONENTS_PATH . '/navbar.php'; ?>

    <!-- Conteúdo das páginas -->
    <?php require $content; ?>

    <!-- Rodapé -->
    <?php require COMPONENTS_PATH . '/footer.php'; ?>

    <!-- Script para Menu Mobile -->
    <script src="assets/js/components/navbar.js"></script>

    <!-- Scripts do Botão Voltar ao Topo ( O botão será criado automaticamente pelo JavaScript ) -->
    <script src="assets/js/components/backToTop.js"></script>

    <!-- Script Principal -->
    <script src="assets/js/main.js"></script>
</body>
</html>
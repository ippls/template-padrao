<!-- Barra de Navegação Principal -->
<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo -->
        <div class="navbar-brand">
            <a href="?page=home" class="navbar-logo">
                <img src="assets/images/logo/ippls-logo-removebg-preview.png" alt="IPPLS" class="navbar-logo-img">
                <span class="navbar-logo-text">IPPLS</span>
            </a>
        </div>

        <!-- Menu Toggle (Mobile) -->
        <button class="navbar-toggle" id="navbarToggle" aria-label="Menu">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>

        <!-- Links de Navegação -->
        <ul class="navbar-menu" id="navbarMenu">
            <li class="navbar-item">
                <a href="?page=home" class="navbar-link <?= ($_GET['page'] ?? 'home') === 'home' ? 'active' : '' ?>">
                    <i class="fas fa-home"></i> Início
                </a>
            </li>
            <li class="navbar-item">
                <a href="?page=users" class="navbar-link <?= ($_GET['page'] ?? '') === 'users' ? 'active' : '' ?>">
                    <i class="fas fa-users"></i> Usuários
                </a>
            </li>
            <li class="navbar-item">
                <a href="?page=docs" class="navbar-link <?= ($_GET['page'] ?? '') === 'docs' ? 'active' : '' ?>">
                    <i class="fas fa-book"></i> Documentação
                </a>
            </li>
        </ul>

        <!-- Botões de Ação -->
        <div class="navbar-actions">
            <a href="?page=users" class="btn btn-primary btn-sm">
                <i class="fas fa-user-plus"></i> Novo Usuário
            </a>
        </div>
    </div>
</nav>
<?php
    $title;
?>
<!-- Main Container -->
<div class="main-container">
    <!-- Alert Messages -->
    <?php if (isset($controller) && $controller->hasMessage()): ?>
        <div class="alert alert-<?= $controller->getMessageType() ?>">
            <span><?= $controller->getMessageType() === 'success' ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-exclamation-triangle"></i>' ?></span>
            <span><?= htmlspecialchars($controller->getMessage()) ?></span>
        </div>
        <?php $controller->clearMessage(); ?>
    <?php endif; ?>

    <h1 class="hero-title">
        CRUD - <span class="hero-title-highlight">CREATE</span> READ <span class="hero-title-highlight">UPDATE</span> DELETE
    </h1><br>

    <!-- Create/Edit User Card -->
    <div class="card" id="form">
        <div class="card-header">
            <h2><?= isset($_GET['edit']) ? '<i class="fas fa-user-edit"></i> Editar Usuário' : '<i class="fas fa-user-plus"></i> Criar Usuário' ?></h2>
        </div>
        <div class="card-body">
            <?php
            $editUser = null;
            if (isset($_GET['edit']) && isset($controller)) {
                $editUser = $controller->getUserById(intval($_GET['edit']));
            }
            ?>
            <form method="POST" action="?action=<?= $editUser ? 'update' : 'create' ?>">
                <?php if ($editUser): ?>
                    <input type="hidden" name="id" value="<?= $editUser['id'] ?>">
                <?php endif; ?>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="name"><i class="fas fa-user"></i> Nome Completo *</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            value="<?= htmlspecialchars($editUser['name'] ?? '') ?>"
                            placeholder="Digite o nome"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email"><i class="fas fa-envelope"></i> Email *</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            value="<?= htmlspecialchars($editUser['email'] ?? '') ?>"
                            placeholder="exemplo@ippls.edu.ao"
                            required
                        >
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas <?= $editUser ? 'fa-save' : 'fa-plus-circle' ?>"></i>
                        <?= $editUser ? 'ATUALIZAR' : 'CRIAR' ?>
                    </button>
                    <?php if ($editUser): ?>
                        <a href="?page=users" class="btn btn-secondary"><i class="fas fa-times"></i> CANCELAR</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <!-- Users List Card -->
    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-list"></i> Usuários Cadastrados (<?= count($users ?? []) ?>)</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($users)): ?>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag"></i> ID</th>
                                <th><i class="fas fa-user"></i> Nome</th>
                                <th><i class="fas fa-envelope"></i> Email</th>
                                <th><i class="fas fa-calendar"></i> Data</th>
                                <th><i class="fas fa-cog"></i> Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><strong>#<?= $user['id'] ?></strong></td>
                                    <td><?= htmlspecialchars($user['name']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td><?= date('d/m/Y', strtotime($user['created_at'] ?? 'now')) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="?page=users&edit=<?= $user['id'] ?>" class="btn btn-sm btn-edit">
                                                <i class="fas fa-edit"></i> EDITAR
                                            </a>
                                            <form method="POST" action="?action=delete" class="inline-form"
                                                    onsubmit="return confirm('⚠️ Tem certeza que deseja excluir este usuário?');">
                                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-delete">
                                                    <i class="fas fa-trash"></i> DELETAR
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-state-icon"><i class="fas fa-inbox fa-4x"></i></div>
                    <h3>Nenhum Usuário</h3>
                    <p>Crie o primeiro usuário usando o formulário acima.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
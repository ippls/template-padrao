<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController
{
    private User $userModel;
    private array $message = [];

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * Exibe lista de usuários
     */
    public function index(): void
    {
        $users = $this->userModel->all();
        $controller = $this; // Passa referência para a view
        // Título da página (view)
        $title = 'Kit Inicial - Gestão de Usuários';
        // Conteúdo da página (view)
        $content = PAGES_PATH . '/users.php';
        // Redireciona para a view do layout principal
        require LAYOUTS_PATH . '/main.php';
    }

    /**
     * Cria novo usuário
     */
    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('index');
        }

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');

        // Validações
        if (empty($name) || empty($email)) {
            $this->setMessage('error', 'Preencha todos os campos obrigatórios!');
            $this->redirect('index');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->setMessage('error', 'Email inválido!');
            $this->redirect('index');
        }

        if ($this->userModel->emailExists($email)) {
            $this->setMessage('error', 'Email já cadastrado no sistema!');
            $this->redirect('index');
        }

        // Cria usuário
        if ($this->userModel->create(['name' => $name, 'email' => $email])) {
            $this->setMessage('success', '✅ Usuário criado com sucesso!');
        } else {
            $this->setMessage('error', '❌ Erro ao criar usuário. Tente novamente.');
        }

        $this->redirect('index');
    }

    /**
     * Atualiza usuário existente
     */
    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('index');
        }

        $id = intval($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if ($id <= 0) {
            $this->setMessage('error', 'ID inválido!');
            $this->redirect('index');
        }

        if (empty($name) || empty($email)) {
            $this->setMessage('error', 'Preencha todos os campos!');
            $this->redirect('index', ['edit' => $id]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->setMessage('error', 'Email inválido!');
            $this->redirect('index', ['edit' => $id]);
        }

        if ($this->userModel->emailExists($email, $id)) {
            $this->setMessage('error', 'Email já cadastrado por outro usuário!');
            $this->redirect('index', ['edit' => $id]);
        }

        if ($this->userModel->update($id, ['name' => $name, 'email' => $email])) {
            $this->setMessage('success', '✅ Usuário atualizado com sucesso!');
        } else {
            $this->setMessage('error', '❌ Erro ao atualizar usuário.');
        }

        $this->redirect('index');
    }

    /**
     * Deleta usuário
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('index');
        }

        $id = intval($_POST['id'] ?? 0);

        if ($id <= 0) {
            $this->setMessage('error', 'ID inválido!');
            $this->redirect('index');
        }

        if ($this->userModel->delete($id)) {
            $this->setMessage('success', '✅ Usuário deletado com sucesso!');
        } else {
            $this->setMessage('error', '❌ Erro ao deletar usuário.');
        }

        $this->redirect('index');
    }

    /**
     * Obtém usuário por ID (para edição)
     */
    public function getUserById(int $id): ?array
    {
        return $this->userModel->find($id);
    }

    // ============================================
    // SISTEMA DE MENSAGENS FLASH
    // ============================================

    private function setMessage(string $type, string $message): void
    {
        $_SESSION['flash_message'] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public function hasMessage(): bool
    {
        return isset($_SESSION['flash_message']);
    }

    public function getMessage(): string
    {
        return $_SESSION['flash_message']['message'] ?? '';
    }

    public function getMessageType(): string
    {
        return $_SESSION['flash_message']['type'] ?? 'info';
    }

    public function clearMessage(): void
    {
        unset($_SESSION['flash_message']);
    }

    // ============================================
    // HELPERS
    // ============================================

    private function redirect(string $action = 'index', array $params = []): void
    {
        $query = http_build_query(array_merge(['action' => $action], $params));
        header("Location: ?{$query}");
        exit;
    }
}
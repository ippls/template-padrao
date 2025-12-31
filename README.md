# 📚 Template Padrão MVC - IPPLS

<div align="left">

**Template de Padronização para Projetos Acadêmicos**

[<img src="assets/images/logo/php.svg" alt="PHP" height="80" style="margin-left: .5rem;">](https://www.php.net/)
[<img src="assets/images/logo/composer.svg" alt="Composer" height="80"" style="margin-left: .5rem;">](https://getcomposer.org/)
[<img src="assets/images/logo/mysql.svg" alt="MySQL" height="80"" style="margin-left: .5rem;">](https://www.mysql.com/)
[<img src="assets/images/logo/license.svg" alt="License" height="50"" style="margin-left: .5rem;">](LICENSE)

[🚀 Instalação](#instalao) · [📖 Estrutura](#estrutura-do-projeto) · [💡 Criar Módulo](#criando-um-novo-mdulo) · [🐛 Problemas](#troubleshooting)

</div>

---

## <i class="fas fa-info-circle"></i> Sobre o Template

O **Template Padrão MVC - IPPLS** é uma solução profissional desenvolvida pelo **António Ambrósio Ngola** para ensinar e padronizar o desenvolvimento web, usando arquitetura MVC com foco no mercado de trabalho. Este template ajuda ao utilizador a se alinhar com boas práticas e profissionalismo na indústria de software, evitando perda de tempo no setup inicial de seus projetos de programação web. Explore o template apartir da documentação e sinta o poder dessa stack!

### ✨ Características

- 🏗️ **Arquitetura MVC** - Model, View, Controller bem definidos
- 📦 **Composer PSR-4** - Autoloading automático de classes
- 🛣️ **Sistema de Rotas** - Centralizado em `routes/web.php`
- 🏷️ **Namespaces** - Organização moderna com `App\`
- 🔒 **Segurança** - Prepared statements e sanitização
- 📱 **Design Responsivo** - Mobile-first com CSS modular
- 📚 **Documentação Web** - Interface moderna integrada

### 🎓 Ideal Para

- ✅ Estudantes aprendendo PHP e MVC
- ✅ Projetos acadêmicos do IPPLS
- ✅ Protótipos rápidos
- ✅ Base para projetos pequenos/médios

---

## 📊 Níveis de Template

| Template     |   Complexidade   | Características             |
| ------------ | :--------------: | --------------------------- |
| **Base**     |    🟢 Básico     | MVC simples sem autoloading |
| **Padrão**   | 🟡 Intermediário | **Este template** 👈        |
| **Avançado** |   🔴 Avançado    | Services, Middleware, API   |

---

## 📋 Requisitos

### Obrigatórios

```plaintext
✅ PHP >= 8.0
✅ Composer >= 2.0
✅ MySQL >= 5.7 ou MariaDB >= 10.2
✅ Apache com mod_rewrite
✅ Extensões: PDO, PDO_MySQL, mbstring
```

### Recomendado

```plaintext
🚀 PHP 8.2+
🚀 MySQL 8.0+
🚀 512MB RAM
```

---

## 🚀 Instalação

### 1. Clone ou Baixe

```bash
# Via Git
git clone https://github.com/ippls/template-padrao.git meu-projeto
cd meu-projeto
```

Ou baixe o ZIP apartir da plataforma e extraia

### 1.1 Configurar Servidor Local

Coloque os arquivos na pasta do seu servidor web:<br>

- **XAMPP**: `C:\xampp\htdocs\meu-projeto`
- **WAMP**: `C:\wamp64\www\meu-projeto`
- **MAMP**: `/Applications/MAMP/htdocs/meu-projeto`<br>
  Abre o projeto (meu-projeto) em um editor de código como:
- **VSCODE**

### 2. Instale Dependências

```bash
composer install
```

Ou se preferir especificar o autoload diretamente

```bash
composer dump-autoload
```

> **💡 Não tem Composer?** [Baixe aqui](https://getcomposer.org)

### 3. Configure o Banco

#### Criar banco:

```sql
CREATE DATABASE meu_projeto
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

#### Criar tabela users para teste:

```sql
USE meu_projeto;
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### Dados para teste (CRUD):

```sql
INSERT INTO users (name, email) VALUES
('Pai Grande Ngola', 'paigrandengola@gmail.com'),
('Kelson Filipe Dev', 'kelsonfilipedev@gmail.com');
('Anacleto Hebo', 'anacletohebo@gmail.com');
('Iliano Nicolau', 'ilianonicolau@gmail.com');
('José Adriano Mbala', 'adrianombala@gmail.com');
('José Lengo Júnior', 'lengojunior@gmail.com');
('João Victorino Bin', 'joaovictorinobin@gmail.com');
('Adário Mutembele Assunção', 'adarioassuncao@gmail.com');
('Zenaida Barbose', 'zenaidabarbose@gmail.com');
('Eng. Vanilson Manuel', 'vanilsonmanuel@gmail.com');
```

### 4. Configure Conexão

Edite `app/config/database.php`:

```php
$host = getenv('DB_HOST') ?: 'localhost';
$name = getenv('DB_NAME') ?: 'projeto_padrao';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
```

### 5. Acesse o Sistema

```
http://localhost/meu-projeto
```

**URLs disponíveis:**

- `/` - Página inicial
- `/?page=users` - Gestão de usuários com CRUD completo
- `/?page=docs` - Documentação do Template/Projeto

---

## 📁 Estrutura do Projeto

```
meu-projeto/
│
├── 📄 index.php                 # Ponto de entrada
├── 📄 composer.json             # Dependências e PSR-4
├── 📄 .htaccess                 # Reescrita de URLs
├── 📄 README.md                 # Esta documentação
│
├── 📁 app/                      # Código da aplicação
│   ├── config/                  # Configurações
│   │   ├── app.php             # Config gerais
│   │   ├── database.php        # Conexão PDO
│   │   ├── helpers.php         # Funções globais
│   │   └── constants.php       # Constantes de paths
│   ├── Http/Controllers/       # Controllers
│   │   ├── HomeController.php
│   │   └── UserController.php
│   └── Models/                  # Models
│       └── User.php
│
├── 📁 routes/                   # Sistema de rotas
│   └── web.php                 # Rotas da aplicação
│
├── 📁 views/                    # Templates PHP
│   ├── layouts/                # Layouts base
│   │   └── main.php
│   ├── pages/                  # Páginas
│   │   ├── home.php
│   │   ├── users.php
│   │   └── docs.php
│   ├── components/             # Componentes
│   │   ├── navbar.php
│   │   └── footer.php
│   └── errors/                 # Páginas de erro
│       ├── 404.php
│       └── 500.php
│
├── 📁 assets/                  # Recursos estáticos
│   ├── css/                    # Estilos
│   │   ├── components/         # Componentes CSS
│   │   ├── sections/           # Componentes de Secções
│   │   ├── base.css            # Reset e variáveis
│   │   └── style.css           # Importação central
│   ├── js/                     # JavaScript
│   │   ├── components/
│   │   ├────── navbar.js
│   │   ├────── docs.js
│   │   ├────── backToTop.js
│   │   ├── main.js
│   └── images/                 # Imagens
│
└── 📁 vendor/                   # Dependências Composer
```

---

## 🎓 Como Funciona

### Fluxo de Execução

```
1. index.php
   ↓
2. Composer Autoload (PSR-4)
   ↓
3. Configurações (app.php, database.php, helpers.php)
   ↓
4. Session Start
   ↓
5. routes/web.php (Roteamento)
   ↓
6. Controller (processa requisição)
   ↓
7. Model (acessa banco de dados)
   ↓
8. View (renderiza HTML)
```

### Padrão MVC

```
┌─────────┐      ┌────────────┐      ┌──────┐
│  Model  │◄─────│ Controller │─────►│ View │
│  (BD)   │      │  (Lógica)  │      │ (UI) │
└─────────┘      └────────────┘      └──────┘
```

### Sistema de Rotas

```php
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
```

### Autoloading PSR-4

```json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/"
    }
  }
}
```

---

## 🛠️ Criando um Novo Módulo

### Exemplo Completo: Produtos

#### 1️⃣ Criar Tabela

```sql
CREATE TABLE products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_name (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### 2️⃣ Criar Model

```php
<?php
// app/Models/Product.php
namespace App\Models;
use PDO;
class Product {
    private PDO $db;
    public function __construct() {
        $this->db = db();
    }
    public function all(): array {
        $query = "SELECT * FROM products ORDER BY name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find(int $id): ?array {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    public function create(array $data): bool {
        $query = "INSERT INTO products (name, price, stock)
                  VALUES (:name, :price, :stock)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }
    public function delete(int $id): bool {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
}
```

#### 3️⃣ Criar Controller

```php
<?php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;
use App\Models\Product;
class ProductController {
    private Product $product;
    public function __construct() {
        $this->product = new Product();
    }
    public function index(): void {
        $products = $this->product->all();
        $title = 'Produtos';
        $content = PAGES_PATH . '/products.php';
        require LAYOUTS_PATH . '/main.php';
    }
    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'stock' => $_POST['stock'] ?? 0
            ];
            if ($this->product->create($data)) {
                $_SESSION['flash_message'] = [
                    'type' => 'success',
                    'message' => 'Produto criado com sucesso!'
                ];
                redirect('/?page=products');
            }
        }
        $title = 'Novo Produto';
        $content = PAGES_PATH . '/product-form.php';
        require LAYOUTS_PATH . '/main.php';
    }
}
```

#### 4️⃣ Criar View

```php
<?php
// views/pages/products.php
?>
<div class="main-container">
    <div class="page-header">
        <h1><i class="fas fa-box"></i> Produtos</h1>
        <a href="/?page=products&action=create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo
        </a>
    </div>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= e($product['name']) ?></td>
                        <td>R$ <?= number_format($product['price'], 2, ',', '.') ?></td>
                        <td><?= $product['stock'] ?></td>
                        <td>
                            <a href="/?page=products&action=delete&id=<?= $product['id'] ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Tem certeza?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
```

#### 5️⃣ Adicionar Rota

```php
<?php
// routes/web.php
use App\Http\Controllers\ProductController;
// Adicione este case no switch:
case 'products':
    $controller = new ProductController();
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'create':
                $controller->create();
                break;
            case 'delete':
                $controller->delete();
                break;
            default:
                $controller->index();
        }
    } else {
        $controller->index();
    }
    break;
```

---

## 🔒 Segurança

### ✅ Prepared Statements

```php
// ✅ CORRETO - Seguro contra SQL Injection
$stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);
// ❌ ERRADO - Vulnerável
$query = "SELECT * FROM users WHERE email = '$email'";
```

### ✅ Sanitização HTML

```php
// Use a função e() incluída no template
echo e($user['name']); // Escapado com htmlspecialchars()
// Ou diretamente:
echo htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
```

### ✅ Validação de Dados

```php
// Email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email inválido';
}
// Números
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
// Não vazio
if (empty(trim($_POST['name']))) {
    $errors[] = 'Nome é obrigatório';
}
```

### ✅ Sessões Seguras

```php
// app/config/app.php
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true,  // Apenas HTTPS
    'cookie_samesite' => 'Strict'
]);
```

---

## 💡 Boas Práticas

### 1. Use Type Hints

```php
public function find(int $id): ?array {
    // ...
}
public function create(array $data): bool {
    // ...
}
```

### 2. Separe Responsabilidades

```php
// ✅ BOM: Lógica no Model
class User {
    public function findByEmail(string $email): ?array {
        // SQL aqui
    }
}
// ❌ RUIM: SQL no Controller
class UserController {
    public function index() {
        $query = "SELECT * FROM users"; // Não faça isso
    }
}
```

### 3. Mensagens Flash

```php
// Controller
$_SESSION['flash_message'] = [
    'type' => 'success',
    'message' => 'Salvo com sucesso!'
];
redirect('/?page=users');
// View (já implementado no layout)
// As mensagens são exibidas automaticamente
```

### 4. Use Constantes de Path

```php
// ✅ CORRETO
require PAGES_PATH . '/home.php';
require COMPONENTS_PATH . '/navbar.php';
// ❌ EVITE
require __DIR__ . '/../../../views/pages/home.php';
```

---

## 🎨 Customização

### Alterar Cores

Edite `assets/css/base/reset.css`:

```css
:root {
  --ippls-blue-dark: #002b5b;
  --ippls-gold: #ffd700;
  --ippls-red: #c1272d;
}
```

### Adicionar Estilos

```css
/* assets/css/components/meu-componente.css */
.meu-componente {
  /* seus estilos */
}
```

```css
/* assets/css/style.css - Importar */
@import "components/meu-componente.css";
```

---

## 🐛 Troubleshooting

### ❌ "Class not found"

```bash
composer dump-autoload
```

### ❌ "Database connection failed"

1. Verifique credenciais em `app/config/database.php`<br>
2. Confirme que MySQL está rodando<br>
3. Teste: `mysql -u root -p`

### ❌ Erro 404 em todas as páginas

1. Verifique `mod_rewrite`:

```bash
apache2ctl -M | grep rewrite
```

2. Confirme que `.htaccess` existe<br
3. Verifique `AllowOverride All` no Apache

### ❌ CSS/JS não carregam

Verifique caminhos no `main.php`:

```php
<link rel="stylesheet" href="assets/css/style.css">
```

---

## 📚 Funções Auxiliares

O template inclui funções em `app/config/helpers.php`:

### `db()`

```php
// Retorna instância PDO
$db = db();
$stmt = $db->prepare("SELECT * FROM users");
```

### `e()`

```php
// Escapa HTML
echo e($user['name']);
```

### `redirect()`

```php
// Redireciona e para execução
redirect('/?page=home');
```

---

## 📖 Documentação Web

Ao acessar `/?page=docs` poderás visualizar:

- ✅ Navegação interativa
- ✅ Pesquisa em tempo real
- ✅ Tema claro/escuro
- ✅ Syntax highlighting
- ✅ Design responsivo

---

## 🤝 Contribuindo

1. Fork o repositório<br>
2. Crie uma branch (`git checkout -b feature/MinhaFeature`)<br>
3. Commit (`git commit -m 'Adiciona MinhaFeature'`)<br>
4. Push (`git push origin feature/MinhaFeature`)<br>
5. Abra um Pull Request

---

## 📄 Licença

Este projeto está sob a licença MIT.

---

## 🏫 Créditos

**Instituto Politécnico Privado Lucrêcio dos Santos (IPPLS)**

- 🌍 Luanda, Angola
- 📧 suporte@ippls.ao
- 🌐 [ippls.ao](https://ippls.ao)

---

<div align="center">

**Desenvolvido com 💙 para o IPPLS**

_Template Padrão MVC v1.0.0 © 2025_

</div>
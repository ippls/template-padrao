# 📚 Template Padrão MVC - IPPLS

<div align="left">

**Template de Padronização para Projetos Acadêmicos**

[<img src="assets/images/logo/php.svg" alt="PHP" height="80" style="margin-left: .5rem;">](https://www.php.net/)
[<img src="assets/images/logo/composer.svg" alt="Composer" height="80" style="margin-left: .5rem;">](https://getcomposer.org/)
[<img src="assets/images/logo/mysql.svg" alt="MySQL" height="80" style="margin-left: .5rem;">](https://www.mysql.com/)
[<img src="assets/images/logo/license.svg" alt="License" height="50" style="margin-left: .5rem;">](LICENSE)

[🚀 Início Rápido](#-início-rápido) · [📖 Estrutura](#-estrutura-do-projeto) · [💡 Criar Módulo](#-criando-um-novo-módulo) · [🐛 Problemas](#-troubleshooting)

</div>

---

## <i class="fas fa-info-circle"></i> Sobre o Template

O **Template Padrão MVC - IPPLS** é uma solução profissional desenvolvida por **António Ambrósio Ngola** para ensinar e padronizar o desenvolvimento web usando arquitetura MVC com foco no mercado de trabalho. Este template ajuda você a se alinhar com boas práticas da indústria de software, evitando perda de tempo no setup inicial de projetos web.

### ✨ Características

- 🏗️ **Arquitetura MVC** - Model, View, Controller bem definidos
- 📦 **Composer PSR-4** - Autoloading automático de classes
- 🛣️ **Sistema de Rotas** - Centralizado em `routes/web.php`
- 🏷️ **Namespaces** - Organização moderna com `App\`
- 🔐 **Variáveis de Ambiente** - Configuração segura com `.env`
- 🔒 **Segurança** - Prepared statements e sanitização
- 🔄 **Hot Reload** - Atualização automática durante desenvolvimento
- 📱 **Design Responsivo** - Mobile-first com CSS modular
- 📚 **Documentação Web** - Interface moderna integrada

### 🎓 Ideal Para

- ✅ Estudantes aprendendo PHP e MVC
- ✅ Projetos acadêmicos do IPPLS
- ✅ Protótipos rápidos
- ✅ Base para projetos pequenos/médios

---

## 📊 Níveis de Template

| Template | Complexidade | URLs | Características |
|----------|--------------|------|-----------------|
| **Base** | 🟢 Básico | Query strings | MVC simples, funções globais |
| **Padrão** | 🟡 Intermediário | Query strings | **Este template** 👈 - OOP + Composer |
| **Avançado** | 🔴 Avançado | REST (`/users/create`) | Auth Screen, Middleware, API |

### 📝 Arquitetura de Rotas
Este template utiliza uma abordagem baseada em query strings para o roteamento:

```
/?resource=users
/?resource=users&action=create
/?resource=users&action=update&id=5
```

### Justificativa Técnica:

✅ Baixa complexidade de configuração
Funciona em qualquer ambiente (Apache, Nginx, servidor PHP embutido) sem necessidade de regras de reescrita (mod_rewrite, .htaccess).

✅ Foco pedagógico
Permite concentrar no aprendizado dos conceitos fundamentais de MVC, controle de sessão e segurança sem a sobrecarga de um sistema de rotas complexo.

✅ Compatibilidade universal
Garante funcionamento imediato em qualquer hospedagem compartilhada ou servidor.

✅ Base para evolução
A estrutura prepara a transição para sistemas de rota mais sofisticados, como os utilizados em frameworks modernos (Laravel, Symfony).

> 🔄 Para ambientes de produção: Recomenda-se migrar para URLs semânticas RESTful (/users/create, /products/15/edit), disponível na versão [Template Avançado](https://github.com/ippls/template-avancado).



---

## 📋 Requisitos

### Obrigatórios

```plaintext
✅ PHP >= 8.0
✅ Composer >= 2.0
✅ MySQL >= 5.7 ou MariaDB >= 10.2
✅ Extensões PHP: PDO, PDO_MySQL, mbstring
```

### Opcionais (para Hot Reload)

```plaintext
🔥 Node.js >= 18 LTS
```

### Recomendado

```plaintext
🚀 PHP 8.2+
🚀 MySQL 8.0+
🚀 512MB RAM
```

---

## 🚀 Início Rápido

### 📥 Passo 1: Obter o Template

```bash
# Via Git
git clone https://github.com/ippls/template-padrao.git meu-projeto
cd meu-projeto
```

**Ou baixe o ZIP** e extraia em:
- **XAMPP**: `C:\xampp\htdocs\meu-projeto`
- **WAMP**: `C:\wamp64\www\meu-projeto`
- **MAMP**: `/Applications/MAMP/htdocs/meu-projeto`

---

### 📦 Passo 2: Instalar Dependências PHP

```bash
composer install
```

> **💡 Não tem Composer?** [Baixe aqui](https://getcomposer.org/download/)

---

### 🗄️ Passo 3: Configurar Banco de Dados

#### 3.1. Criar Banco

```sql
CREATE DATABASE template_padrao 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;
```

#### 3.2. Criar Tabela de Exemplo

```sql
USE template_padrao;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### 3.3. Dados de Teste (Opcional)

```sql
INSERT INTO users (name, email) VALUES
('Pai Grande Ngola', 'paigrandengola@gmail.com'),
('Kelson Filipe Dev', 'kelsonfilipedev@gmail.com'),
('Anacleto Hebo', 'anacletohebo@gmail.com'),
('Iliano Nicolau', 'ilianonicolau@gmail.com'),
('José Adriano Mbala', 'adrianombala@gmail.com'),
('José Lengo Júnior', 'lengojunior@gmail.com'),
('João Victorino Bin', 'joaovictorinobin@gmail.com'),
('Adário Mutembele Assunção', 'adarioassuncao@gmail.com'),
('Zenaida Barbose', 'zenaidabarbose@gmail.com'),
('Eng. Vanilson Manuel', 'vanilsonmanuel@gmail.com');
```

---

### ⚙️ Passo 4: Configurar Variáveis de Ambiente

#### 4.1. Criar arquivo `.env`

**Opção A (Automático):**
```bash
composer run env-setup
```

**Opção B (Manual):**
```bash
# Windows
copy .env.example .env

# Linux/Mac
cp .env.example .env
```

#### 4.2. Editar credenciais

Abra `.env` e ajuste conforme seu ambiente:

```properties
APP_ENV=development
APP_URL=http://localhost/meu-projeto

DB_HOST=localhost
DB_NAME=template_padrao
DB_USER=root
DB_PASS=              # Vazio no XAMPP padrão
```

> ⚠️ **Segurança:** O arquivo `.env` está no `.gitignore` e nunca será commitado

---

### 🚀 Passo 5: Iniciar Desenvolvimento

#### Opção A: Com Hot Reload (Recomendado)

**Requer Node.js** ([Download aqui](https://nodejs.org))

```bash
# Instalar dependências (apenas primeira vez)
npm install

# Iniciar servidor com hot reload
npm run dev
```

**Acesse:** `http://localhost:3000` ✨

✅ O navegador abrirá automaticamente  
✅ Atualizações automáticas ao salvar arquivos  
✅ Sincronização entre dispositivos

---

#### Opção B: Sem Hot Reload

Acesse diretamente via Apache/XAMPP:

```
http://localhost/meu-projeto
```

⚠️ Você precisará atualizar o navegador manualmente (F5) após mudanças

---

### 🎯 URLs Disponíveis

```
http://localhost:3000/                    → Página inicial
http://localhost:3000/?page=users         → Gestão de usuários (CRUD)
http://localhost:3000/?page=docs          → Documentação integrada
```

---

## 📁 Estrutura do Projeto

```
meu-projeto/
│
├── 📄 index.php                 # Ponto de entrada (Front Controller)
├── 📄 composer.json             # Dependências e PSR-4 autoload
├── 📄 package.json              # Dependências Node.js (opcional)
├── 📄 .env.example              # Template de variáveis de ambiente
├── 📄 .env                      # Suas credenciais (ignorado pelo Git)
├── 📄 .gitignore                # Arquivos ignorados pelo Git
├── 📄 README.md                 # Esta documentação
│
├── 📁 app/                      # Código da aplicação
│   ├── config/                  # Configurações
│   │   ├── app.php             # Configurações gerais
│   │   ├── database.php        # Conexão PDO (lê .env)
│   │   ├── helpers.php         # Funções auxiliares (e, redirect, db)
│   │   └── constants.php       # Constantes de caminhos
│   │
│   ├── Http/Controllers/       # Lógica de negócio
│   │   ├── HomeController.php
│   │   └── UserController.php
│   │
│   └── Models/                  # Acesso a dados
│       └── User.php
│
├── 📁 routes/                   # Sistema de rotas
│   └── web.php                 # Definição de rotas (query strings)
│
├── 📁 views/                    # Templates PHP
│   ├── layouts/                # Layouts base
│   │   └── main.php           # Layout principal
│   │
│   ├── pages/                  # Páginas
│   │   ├── home.php
│   │   ├── users.php
│   │   └── docs.php
│   │
│   ├── components/             # Componentes reutilizáveis
│   │   ├── navbar.php
│   │   └── footer.php
│   │
│   └── errors/                 # Páginas de erro
│       ├── 404.php
│       └── 500.php
│
├── 📁 assets/                  # Recursos estáticos
│   ├── css/                    # Estilos
│   │   ├── base/              # Reset e variáveis
│   │   ├── components/        # Componentes CSS
│   │   ├── sections/          # Seções específicas
│   │   └── style.css          # Importação central
│   │
│   ├── js/                     # JavaScript
│   │   ├── components/        # Scripts modulares
│   │   └── main.js            # Script principal
│   │
│   └── images/                 # Imagens e recursos
│       └── logo/
│
├── 📁 scripts/                  # Scripts auxiliares
│   └── env-setup.php           # Configuração automática .env
│
└── 📁 vendor/                   # Dependências Composer (ignorado)
```

---

## 🎓 Como Funciona (Arquitetura MVC)

### Fluxo de Requisição

```
1. 👤 Usuário acessa: /?page=users&action=create
   ↓
2. 🚪 index.php (Front Controller)
   ↓
3. 📦 Composer Autoload (PSR-4)
   ↓
4. ⚙️ Carrega Configurações (database.php, helpers.php)
   ↓
5. 🔐 Inicia Sessão
   ↓
6. 🛣️ routes/web.php (interpreta URL)
   ↓
7. 🎮 Controller (UserController::create)
   ↓
8. 💾 Model (User::save) ← Banco de Dados
   ↓
9. 🎨 View (views/pages/user-form.php)
   ↓
10. 📄 HTML enviado ao navegador
```

### Padrão MVC

```
┌─────────────┐
│   Router    │  (routes/web.php)
│  ?page=     │
└──────┬──────┘
       │
       ▼
┌─────────────┐      ┌─────────────┐      ┌─────────────┐
│ Controller  │────►│    Model    │◄─────│  Database   │
│  (Lógica)   │      │   (CRUD)    │      │   (MySQL)   │
└──────┬──────┘      └─────────────┘      └─────────────┘
       │
       ▼
┌─────────────┐
│    View     │
│   (HTML)    │
└─────────────┘
```

### Exemplo Prático

**URL:** `/?page=users&action=create`

1. **Router** (`routes/web.php`):
   ```php
   case 'users':
       if ($_GET['action'] === 'create') {
           $controller = new UserController();
           $controller->create();
       }
   ```

2. **Controller** (`UserController.php`):
   ```php
   public function create() {
       if ($_POST) {
           $this->userModel->save($_POST);
           redirect('/?page=users');
       }
       require 'views/pages/user-form.php';
   }
   ```

3. **Model** (`User.php`):
   ```php
   public function save($data) {
       $sql = "INSERT INTO users ...";
       $this->db->prepare($sql)->execute($data);
   }
   ```

4. **View** (`user-form.php`):
   ```php
   <form method="POST">
       <input name="name">
       <button>Salvar</button>
   </form>
   ```

---

## 🛠️ Criando um Novo Módulo

### Exemplo Completo: Sistema de Produtos

#### 1️⃣ Criar Tabela SQL

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

#### 2️⃣ Criar Model (`app/Models/Product.php`)

```php
<?php
namespace App\Models;

use PDO;

class Product {
    private PDO $db;

    public function __construct() {
        $this->db = db(); // Helper do database.php
    }

    public function all(): array {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY name");
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(array $data): bool {
        $stmt = $this->db->prepare("
            INSERT INTO products (name, price, stock) 
            VALUES (:name, :price, :stock)
        ");
        return $stmt->execute($data);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
```

#### 3️⃣ Criar Controller (`app/Http/Controllers/ProductController.php`)

```php
<?php
namespace App\Http\Controllers;

use App\Models\Product;

class ProductController {
    private Product $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index(): void {
        $products = $this->productModel->all();
        $title = 'Produtos';
        $content = PAGES_PATH . '/products.php';
        require LAYOUTS_PATH . '/main.php';
    }

    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'price' => floatval($_POST['price'] ?? 0),
                'stock' => intval($_POST['stock'] ?? 0)
            ];

            if ($this->productModel->create($data)) {
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

#### 4️⃣ Criar View (`views/pages/products.php`)

```php
<div class="main-container">
    <div class="page-header">
        <h1><i class="fas fa-box"></i> Produtos</h1>
        <a href="/?page=products&action=create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Produto
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
                        <td>AOA <?= number_format($product['price'], 2, ',', '.') ?></td>
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

#### 5️⃣ Adicionar Rota (`routes/web.php`)

```php
// Adicione dentro do switch ($page):

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

#### ✅ Pronto!

Acesse: `http://localhost:3000/?page=products`

---

## 🔒 Segurança

### Proteção SQL Injection

```php
// ✅ CORRETO - Prepared Statements
$stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);

// ❌ ERRADO - Vulnerável
$query = "SELECT * FROM users WHERE email = '$email'";
$db->query($query);
```

### Proteção XSS

```php
// ✅ Use a função e() (helper incluído)
echo e($user['name']); // Escapado automaticamente

// Ou diretamente:
echo htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
```

### Validação de Dados

```php
// Email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email inválido';
}

// Número inteiro
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if ($id === false) {
    die('ID inválido');
}

// Não vazio
if (empty(trim($_POST['name']))) {
    $errors[] = 'Nome é obrigatório';
}
```

---

## 📚 Funções Auxiliares

O arquivo `app/config/helpers.php` inclui:

### `db(): PDO`

Retorna a conexão PDO (Singleton)

```php
$db = db();
$stmt = $db->prepare("SELECT * FROM users");
```

### `e(string $value): string`

Escapa HTML (previne XSS)

```php
echo e($user['name']); // Seguro!
```

### `redirect(string $url): void`

Redireciona e para execução

```php
redirect('/?page=users');
```

---

## 🎨 Customização

### Alterar Cores do Tema

Edite `assets/css/base/reset.css`:

```css
:root {
  --ippls-blue-dark: #002b5b;
  --ippls-gold: #ffd700;
  --ippls-red: #c1272d;
  
  /* Personalize aqui */
  --primary-color: #4a8fc4;
  --secondary-color: #f4b41a;
}
```

### Adicionar Novos Estilos

1. Crie `assets/css/components/meu-componente.css`
2. Importe em `assets/css/style.css`:

```css
@import "components/meu-componente.css";
```

---

## 🐛 Troubleshooting

### ❌ "Class not found"

**Problema:** Composer não encontrou as classes

```bash
composer dump-autoload
```

---

### ❌ "Database connection failed"

**Solução:**

1. Verifique `.env` - credenciais corretas?
2. MySQL está rodando?
   ```bash
   # Testar conexão
   mysql -u root -p
   ```
3. Banco de dados foi criado?
   ```sql
   SHOW DATABASES LIKE 'template_padrao';
   ```

---

### ❌ Página em branco / Erro 500

**Ative exibição de erros:**

No `.env`:
```properties
APP_ENV=development  # Certifique-se que está assim
```

Ou temporariamente no `index.php`:
```php
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

---

### ❌ CSS/JS não carregam

**Verifique os caminhos** em `views/layouts/main.php`:

```php
<!-- Deve ser relativo à raiz do projeto -->
<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/main.js"></script>
```

---

### ❌ Hot Reload não funciona

```bash
# 1. Verificar se Node.js está instalado
node -v

# 2. Reinstalar dependências
rm -rf node_modules package-lock.json
npm install

# 3. Verificar se porta 3000 está livre
netstat -ano | findstr :3000  # Windows
lsof -i :3000                 # Linux/Mac

# 4. Iniciar novamente
npm run dev
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

### 2. Separe Responsabilidades (MVC)

```php
// ✅ BOM: SQL no Model
class User {
    public function findByEmail(string $email): ?array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() ?: null;
    }
}

// ❌ RUIM: SQL no Controller
class UserController {
    public function index() {
        $query = "SELECT * FROM users"; // NÃO FAÇA ISSO!
        $users = $db->query($query)->fetchAll();
    }
}
```

### 3. Use Mensagens Flash

```php
// Controller
$_SESSION['flash_message'] = [
    'type' => 'success', // ou 'error'
    'message' => 'Usuário criado com sucesso!'
];
redirect('/?page=users');

// View (já implementado no main.php)
<?php if (isset($_SESSION['flash_message'])): ?>
    <div class="alert alert-<?= $_SESSION['flash_message']['type'] ?>">
        <?= e($_SESSION['flash_message']['message']) ?>
    </div>
    <?php unset($_SESSION['flash_message']); ?>
<?php endif; ?>
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

## 📖 Documentação Integrada

O template inclui documentação web acessível em:

```
http://localhost:3000/?page=docs
```

**Recursos:**
- ✅ Navegação interativa por seções
- ✅ Pesquisa em tempo real
- ✅ Tema claro/escuro
- ✅ Syntax highlighting para código
- ✅ Design responsivo

---

## 🤝 Contribuindo

1. **Fork** este repositório
2. Crie uma **branch**: `git checkout -b feature/MinhaFeature`
3. **Commit**: `git commit -m 'Adiciona MinhaFeature'`
4. **Push**: `git push origin feature/MinhaFeature`
5. Abra um **Pull Request**

---

## 📄 Licença

Este projeto está sob a licença **MIT**. Veja [LICENSE](LICENSE) para mais detalhes.

---

## 🏫 Créditos

**Instituto Politécnico Privado Lucrêcio dos Santos (IPPLS)**

- 🌍 Localização: Luanda, Angola
- 📧 Email: ippls.dev@outlook.co.ao
- 🌐 Website: [ippls.co.ao](https://ippls.co.ao)

**Desenvolvedor do Template:** António Ambrósio Ngola

---

<div align="center">

**Desenvolvido com 💖 para o IPPLS**

_Template Padrão MVC • v1.0.0 • 2025_

**Aprenda criando! 🚀**

</div>
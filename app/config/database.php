<?php
/**
 * ============================================
 * Configuração de Banco de Dados - Template Padrão
 * ============================================
 * 
 * Padrão Singleton para garantir uma única conexão PDO
 * 
 * As credenciais são carregadas do arquivo .env
 * Para configurar:
 * 1. Execute: composer run env-setup
 * 2. Edite .env com suas credenciais
 */

namespace App\Config;

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        // Carregar variáveis do .env se existir
        $this->loadEnv();

        // Credenciais do banco
        $host = getenv('DB_HOST') ?: 'localhost';
        $name = getenv('DB_NAME') ?: 'template_padrao';
        $user = getenv('DB_USER') ?: 'root';
        $pass = getenv('DB_PASS') ?: '';

        try {
            $dsn = "mysql:host={$host};dbname={$name};charset=utf8mb4";
            
            $this->pdo = new \PDO($dsn, $user, $pass, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false
            ]);
            
        } catch (\PDOException $e) {
            error_log("Erro na conexão com banco de dados: " . $e->getMessage());
            throw new \Exception("Falha ao conectar ao banco de dados. Contate o administrador.");
        }
    }

    /**
     * Carrega variáveis do arquivo .env
     */
    private function loadEnv(): void
    {
        $envFile = __DIR__ . '/../../.env';
        
        if (!file_exists($envFile)) {
            return;
        }

        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            // Ignora comentários
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            // Parse linha KEY=VALUE
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Define como variável de ambiente
                if (!getenv($key)) {
                    putenv("{$key}={$value}");
                }
            }
        }
    }

    /**
     * Retorna instância única da classe (Singleton)
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Retorna conexão PDO
     */
    public function getConnection(): \PDO
    {
        return $this->pdo;
    }
}
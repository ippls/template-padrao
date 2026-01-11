<?php
/**
 * ============================================
 * Script de Setup do .env - Template Padrão
 * ============================================
 * 
 * Copia .env.example para .env se não existir
 * 
 * Uso: php scripts/env-setup.php
 * Ou via Composer: composer run env-setup
 */

$root = dirname(__DIR__);
$src = $root . DIRECTORY_SEPARATOR . '.env.example';
$dest = $root . DIRECTORY_SEPARATOR . '.env';

echo "\n🔧 Configurando ambiente do Template Padrão...\n\n";

// Verifica se .env.example existe
if (!file_exists($src)) {
    fwrite(STDERR, "❌ Erro: .env.example não encontrado.\n");
    exit(1);
}

// Verifica se .env já existe
if (file_exists($dest)) {
    echo "ℹ️  .env já existe — nenhuma ação necessária.\n";
    echo "   Se quiser recriar, delete .env e execute novamente.\n\n";
    exit(0);
}

// Copia .env.example para .env
if (!copy($src, $dest)) {
    fwrite(STDERR, "❌ Erro: Falha ao criar .env\n");
    exit(1);
}

echo "✅ .env criado com sucesso!\n\n";
echo "📝 Próximos passos:\n";
echo "   1. Edite .env com suas credenciais do MySQL\n";
echo "   2. Acesse: http://localhost/template_padrao\n\n";

exit(0);
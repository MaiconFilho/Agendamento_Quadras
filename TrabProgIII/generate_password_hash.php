<?php
/**
 * Script temporário para gerar hashes de senhas
 * Use este script para gerar hashes das senhas existentes
 * 
 * Como usar:
 * 1. Substitua 'senha123' pela senha real do usuário
 * 2. Execute: php generate_password_hash.php
 * 3. Copie o hash gerado e use no script SQL
 * 4. Delete este arquivo após o uso por segurança
 */

$senha = 'senha123'; // Substitua pela senha real
$hash = password_hash($senha, PASSWORD_DEFAULT);

echo "Senha: " . $senha . "\n";
echo "Hash: " . $hash . "\n";
echo "\n";
echo "Comando SQL para atualizar:\n";
echo "UPDATE \"User\" SET \"pwd\" = '" . $hash . "' WHERE \"email\" = 'email_do_usuario@exemplo.com';\n";
?> 
<?php

require 'vendor/autoload.php';

use App\Database\Query;

$query = new Query();

$nome = 'Heitor Costa';
$email = 'heitor@email.com';
$senha = 'Senha123';

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$data = [
    'nome' => $nome,
    'email' => $email,
    'senha' => $senha_hash
];
$query->insert('usuario', $data);

echo 'Usuário inserido com sucesso!';

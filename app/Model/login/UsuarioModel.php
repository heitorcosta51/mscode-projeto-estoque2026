<?php 

namespace App\Model\usuario;

use App\Database\Query;

class UsuarioModel
{
    private Query $query;

    public function __construct()
    {
       $this->query = new Query();
    }
    
    public function validarUsuario(string $email, string $password): Usuario
    {
        $condicao = " email = '{$email}'";

        $colunas = "senha";

        $resultado = $this->query->select('usuario', $condicao, $colunas);

        if (!$resultado){
            throw new \Exception('Email invalido!');
        }

        if (!password_verify($password, $resultado[0]['senha'])){
            throw new \Exception('senha invalida');
        }

        return new usuario($resultado[0]['id'], $resultado[0]['nome']);

        return usuario;
    }
}

?>
<?php

namespace App\Model\Produto;

use App\Database\Query;

class ProdutoModel
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function cadastrar(
        string $nome,
        ?string $descricao,
        int $categoriaId,
        int $quantidade,
        string $valor
    ): void {
        $dados = [
            'nome' => $nome,
            'descricao' => $descricao,
            'categoria_id' => $categoriaId,
            'quantidade_inicial' => $quantidade,
            'quantidade_disponivel' => $quantidade,
            'valor' => $valor,
        ];

        if (!$this->query->insert('produto', $dados)) {
            throw new \Exception('Erro ao cadastrar o produto.');
        }
    }
}
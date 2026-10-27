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


    // Operação do Modelo de Excluir
    public function excluir(int $id): void
    {
        if (!$this->query->delete('produto', 'id = :id', ['id' => $id])) {
            throw new \RuntimeException('Não foi possivel excluir o Produto');
        }
    }

    public function listar(): array
    {
        $produtos = $this->query->select(
            'produto',
            null,
            'id, nome, descricao, categoria_id, valor, quantidade_disponivel'
        );

        if ($produtos === false) {
            throw new \RuntimeException('Não foi possível consultar os produtos.');
        }

        return $produtos;
    }

    public function buscarPorId(int $id): ?array
    {
        $resultado = $this->query->select(
            'produto',
            'id = :id',
            '*',
            ['id' => $id]
        );

        if ($resultado === false) {
            throw new \RuntimeException('Não foi possível consultar o produto.');
        }

        return $resultado[0] ?? null;
    }

    public function cadastrar(string $nome, ?string $descricao, int $categoriaId, int $quantidade, string $valor): void
    {
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

    public function atualizar(int $id, string $nome, ?string $descricao, int $categoriaId, int $quantidade, string $valor): void
    {
        $dados = [
            'nome' => $nome,
            'descricao' => $descricao,
            'categoria_id' => $categoriaId,
            'quantidade_inicial' => $quantidade,
            'quantidade_disponivel' => $quantidade,
            'valor' => $valor,
        ];

        if (!$this->query->update('produto', $dados, 'id = ' . $id)) {
            throw new \Exception('Erro ao atualizar o produto.');
        }
    }
}

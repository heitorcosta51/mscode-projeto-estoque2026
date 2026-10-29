<?php

namespace App\Model\Categoria;

use App\Database\Query;

class CategoriaModel
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function excluir(int $id): void
    {
        if (!$this->query->delete('categoria', 'id = :id', ['id' => $id])) {
            throw new \RuntimeException('Não foi possível excluir a categoria. Verifique se existem produtos vinculados a ela.');
        }
    }

    public function listar(): array
    {
        $categorias = $this->query->select('categoria', null, 'id, nome');

        if ($categorias === false) {
            throw new \RuntimeException('Não foi possível consultar as categorias.');
        }

        return $categorias;
    }

    public function buscarPorId(int $id): ?array
    {
        $resultado = $this->query->select(
            'categoria',
            'id = :id',
            '*',
            ['id' => $id]
        );

        if ($resultado === false) {
            throw new \RuntimeException('Não foi possível consultar a categoria.');
        }

        return $resultado[0] ?? null;
    }

    public function cadastrar(string $nome): void
    {
        $dados = [
            'nome' => $nome,
        ];

        $resultado = $this->query->insert('categoria', $dados);

        if (! $resultado) {
            throw new \Exception('Erro ao criar categoria: ' . $nome);
        }
    }

    public function atualizar(int $id, string $nome): void
    {
        $dados = [
            'nome' => $nome,
        ];

        if (!$this->query->update('categoria', $dados, 'id = ' . $id)) {
            throw new \Exception('Erro ao atualizar a categoria.');
        }
    }
}

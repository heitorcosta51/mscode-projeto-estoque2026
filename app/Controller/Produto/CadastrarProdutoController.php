<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto\ProdutoModel;

class CadastrarProdutoController extends AbstractController
{
    private ProdutoModel $model;

    public function __construct()
    {
        $this->model = new ProdutoModel();
    }

    public function index(array $requestData): void
    {
        try {
            $nome = $requestData['nome'] ?? null;
            $descricao = $requestData['descricao'] ?? '';
            $categoriaId = filter_var($requestData['categoria_id'] ?? null, FILTER_VALIDATE_INT);
            $quantidade = filter_var($requestData['quantidade'] ?? null, FILTER_VALIDATE_INT);
            $valorInformado = $requestData['valor'] ?? null;

            if (!is_string($nome) || trim($nome) === '' || strlen(trim($nome)) > 100) {
                throw new \Exception('Informe um nome de produto com até 100 caracteres.');
            }
            if (!is_string($descricao)) {
                throw new \Exception('A descrição informada é inválida.');
            }
            if ($categoriaId === false || $categoriaId < 1) {
                throw new \Exception('Informe um ID de categoria válido.');
            }
            if ($quantidade === false || $quantidade < 0) {
                throw new \Exception('Informe uma quantidade válida.');
            }
            if (!is_string($valorInformado) || !preg_match('/\A\d{1,8}(?:\.\d{1,2})?\z/', $valorInformado)) {
                throw new \Exception('Informe um valor válido com até duas casas decimais.');
            }

            [$valorInteiro, $valorCentavos] = array_pad(explode('.', $valorInformado, 2), 2, '');
            $valor = $valorInteiro . '.' . str_pad($valorCentavos, 2, '0');

            $this->model->cadastrar(
                trim($nome),
                trim($descricao) === '' ? null : trim($descricao),
                $categoriaId,
                $quantidade,
                $valor
            );

            $this->redirect('/produtos');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

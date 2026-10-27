<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto\ProdutoModel;

class ProdutoController extends AbstractController
{
    public function index(array $requesData): void
    {
        $model = new ProdutoModel();
        $produtos = $model->listar();

        $this->render('produto/produtos.php', [
            'produtos' => $produtos,
        ]);
    }
}

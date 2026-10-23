<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;

class NovoProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->render('produto/novo_produto.php');
    }
}

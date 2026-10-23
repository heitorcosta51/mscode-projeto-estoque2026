<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;

class ProdutoController extends AbstractController
{
    public function index(array $requesData): void
    {
        $this->render('produto/produtos.php');
    }
}

<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class CategoriaController extends AbstractController
{
    public function index(array $requestData): void
    {
        $model = new CategoriaModel();
        $categorias = $model->listar();

        $this->render('categoria/categorias.php', [
            'categorias' => $categorias,
        ]);
    }
}

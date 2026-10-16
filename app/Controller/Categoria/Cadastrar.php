<?php 
namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;


class CadastrarCategoriaController extends AbstractController
{
    private CategoriaModel $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }
    public function index(array $requestData): void
    {
        try {
            $nome = $requestData['nome'] ?? null;
            if (!is_string($nome) || trim($nome) === '') {
                throw new \Exception('Informe o nome da categoria!');
            }
            $this->model->cadastrar(trim($nome));
            $this->redirect('/categorias');
        } catch(\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    } 
}
?>
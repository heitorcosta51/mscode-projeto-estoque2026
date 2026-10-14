<?php 

namespace App\Controller\Login;

use App\Controller\AbstractController;
use App\Model\usuario\UsuarioModel;


class LoginController extends AbstractController
{
    private UsuarioModel $usuarioModel;
    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index(array $requestData): void
    {
        try{
            if(empty($requestData['email']) || empty($requestData['password'])){
                throw new \Exception("Preecha os campos para fazer login");
            }

            $usuario = $this->usuarioModel->validarUsuario($requestData['email'], $requestData['password']);

            $_SESSION['usuario'] = $usuario;

            $this->render('<dashboard/dashboard.php');

        }catch(\Exception $e){
            $this->redirectToError('error', $e->getMessage());
        }
    }


}
?>
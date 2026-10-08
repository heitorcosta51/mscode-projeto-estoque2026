<?php 

namespace App\Controller\Login;

use App\Controller\AbstractController;

class loginController extends AbstractController
{

    public function index(array $requestData): void
    {
        dump($requestData); exit();
    }

}
?>
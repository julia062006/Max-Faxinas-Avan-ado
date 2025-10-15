<?php
namespace App\Controller;

class SairController
{
    public function index()
    {
        session_start();

        // Apaga a sessão do usuário
        unset($_SESSION["cliente"]);

        // Redireciona
        header("Location: /home");
        exit;
    }
}

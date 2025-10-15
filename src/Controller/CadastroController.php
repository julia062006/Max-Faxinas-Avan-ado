<?php

namespace App\Controller;

use App\Model\Cliente;

class CadastroController
{
      public function cadastrar(): void
    {
        //echo var_dump($_POST);
        $nome = $_POST['user_nome'] ?? '';
        $cpf = $_POST['user_cpf'] ?? '';
        $email = $_POST['user_email'] ?? '';
        $endereco = $_POST['user_endereco'];
        $telefone = $_POST['user_telefone'] ?? '';
        $senha = $_POST['user_senha'] ;

        $cliente = new Cliente($cpf, $nome, $email, $telefone, $endereco, $senha);
        $cliente->save();
    }
}
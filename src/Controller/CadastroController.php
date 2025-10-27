<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Cidade;
use App\Model\Cliente;
use App\Model\Endereco;
use App\Model\Estado;
use App\Model\Pais;

class CadastroController
{
    public function cadastrar(): void
    {
        //echo var_dump($_POST);
        $nome = $_POST['user_nome'] ?? '';
        $cpf = $_POST['user_cpf'] ?? '';
        $telefone = $_POST['user_telefone'] ?? '';
        $email = $_POST['user_email'] ?? '';
        $senha = $_POST['user_senha'];

        $paisNome = $_POST['user_pais'] ?? '';
        $estadoNome = $_POST['user_estado'] ?? '';
        $cidadeNome = $_POST['user_cidade'] ?? '';
        $rua = $_POST['user_rua'] ?? '';
        $numero = (int)($_POST['user_numero'] ?? 0);
        $bairro = $_POST['user_bairro'] ?? '';

        $em = Database::getEntityManager();

        try {
            $pais = new Pais($paisNome);
            $em->persist($pais);

            $estado = new Estado($estadoNome, $pais);
            $em->persist($estado);

            $cidade = new Cidade($cidadeNome, $estado);
            $em->persist($cidade);

            $cliente = new Cliente($cpf, $nome, $email, $telefone, "-", $senha);
            $em->persist($cliente);

            $em->flush();

            $endereco = new Endereco($rua, $numero, $bairro, $cliente, $cidade);
            $em->persist($endereco);

            $em->flush();

           $_SESSION['mensagem'] = [
                'texto' => 'Cadastro realizado com sucesso!',
                'url' => 'login',
                'icone' => 'success'
            ];
            header('Location: /login');
            exit;
        } catch (\Exception $e) {
            // registra mensagem de erro e redireciona para a página de cadastro
            $_SESSION['mensagem'] = [
                'texto' => 'Erro ao cadastrar',
                'url' => 'cadastro',
                'icone' => 'error'
            ];
            header('Location: /cadastro');
            exit;
        }
    }
}

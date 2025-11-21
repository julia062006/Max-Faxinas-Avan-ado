<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Cidade;
use App\Model\Cliente;
use App\Model\Endereco;

class CadastroController
{
    public function cadastrar(): void
    {
        $nome = $_POST['user_nome'] ?? '';
        $cpf = $_POST['user_cpf'] ?? '';
        $telefone = $_POST['user_telefone'] ?? '';
        $email = $_POST['user_email'] ?? '';
        $senha = $_POST['user_senha'];

        $cidadeNome = $_POST['user_cidade'] ?? '';

        $rua = $_POST['user_rua'] ?? '';
        $numero = (int)($_POST['user_numero'] ?? 0);
        $bairro = $_POST['user_bairro'] ?? '';

        $em = Database::getEntityManager();

        try {

            $cliente = new Cliente($cpf, $nome, $email, $telefone, $senha);
            $em->persist($cliente);
            $em->flush();

            $cidade = $em->getRepository(Cidade::class)->find($cidadeNome);

            $endereco = new Endereco(
                $rua,
                $numero,
                $bairro,
                $cidade,
                $cliente
            );

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

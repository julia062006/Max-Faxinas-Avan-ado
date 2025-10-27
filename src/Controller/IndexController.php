<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Cliente;
use Doctrine\ORM\EntityManager;

class IndexController
{
    private EntityManager $entityManager;
    private $clienteRepository;

    public function __construct()
    {
        $this->entityManager = Database::getEntityManager();

        $this->clienteRepository = $this->entityManager->getRepository(Cliente::class);
    }

    public function verificar($dados)
    {
        $email = $dados["email"] ?? null;
        $senha = $dados["senha"] ?? null;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>mensagem('Digite um e-mail válido', '', 'error')</script>";
            exit;
        } elseif (empty($senha)) {
            echo "<script>mensagem('Senha inválida', '', 'error')</script>"; // usar o sweetAlert para as mensagens
            exit;
        }

        $em = \App\Core\Database::getEntityManager();
        $repositorio = $em->getRepository(\App\Model\Cliente::class);

        // Busca o cliente pelo e-mail
        $cliente = $repositorio->findOneBy(['email' => $email]);

        if   ($cliente && password_verify($senha, $cliente->getSenha())) {
            // Login bem-sucedido
            $_SESSION['cliente'] = [
                'id' => $cliente->getId(),
                'nome' => $cliente->getNome()
            ];

            echo "<script>mensagem('Login realizado com sucesso!', 'home', 'success')</script>";
        } else {
            echo "<script>mensagem('Email ou senha incorretos','login', 'error')</script>";
            exit;
        }
    }
}

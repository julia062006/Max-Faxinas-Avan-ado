<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Adicional;
use App\Model\Agendamento;
use App\Model\Agendamento_adicional;
use App\Model\Cliente;
use App\Model\Endereco;
use App\Model\Forma_pagamento;
use App\Model\Servico;

class AgendamentoController
{
    public function finalizar()
    {
        $clienteId = $_SESSION["cliente"]["id"] ?? null;
        if (!$clienteId) {
            header("Location: /login");
            exit;
        }

        // pega o carrinho do usuário
        $carrinho = $_SESSION['carrinho_' . $clienteId] ?? [];

        if (empty($carrinho)) {
            $_SESSION['mensagem'] = [
                'texto' => 'Seu carrinho está vazio!',
                'url' => '/carrinho',
                'icone' => 'error'
            ];
            header("Location: /carrinho");
            exit;
        }

        $cliente = Cliente::findById($clienteId);
        if (!$cliente) {
            $_SESSION['mensagem'] = [
                'texto' => 'Cliente não encontrado!',
                'url' => '/carrinho',
                'icone' => 'error'
            ];
            header("Location: /carrinho");
            exit;
        }

        $enderecos = Endereco::findByCliente($cliente);
        $formasPagamento = Forma_pagamento::findAll();

        $servicoSelecionado = $carrinho[0]['nome_servico'] ?? null;
        $adicionais = $carrinho[0]['adicionais'] ?? [];
        $dataSelecionada = $carrinho[0]['data'] ?? null;

        $page = 'agendamento';
        require __DIR__ . '/../View/components/layout.phtml';
    }

    public function criarAgendamento()
    {
        $clienteId = $_SESSION['cliente']['id'] ?? null;
        if (!$clienteId) {
            $_SESSION['mensagem'] = [
                'texto' => 'Faça o login para continuar!',
                'url' => '/login',
                'icone' => 'error'
            ];
            header("Location: /login");
            exit;
        }

        $em = Database::getEntityManager();

        $cliente = $em->find(Cliente::class, $clienteId);

        $idUsuario = $_SESSION["cliente"]["id"];
        $carrinho = $_SESSION['carrinho_' . $idUsuario] ?? [];

        if (empty($carrinho)) {
            $_SESSION['mensagem'] = [
                'texto' => 'O carrinho está vazio!',
                'url' => '/servico',
                'icone' => 'error'
            ];
            header("Location: /servico");
            exit;
        }

        $enderecoId = $_POST['user_endereco'] ?? null;
        $formaPagamentoId = $_POST['formaPagamento'] ?? null;

        if (!$enderecoId || !$formaPagamentoId) {
            $_SESSION['mensagem'] = [
                'texto' => 'Selecione o endereço e a forma de pagamento',
                'url' => '/agendamento',
                'icone' => 'error'
            ];
            header("Location: /agendamento");
            exit;
        }

        $endereco = $em->find(Endereco::class, $enderecoId);
        $formaPagamento = $em->find(Forma_pagamento::class, $formaPagamentoId);

        if (!$endereco || !$formaPagamento) {
            $_SESSION['mensagem'] = [
                'texto' => 'Endereço ou forma de pagamento inválidos!',
                'url' => '/agendamento',
                'icone' => 'error'
            ];
            header("Location: /agendamento");
            exit;
        }

        foreach ($carrinho as $item) {

            $servicoId = $item["id_servico"];
            $servico = $em->find(Servico::class, $servicoId);

            if (!$servico) {
                $_SESSION['mensagem'] = [
                    'texto' => 'Serviço não encontrado',
                    'url' => '/agendamento',
                    'icone' => 'error'
                ];
                header("Location: /agendamento");
                exit;
            }

            $data = new \DateTime($item["data"]);
            $valorTotal = $item["valor_total"];

            $agendamento = new Agendamento($data, "pendente", $cliente, $servico, $formaPagamento, $endereco, $valorTotal);

            $em->persist($agendamento);
            $em->flush();

            if (!empty($item["adicionais"])) {

                foreach ($item["adicionais"] as $adc) {

                    $adicionalEntity = $em->find(Adicional::class, $adc["id"]);

                    if (!$adicionalEntity) {
                        $_SESSION['mensagem'] = [
                            'texto' => 'Adicional inválido!',
                            'url' => '/carrinho',
                            'icone' => 'error'
                        ];
                        header("Location: /carrinho");
                        exit;
                    }

                    $agendamentoAdicional = new Agendamento_adicional(
                        $agendamento,
                        $adicionalEntity
                    );

                    $em->persist($agendamentoAdicional);
                }
            }

            $em->flush();
        }

        $em->flush();
      
        $pagamento = new \App\Model\Pagamento(
            new \DateTime(),               
            $valorTotal,                  
            $formaPagamento,               
            $cliente,                      
            $agendamento,                  
        );

        $em->persist($pagamento);
        $em->flush();


        $idUsuario = $_SESSION["cliente"]["id"];
        unset($_SESSION['carrinho_' . $idUsuario]);

        $_SESSION['mensagem'] = [
            'texto' => 'Agendamento salvo com sucesso!',
            'url' => '/carrinho',
            'icone' => 'success'
        ];
        header("Location: /carrinho");
        exit;
    }
}

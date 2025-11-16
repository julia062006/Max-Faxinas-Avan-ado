<?php

namespace App\Controller;

use App\Model\Cliente;
use App\Model\Endereco;
use App\Model\Forma_pagamento;

class AgendamentoController
{
    public function finalizar()
    {
        if (empty($_SESSION['carrinho'])) {
            $_SESSION['mensagem'] = [
                'texto' => 'Seu carrinho está vazio!',
                'url' => '/carrinho',
                'icone' => 'error'
            ];
            header("Location: /carrinho");
        }

        $carrinho = $_SESSION['carrinho'];

        $clienteId = $_SESSION["cliente"]["id"];
        if (!$clienteId) {
            header("Location: /login");
            exit;
        }

        $cliente = Cliente::findById($clienteId);

        if (!$cliente) {
            die("Cliente não encontrado.");
        }

        $enderecos = Endereco::findByCliente($cliente);

        $formasPagamento = Forma_pagamento::findAll();

        $servicoSelecionado = $carrinho[0]['nome_servico'];
        $adicionais = $carrinho[0]['adicionais'] ?? [];
        $dataSelecionada = $carrinho[0]['data'];


        $page = 'agendamento';
        require __DIR__ . '/../View/components/layout.phtml';
    }
}

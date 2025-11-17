<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Servico;
use App\Model\Adicional;

class CarrinhoController
{
    public function index(): void
    {
        $idUsuario = $_SESSION["cliente"]["id"] ?? null;
        $carrinho = $_SESSION['carrinho_' . $idUsuario] ?? [];

        $page = 'carrinho';
        include __DIR__ . '/../View/components/layout.phtml';
    }

    public function adicionar(): void
    {
        $idServico = $_POST['id_servico'] ?? null;
        $idsAdicionais = $_POST['adicionais'] ?? [];
        // garantir que data seja string (ou null) — não array
        $data = is_array($_POST['data'] ?? null) ? ($_POST['data'][0] ?? null) : ($_POST['data'] ?? null);

        if (!$idServico) {
            $_SESSION['mensagem'] = [
                'texto' => 'Serviço inválido!',
                'url' => '/servico',
                'icone' => 'error'
            ];
            header("Location: /servico");
            exit;
        }

        $em = Database::getEntityManager();
        $repoServico = $em->getRepository(Servico::class);
        $repoAdicional = $em->getRepository(Adicional::class);

        $servico = $repoServico->find($idServico);
        if (!$servico) {
            $_SESSION['mensagem'] = [
                'texto' => 'Serviço não encontrado!',
                'url' => '/servico',
                'icone' => 'error'
            ];
            header("Location: /servico");
            exit;
        }

        $adicionais = [];
        $valorTotal = $servico->getPreco();

        if (!empty($idsAdicionais)) {
            foreach ($idsAdicionais as $idAdicional) {
                $adc = $repoAdicional->find($idAdicional);
                if ($adc) {
                    $adicionais[] = [
                        "id" => $adc->getId(),
                        "nome" => $adc->getNome(),
                        "preco" => $adc->getPreco(),
                    ];
                    $valorTotal += $adc->getPreco();
                }
            }
        }

        $item = [
            "id_servico" => $servico->getId(),
            "nome_servico" => $servico->getTipoDeServico(),
            "valor_servico" => $servico->getPreco(),
            "adicionais" => $adicionais,
            "valor_total" => $valorTotal,
            "data" => $data
        ];

        $idUsuario = $_SESSION["cliente"]["id"];
        $_SESSION['carrinho_' . $idUsuario][] = $item;

        $_SESSION['mensagem'] = [
            'texto' => 'Serviço adicionado ao carrinho!',
            'url' => '/carrinho',
            'icone' => 'success'
        ];
        header("Location: /carrinho");
        exit;
    }

    public function remover(): void
    {
        $index = $_GET['index'] ?? null;
        $idUsuario = $_SESSION["cliente"]["id"];

        if ($index !== null && isset($_SESSION['carrinho_' . $idUsuario][$index])) {
            unset($_SESSION['carrinho_' . $idUsuario][$index]);
            $_SESSION['carrinho_' . $idUsuario] = array_values($_SESSION['carrinho_' . $idUsuario]);

            $_SESSION['mensagem'] = [
                'texto' => 'Item removido do carrinho!',
                'url' => '/carrinho',
                'icone' => 'success'
            ];
        } else {
            $_SESSION['mensagem'] = [
                'texto' => 'Item não encontrado no carrinho!',
                'url' => '/carrinho',
                'icone' => 'error'
            ];
        }
        header('Location: /carrinho');
        exit;
    }

    public function limpar(): void
    {
        $idUsuario = $_SESSION["cliente"]["id"];
        unset($_SESSION['carrinho_' . $idUsuario]);
        $_SESSION['mensagem'] = [
            'texto' => 'Carrinho limpo com sucesso!',
            'url' => '/carrinho',
            'icone' => 'success'
        ];
        header('Location: /carrinho');
        exit;
    }

    public function finalizar(): void
    {
        $idUsuario = $_SESSION["cliente"]["id"];
        $carrinho = $_SESSION['carrinho_' . $idUsuario] ?? [];

        if (empty($carrinho)) {
            $_SESSION['mensagem'] = [
                'texto' => 'Seu carrinho está vazio!',
                'url' => '/carrinho',
                'icone' => 'error'
            ];
            header('Location: /carrinho');
            exit;
        }

        // pega as datas corretamente e valida
        $datas = array_map(fn($item) => $item['data'] ?? null, $carrinho);

        foreach ($datas as $d) {
            if (empty($d)) {
                $_SESSION['mensagem'] = [
                    'texto' => 'Selecione uma data para cada serviço.',
                    'url' => '/carrinho',
                    'icone' => 'error'
                ];
                header('Location: /carrinho');
                exit;
            }
        }

        if (count($datas) !== count(array_unique($datas))) {
            $_SESSION['mensagem'] = [
                'texto' => 'Você selecionou duas datas iguais. Cada serviço precisa ter uma data diferente.',
                'url' => '/carrinho',
                'icone' => 'error'
            ];
            header('Location: /carrinho');
            exit;
        }

        header('Location: /agendamento');
        exit;
    }
}

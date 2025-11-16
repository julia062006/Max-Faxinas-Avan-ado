<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Servico;
use App\Model\Adicional;

class CarrinhoController
{
    public function index(): void
    {
        
        $itens = $_SESSION['carrinho'] ?? [];

        $page = 'carrinho';
        include __DIR__ . '/../View/components/layout.phtml';
    }

    public function adicionar(): void
    {
       

        $idServico = $_POST['id_servico'] ?? null;
        $idsAdicionais = $_POST['adicionais'] ?? [];
        $data = $_POST['data'] ?? [];

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

        $_SESSION['carrinho'][] = $item;

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

        if ($index !== null && isset($_SESSION['carrinho'][$index])) {
            unset($_SESSION['carrinho'][$index]);
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);

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
 
        unset($_SESSION['carrinho']);
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
   

    $carrinho = $_SESSION['carrinho'] ?? [];

    $datas = array_column($carrinho, 'data');

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

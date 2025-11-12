<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Servico;
use App\Model\Adicional;

class AdicionalController
{
    public function index(): void
    {
        $idServico = $_GET['id'] ?? null;

        if (!$idServico) {
            $_SESSION['mensagem'] = [
                'texto' => 'Serviço inválido!',
                'url'   => '/servico',
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
                'url'   => '/servico',
                'icone' => 'error'
            ];
            header("Location: /servico");
            exit;
        }

        $adicionais = $repoAdicional->findBy(["servico" => $servico]);

        $page = 'adicional';
        include __DIR__ . '/../View/components/layout.phtml';
    }
}

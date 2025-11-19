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

        $query = $em->createQuery("
            SELECT a.data 
            FROM App\Model\Agendamento a 
            WHERE a.status != 'cancelado'
        ");

        $datas = $query->getResult();

        $dataIndisponiveis = array_map(function ($d) {
            return $d['data']->format('d-m-Y');
        }, $datas);


        $page = 'adicional';
        include __DIR__ . '/../View/components/layout.phtml';
    }
}

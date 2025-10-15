<?php

namespace App\Controller;

use App\Model\Cliente;
use App\Model\Servico;
use App\Model\Agendamento;
use App\Core\Database;

class AgendamentoController
{

    public function index(bool $sucesso = false): void
    {
        $page = 'agendamento';
        $servicos = Servico::findAll();

        $em = Database::getEntityManager();
        $query = $em->createQuery("SELECT a.data FROM App\Model\Agendamento a WHERE a.status != 'cancelado'");
        $datas = $query->getResult();

        // transformar em array simples de strings
        $datasIndisponiveis = array_map(function ($d) {
            return $d['data']->format('d-m-Y');
        }, $datas);


        include __DIR__ . '/../View/components/layout.phtml';
    }

    public function mudarStatus(): void
    {
        $id = $_POST['id'] ?? null;
        $novoStatus = $_POST['status'] ?? null;

        if ($id && $novoStatus) {
            $em = Database::getEntityManager();
            $agendamento = $em->find(Agendamento::class, $id);
            if ($agendamento) {
                $agendamento->setStatus($novoStatus);
                $agendamento->save();
            }
        }
        header("Location: /administrador");
        exit;
    }
    public function criarAgendamento(): void
    {
        //echo var_dump($_POST);
        $nome = $_POST['user_nome'] ?? '';
        $cpf = $_POST['user_cpf'] ?? '';
        $email = $_POST['user_email'] ?? '';
        $telefone = $_POST['user_telefone'] ?? '';
        $endereco = $_POST['user_endereco'] ?? '';
        $servicoId = $_POST['job'] ?? '';
        $dataEscolhida = $_POST['data'] ?? date('Y-m-d');
        $senha = $_POST['user_senha'] ;

        $cliente = new Cliente($cpf, $nome, $email, $telefone, $endereco, $senha);
        $cliente->save();

        $em = Database::getEntityManager();
        $servico = $em->find(Servico::class, $servicoId);

        $agendamento = new Agendamento(new \DateTime($dataEscolhida), "pendente", $cliente, $servico);
        $agendamento->save();

        $sucesso = true;
        $this->index($sucesso);
    }
}

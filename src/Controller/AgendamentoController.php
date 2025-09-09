<?php
namespace App\Controller;

use App\Model\Cliente;
use App\Model\Servico;
use App\Model\Agendamento;
use App\Core\Database;

class AgendamentoController {

      public function index(): void
    {
        $page = 'agendamento';
        $servicos = Servico::findAll();
        include __DIR__ . '/../View/components/layout.phtml';
    }
    

    public function criarAgendamento(): void {
        //echo var_dump($_POST);
        $nome = $_POST['user_nome'] ?? '';
        $cpf = $_POST['user_cpf'] ?? '';
        $email = $_POST['user_email'] ?? '';
        $telefone = $_POST['user_telefone'] ?? '';
        $endereco = $_POST['user_endereco'] ?? '';
        $servicoId = $_POST['job'] ?? '';
        $dataEscolhida = $_POST['data'] ?? date('Y-m-d');

        $cliente = new Cliente($cpf, $nome, $email, $telefone, $endereco);
        $cliente->save();

        $em = Database::getEntityManager();
        $servico = $em->find(Servico::class, $servicoId);

        $agendamento = new Agendamento(new \DateTime($dataEscolhida), "pendente", $cliente, $servico);
        $agendamento->save();
        $this->index();
    }
}

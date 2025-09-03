<?php

namespace App\Controller;

use App\Model\Servico;

class AgendamentoController {

    public function render() : void
    {
        $servicos = Servico::findAll();
        include __DIR__ . '/../pages/agendamento.php';

    }

    public function create() : void
    {
        $servicos = new Servico();
    }
}
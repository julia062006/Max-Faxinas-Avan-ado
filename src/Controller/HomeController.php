<?php
namespace App\Controller;

use App\Model\Agendamento;

class HomeController
{
    public function index(): void
    {
        $page = 'home';
        include __DIR__ . '/../View/components/layout.phtml';
    }

    public function quemSou(): void
    {
        $page = 'quemSou';
        include __DIR__ . '/../View/components/layout.phtml';
    }

    public function servico(): void
    {
        $page = 'servico';
        include __DIR__ . '/../View/components/layout.phtml';
    }

    public function administrador(): void
    {
        $page = 'administrador';
        $agendamentos = Agendamento::findAll();
        include __DIR__ . '/../View/components/layout.phtml';
    }

     public function erro(): void
    {
        $page = 'erro';
        include __DIR__ . '/../View/components/layout.phtml';
    }
}

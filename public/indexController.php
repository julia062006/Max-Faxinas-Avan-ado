<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\AgendamentoController;


$agendamentoController = new AgendamentoController();

$agendamentoController->render();
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\HomeController;
use App\Controller\AgendamentoController;
use App\Controller\NotFoundController;

// pega só o caminho da URL, sem query string
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// mapeamento de rotas
$routes = [
    '/'              => [new HomeController, 'index'],
    '/home'          => [new HomeController, 'index'],
    '/quemsou'       => [new HomeController, 'quemsou'],
    '/servico'       => [new HomeController, 'servico'],
    '/administrador' => [new HomeController, 'administrador'],
    '/agendamento'   => [new AgendamentoController , 'index'],
    '/enviar'        => [new AgendamentoController, 'criarAgendamento'],
    '/mudarStatus'   => [new AgendamentoController, 'mudarStatus']
];


$controller = $routes[$uri] ?? [new HomeController, 'erro'];


call_user_func($controller);
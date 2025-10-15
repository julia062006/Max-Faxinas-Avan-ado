<?php
  session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\HomeController;
use App\Controller\AgendamentoController;
use App\Controller\CadastroController;
use App\Controller\SairController;
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
    '/login'         => [new HomeController, 'login'],
    '/cadastro'      => [new HomeController, 'cadastro'],
    '/agendamento'   => [new AgendamentoController, 'index'],
    '/enviar'        => [new AgendamentoController, 'criarAgendamento'],
    '/cadastrar'     => [new CadastroController, 'cadastrar'],
    '/mudarStatus'   => [new AgendamentoController, 'mudarStatus'],
    '/sair'          => [new SairController, 'index']
];


$controller = $routes[$uri] ?? [new HomeController, 'erro'];


call_user_func($controller);

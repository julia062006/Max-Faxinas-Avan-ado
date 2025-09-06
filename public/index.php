<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\HomeController;
use App\Controller\AgendamentoController;

// pega só o caminho da URL, sem query string
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// mapeamento de rotas
$routes = [
    '/'              => [HomeController::class, 'index'],
    '/home'          => [HomeController::class, 'index'],
    '/quemsou'       => [HomeController::class, 'quemSou'],
    '/servico'       => [HomeController::class, 'servico'],
    '/administrador' => [HomeController::class, 'administrador'],
    '/agendamento'   => [AgendamentoController::class, 'index'],
    '/enviar'        => [AgendamentoController::class, 'criarAgendamento'],
];

// verifica se a rota existe
if (isset($routes[$uri])) {
    [$controllerClass, $method] = $routes[$uri];
    $controller = new $controllerClass();
    $controller->$method($_POST ?? []);
} else {
    // rota não encontrada -> mostra erro.phtml
    $page = 'erro';
    include __DIR__ . '/../src/View/components/layout.phtml';
}
<?php
class CarrinhoController
{


    public function adicionar()
    {
        session_start();

        $id = $_POST['id_servico'] ?? null;
        $adicionais = $_POST['adicionais'] ?? [];

        // buscar dados completos do serviço na API
        $api = "http://localhost:8001";

        $url = "{$api}/api/servicos.php";

        $dados = file_get_contents($url);

        // Montar item do carrinho
        $item = [
            "servico" => $dados,
            "adicionais" => $adicionais
        ];

        // criar carrinho se não existir
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // adicionar item
        $_SESSION['carrinho'][] = $item;

        // redirecionar
        header("Location: /carrinho");
        exit;
    }
}

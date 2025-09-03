<?php

use App\Model\Servico;

    require_once __DIR__ . '/../vendor/autoload.php';
    $servicos = Servico::findAll(); //fazer um foreach 

    if ($_POST) {
        $servico = new Servico(
            formaDePagamento: $_POST['formaDePagamento'],
            tipoDeServico: $_POST['tipoDeServico'],
            preco: 0.0
            //fazer com todos os campos do formulario
        );

        $servico->save();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="formaDePagamento" placeholder="Forma de pagamento">
        <input type="text" name="tipoDeServico" placeholder="Tipo de serviço">
        <input type="submit" value="Salvar">
    </form>
    
</body>
</html>
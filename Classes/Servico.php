<?php

class Servico
{
    private int $id_servico;
    private float $preco;
    private string $formaDePagamento;
    private string $tipoDeServico;

    public function __construct( $formaDePagamento, $tipoDeServico)
    {
   
        $this->formaDePagamento = $formaDePagamento;
        $this->tipoDeServico = $tipoDeServico;
    }

    public function setPreco(float $preco)
    {
        if ($preco > 0) {
            $this->preco = $preco;
        } else {
            throw new Exception("Preço inválido");
        }
    }

    public function getFormaDePagamento(): string
    {
        return $this->formaDePagamento;
    }

    public function getTipoDeServico(): string
    {
        return $this->tipoDeServico;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }
}

$servico = new Servico(formaDePagamento: "cartao", tipoDeServico: "limpeza");

// try {
//   $servico->setPreco(-120);
//    echo "Preço: " . $servico->getPreco() . ". Forma de pagamento: " . $servico->getFormaDePagamento() . ". Tipo de serviço: " . $servico->getTipoDeServico();
//} catch (Exception $e) {
//    echo "Erro: " . $e->getMessage();
// }


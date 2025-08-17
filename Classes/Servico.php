<?php

class Servico
{
    private int $id_servico;
    private float $preco;
    private string $formaDePagamento;
    private string $tipoDeServico;

    public function __construct($formaDePagamento, $tipoDeServico)
    {
        $this->formaDePagamento = $formaDePagamento;
        $this->tipoDeServico = $tipoDeServico;
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


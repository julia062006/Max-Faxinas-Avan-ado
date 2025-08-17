<?php
require_once 'classes/EnTipoServico.php';


class Servico
{
    private int $id_servico;
    private float $preco;
    private string $formaDePagamento;
    private EnTipoServico $tipoDeServico;

     public function __construct(string $formaDePagamento, EnTipoServico $tipoDeServico)
    {
        $this->formaDePagamento = $formaDePagamento;
        $this->tipoDeServico = $tipoDeServico;
    }

    // Getters (Serve para pegar os valores)
    public function getFormaDePagamento(): string
    {
        return $this->formaDePagamento;
    }

    public function getTipoDeServico(): EnTipoServico
    {
        return $this->tipoDeServico;
    }

    public function getPreco(): float
    
    {
        return $this->preco;
    }

    // Setters (Serve para alterar os valores)
    public function setFormaDePagamento(string $formaDePagamento): void
    {
        $this->formaDePagamento = $formaDePagamento;
    }

    public function setTipoDeServico(EnTipoServico $tipoDeServico): void
    {
        $this->tipoDeServico = $tipoDeServico;
    }

    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }
}


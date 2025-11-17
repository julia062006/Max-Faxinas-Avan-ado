<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity()]
class Agendamento
{

    #[Column, Id, GeneratedValue]
    private int $id;

    #[Column()]
    private DateTime $data;

    #[Column()]
    private string $status;

    #[ManyToOne()]
    private Cliente $cliente;

    #[ManyToOne()]
    private Servico $servico;

    #[ManyToOne()]
    private Forma_pagamento $forma_pagamento;

    #[ManyToOne]
    #[JoinColumn(name: "id_endereco")]
    private Endereco $endereco;

    #[Column]
    private float $valor_total;


    public function __construct(DateTime $data, string $status, Cliente $cliente, Servico $servico, Forma_pagamento $forma_pagamento, Endereco $endereco, float $valor_total)
    {
        $this->data = $data;
        $this->status = $status;
        $this->cliente = $cliente;
        $this->servico = $servico;
        $this->forma_pagamento = $forma_pagamento;
        $this->endereco = $endereco;
        $this->valor_total = $valor_total;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getData(): DateTime
    {
        return $this->data;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function getServico(): Servico
    {
        return $this->servico;
    }

    public function getFormaPagamento(): Forma_pagamento
    {
        return $this->forma_pagamento;
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    public function getValorTotal(): float
    {
        return $this->valor_total;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    public function setServico(Servico $servico): void
    {
        $this->servico = $servico;
    }

    public function setFormaPagamento(Forma_pagamento $forma_pagamento): void
    {
        $this->forma_pagamento = $forma_pagamento;
    }

    public function setEndereco(Endereco $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function setValorTotal(float $valor_total): void
    {
        $this->valor_total = $valor_total;
    }

    public static function findAll(): array
    {
        $entityManager = Database::getEntityManager();
        $repository = $entityManager->getRepository(Agendamento::class);
        return $repository->findAll();
    }

    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }
}

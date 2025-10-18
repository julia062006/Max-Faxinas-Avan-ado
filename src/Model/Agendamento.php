<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
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
    private forma_pagamento $forma_pagamento;

    public function __construct(DateTime $data, string $status, Cliente $cliente, Servico $servico)
    {
        $this->data = $data;
        $this->status = $status;
        $this->cliente = $cliente;
        $this->servico = $servico;
    }

    // Getters (Serve para pegar os valores)
    public function getData(): DateTime
    {
        return $this->data;
    }

    public function getId(): int {
    return $this->id;
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

    // Setters (Serve para alterar os valores)
    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
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
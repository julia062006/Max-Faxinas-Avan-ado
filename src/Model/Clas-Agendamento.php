<?php

require_once 'Clas-Cliente.php';

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity()]
class Agendamento {

    #[Column(), Id, GeneratedValue() ]
    private int $id_agendamento;

    #[Column()]
    private DateTime $data;

    #[Column()]
    private string $status;

    #[Column(), ManyToOne()]
    private Cliente $id_cliente;

    #[Column(), ManyToOne()]
    private Servico $id_servico;

    public function __construct(DateTime $data, string $status) {
        $this->data = $data;
        $this->status = $status;
    }

    // Getters (Serve para pegar os valores)
    public function getData(): DateTime {
        return $this->data;
    }

       public function getStatus(): string {
        return $this->status;
    }

    // Setters (Serve para alterar os valores)
    public function setData(DateTime $data): void {
        $this->data = $data;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }


}
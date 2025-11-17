<?php

namespace App\Model;


use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity()]
class Agendamento_adicional
{
    #[Column(), Id, GeneratedValue()]
    private int $id;

    #[ManyToOne()]
    private Agendamento $agendamento;

    #[ManyToOne]
    private Adicional $adicional;

    public function __construct(Agendamento $agendamento, Adicional $adicional)
    {
        $this->agendamento = $agendamento;
        $this->adicional = $adicional;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAgendamento(): Agendamento
    {
        return $this->agendamento;
    }

    public function getAdicional(): Adicional
    {
        return $this->adicional;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setAgendamento(Agendamento $agendamento): void
    {
        $this->agendamento = $agendamento;
    }

    public function setAdicional(Adicional $adicional): void
    {
        $this->adicional = $adicional;
    }

    public function save()
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }
}

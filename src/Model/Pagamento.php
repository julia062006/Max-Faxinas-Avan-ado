<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

#[Entity()]
class Pagamento
{
    #[Id, GeneratedValue, Column]
    private int $id;

    #[Column(type: "datetime")]
    private DateTime $data_pagamento;

    #[Column(type: "decimal", precision: 10, scale: 2)]
    private float $valor_total;

    #[Column]
    private string $status;

    #[ManyToOne]
    #[JoinColumn(name: "forma_pagamento_id", referencedColumnName: "id")]
    private Forma_pagamento $forma_pagamento;

    #[ManyToOne]
    #[JoinColumn(name: "cliente_id", referencedColumnName: "id")]
    private Cliente $cliente;

    #[ManyToOne]
    #[JoinColumn(name: "agendamento_id", referencedColumnName: "id")]
    private Agendamento $agendamento;

    public function __construct(
        DateTime $data_pagamento,
        float $valor_total,
        Forma_pagamento $forma_pagamento,
        Cliente $cliente,
        Agendamento $agendamento,
        string $status = "pendente"   // << valor padrão
    ) {
        $this->data_pagamento = $data_pagamento;
        $this->valor_total = $valor_total;
        $this->forma_pagamento = $forma_pagamento;
        $this->cliente = $cliente;
        $this->agendamento = $agendamento;
        $this->status = $status; // << evita o erro “Typed property must not be accessed before initialization”
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function save()
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }
}

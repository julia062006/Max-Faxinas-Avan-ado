<?php

namespace App\Model;

use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Endereco
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;

    #[Column]
    private string $rua;

    #[Column]
    private int $numero;

    #[Column]
    private string $bairro;

    // Agora cidade, estado e país viram strings
    #[Column]
    private string $cidade;

    #[Column]
    private string $estado;

    #[Column]
    private string $pais;

    #[ManyToOne]
    private Cliente $cliente;

    public function __construct(string $rua,int $numero,string $bairro,string $cidade,string $estado,string $pais,Cliente $cliente
    ) {
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->pais = $pais;
        $this->cliente = $cliente;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRua(): string
    {
        return $this->rua;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function getPais(): string
    {
        return $this->pais;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public static function findByCliente(Cliente $cliente): array
    {
        $em = Database::getEntityManager();
        $repo = $em->getRepository(Endereco::class);
        return $repo->findBy(['cliente' => $cliente]);
    }
}

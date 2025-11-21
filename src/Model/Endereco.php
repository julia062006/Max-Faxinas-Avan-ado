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

    #[ManyToOne()]
    private Cidade $cidade;


    #[ManyToOne]
    private Cliente $cliente;

    public function __construct(string $rua,int $numero,string $bairro,Cidade $cidade,Cliente $cliente
    ) {
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
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

    public function getCidade(): Cidade
    {
        return $this->cidade;
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

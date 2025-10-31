<?php
namespace App\Model;
 
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity()]
class Adicional {

    #[Column(), Id, GeneratedValue()]
    private int $id;

    #[Column()]
    private string $nome;

    #[Column()]
    private int $preco;

    #[ManyToOne()]
    private Servico $servico;

    public function __construct(string $nome, float $preco, Servico $servico) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->servico = $servico;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function getServico(): Servico {
        return $this->servico;
    }
}

?>
<?php
namespace App\Model;
 
use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

class Adicional {

    private int $id;

    private string $nome;

    private int $preco;

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
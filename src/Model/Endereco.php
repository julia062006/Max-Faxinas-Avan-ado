<?php
namespace App\Model;
 
use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

class Endereco {
    
    private int $id;
    private string $rua;
    private int $numero;         

    private string $bairro;
    private Cliente $cliente;

    private Cidade $cidade;

    public function __construct(string $rua, int $numero, string $bairro, Cliente $cliente, Cidade $cidade) {
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cliente = $cliente;
        $this->cidade = $cidade;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getRua(): string {
        return $this->rua;
    }

    public function getNumero(): int {
        return $this->numero;
    }

    public function getBairro(): string {
        return $this->bairro;
    }

    public function getCliente(): Cliente {
        return $this->cliente;
    }

    public function getCidade(): Cidade {
        return $this->cidade;
    }

}

?>
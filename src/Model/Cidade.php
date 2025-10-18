<?php
    //Grupo de classes
namespace App\Model;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use App\Core\Database;

class Cidade {

    private string $nome;

    private Estado $estado;

    public function __construct(string $nome, Estado $estado) {
        $this->nome = $nome;
        $this->estado = $estado;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEstado(): Estado {
        return $this->estado;
    }
}
?>
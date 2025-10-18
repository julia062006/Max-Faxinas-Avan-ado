<?php
namespace App\Model;
 
use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

class Estado {
    private string $nome;

    private string $sigla;

    private Pais $pais;

    public function __construct(string $nome, string $sigla, Pais $pais) {
        $this->nome = $nome;
        $this->sigla = $sigla;
        $this->pais = $pais;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getSigla(): string {
        return $this->sigla;
    }

    public function getPais(): Pais {
        return $this->pais;
    }
}

?>
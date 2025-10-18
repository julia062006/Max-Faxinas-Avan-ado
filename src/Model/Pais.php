<?php
namespace App\Model;
 
use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

class Pais {
    private int $id;

    private string $nome;

    public function __construct(string $nome) {
        $this->nome = $nome;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }
}

?>
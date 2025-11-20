<?php
    //Grupo de classes
namespace App\Model;

use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity()]
class Cidade {

    #[Column(), Id, GeneratedValue()]
    private int $id;

    #[Column()]
    private string $nome;

    #[ManyToOne()]
    private Estado $estado;

    public function __construct(string $nome, Estado $estado) {
        $this->nome = $nome;
        $this->estado = $estado;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEstado(): Estado {
        return $this->estado;
    }

    public static function findAll(): array
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(Cidade::class);
        return $repository->findAll();
    }

}
?>
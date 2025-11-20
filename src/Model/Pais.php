<?php
namespace App\Model;

use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity()]
class Pais {

    #[Column(), Id, GeneratedValue()]
    private int $id;

    #[Column()]
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

    public static function findAll(): array
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(Pais::class);
        return $repository->findAll();
    }
}

?>
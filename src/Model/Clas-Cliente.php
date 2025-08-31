<?php

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use App\Core\Database;

#[Entity()]
class Cliente {

    #[Column(), Id, GeneratedValue() ]
    private int $id_Cliente;

    #[Column()]
    private string $cpf;
    #[Column()]
    private string $nome;
    #[Column()]
    private string $email;
    #[Column()]
    private string $telefone;
    #[Column()]
    private string $endereco;

    public function __construct(string $cpf, string $nome, string $email, string $telefone, string $endereco) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

    // Getters (Serve para pegar os valores)
    public function getCpf(): string {
        return $this->cpf;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function getEndereco(): string {
        return $this->endereco;
    }

    // Setters (Serve para alterar os valores)
    public function setCpf(string $cpf): void {
        $this->cpf = $cpf;
    }

    public function setNome (string $nome): void {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setEndereco(string $endereco): void {
        $this->endereco = $endereco;
    }

    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }

    public static function findAll(): array
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(Cliente::class);
        return $repository->findAll();

    } 
     
}


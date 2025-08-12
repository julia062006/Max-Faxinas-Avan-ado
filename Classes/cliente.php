<?php 

class Cliente {

    private string $cpf;
    private string $nome;
    private string $email;
    private string $telefone;
    private string $endereco;

    public function __construct(string $cpf, string $nome, string $email, string $telefone, string $endereco) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

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
}


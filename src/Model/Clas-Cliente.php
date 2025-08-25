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

     
}

$cliente = new Cliente("12345678900", "Maria", "maria@email.com", "99999-9999", "Rua A, 123");

// Alterando dados com setters
$cliente->setNome("Maria Souza");
$cliente->setTelefone("88888-8888");

// Exibindo os valores atualizados
echo $cliente->getNome();     // Maria Souza
echo $cliente->getTelefone(); // 88888-8888


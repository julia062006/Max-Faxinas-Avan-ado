<?php

require_once 'Classes/Cliente.php';

// Criando cliente com dados fixos para testar
$primeiroCliente = new Cliente("12345", "Julia", "email@email.com", "99999", "Rua F");

// Imprimindo dados com os getters
echo $primeiroCliente->getNome("Julia") . " - " .
     $primeiroCliente->getEmail("email@email.com") . " - " .
     $primeiroCliente->getTelefone(3333333) . " - " .
     $primeiroCliente->getEndereco("Rua F") . " - " .
     $primeiroCliente->getCpf("99999");

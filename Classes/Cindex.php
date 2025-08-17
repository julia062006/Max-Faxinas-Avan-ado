<?php
require_once 'Cliente.php';
require_once 'Agendamento.php';

// Testando Cliente
$cliente = new Cliente("12345678900", "Ana", "ana@email.com", "9999-9999", "Rua X, 45");

echo "Nome: " . $cliente->getNome() . "<br>";

$cliente->setNome("Ana Souza");
$cliente->setTelefone("8888-8888");

echo "Nome atualizado: " . $cliente->getNome() . "<br>";
echo "Telefone atualizado: " . $cliente->getTelefone() . "<br>";

// Testando Agendamento
$agendamento = new Agendamento("2025-08-17", "14:00", "Limpeza geral");

echo "Data: " . $agendamento->getData() . "<br>";

$agendamento->setData("2025-08-18");

echo "Data atualizada: " . $agendamento->getData() . "<br>";

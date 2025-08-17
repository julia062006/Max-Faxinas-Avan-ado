<?php

require_once 'classes/EnStatusAgendamento.php';

class Agendamento {
    private string $data;
    private string $status;

    public function __construct(string $data, string $status) {
        $this->data = $data;
        $this->status = $status;
    }

    // Getters (Serve para pegar os valores)
    public function getData(): string {
        return $this->data;
    }

       public function getStatus(): string {
        return $this->status;
    }

    // Setters (Serve para alterar os valores)
    public function setData(string $data): void {
        $this->data = $data;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }


}
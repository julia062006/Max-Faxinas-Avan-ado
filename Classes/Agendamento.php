<?php

class Agendamento {
    private string $data;
    private string $status;

    public function __construct(string $data, string $status) {
        $this->data = $data;
        $this->status = $status;
    }

    public function getData(): string {
        return $this->data;
    }

       public function getStatus(): string {
        return $this->status;
    }


}
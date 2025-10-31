<?php
namespace App\Controller;

class AdicionalController{
    
    public function index($id){
        //form de cadastro e edição

        require "../View/servico/index.phtml";
    }

    public function salvar(){
        //salvar ou alterar os dados
    }

    public function excluir($id){
        //excluir os dados
    }

    public function listar(){
        //listar os dados
    }

}
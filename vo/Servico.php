<?php

class Servico {
    private $id;
    private $codigo;
    private $nome;
    private $preco;
    private $descricao;
    
    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }
    
    function getNome() {
        return $this->nome;
    }

    function getPreco() {
        return $this->preco;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function toString(){
        return $this->nome();
    }
}

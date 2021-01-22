<?php

class Produto {
    private $id;
    private $codigo;
    private $nome;
    private $precoCompra;
    private $precoVenda;
    private $quantidade;
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

    function getPrecoCompra() {
        return $this->precoCompra;
    }

    function getPrecoVenda() {
        return $this->precoVenda;
    }

    function getQuantidade() {
        return $this->quantidade;
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

    function setPrecoCompra($precoCompra) {
        $this->precoCompra = $precoCompra;
    }

    function setPrecoVenda($precoVenda) {
        $this->precoVenda = $precoVenda;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function toString(){
        return $this->codigo();
    }
}

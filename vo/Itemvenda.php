<?php

class Itemvenda {
    private $id;
    private $id_produto;
    private $id_servico;
    private $id_venda;
    private $quantidade;
    private $valor;
    
    function getId() {
        return $this->id;
    }

    function getId_produto() {
        return $this->id_produto;
    }

    function getId_servico() {
        return $this->id_servico;
    }

    function getId_venda() {
        return $this->id_venda;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getValor() {
        return $this->valor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_produto($id_produto) {
        $this->id_produto = $id_produto;
    }

    function setId_servico($id_servico) {
        $this->id_servico = $id_servico;
    }

    function setId_venda($id_venda) {
        $this->id_venda = $id_venda;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
    
    function toString(){
        return $this->id();
    }

}

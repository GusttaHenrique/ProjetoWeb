<?php

class Venda {
    private $id;
    private $data;
    private $hora;
    private $id_cliente;
    private $valor;
    
    function getId() {
        return $this->id;
    }

    function getData() {
        return $this->data;
    }

    function getHora() {
        return $this->hora;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getValor() {
        return $this->valor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
    
    function toString(){
        return $this->data();
    }
    
}

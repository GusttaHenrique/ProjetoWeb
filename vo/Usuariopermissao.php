<?php

class Usuariopermissao {
    private $id;
    private $id_usuario;
    private $id_permissao;
    private $descricao;
    
    function getId() {
        return $this->id;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_permissao() {
        return $this->id_permissao;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_permissao($id_permissao) {
        $this->id_permissao = $id_permissao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function toString(){
        return $this->descricao();
    }
}

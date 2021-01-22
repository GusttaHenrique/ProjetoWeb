<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Venda.php";
class VendaDAO {
    function salvar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "insert into venda (data,hora,id_cliente,valor)
                values (:data,:hora,:id_cliente,:valor)";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":data", $obj->getData());
            $p_sql->bindValue(":hora", $obj->getHora());
            $p_sql->bindValue(":id_cliente", $obj->getId_cliente());
            $p_sql->bindValue(":valor", $obj->getValor());
            $p_sql->execute();
            return $dbh->lastInsertId();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir".
                    $ex->getMessage();
        }  
    }
    function atualizar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "UPDATE venda SET data=:data,hora=:hora,id_cliente=:id_cliente,valor=:valor WHERE id=:id";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":data", $obj->getData());
            $p_sql->bindValue(":hora", $obj->getHora());
            $p_sql->bindValue(":id_cliente", $obj->getId_cliente());
            $p_sql->bindValue(":valor", $obj->getValor());
            $p_sql->bindValue(":id", $obj->getId());
            $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir".
                    $ex->getMessage();
        }  
    }
    function remover($id){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "DELETE FROM 'venda' WHERE id= :idRemovido";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":idRemovido", $id);
            $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir".
                    $ex->getMessage();
        }  
    }
    
    function listar(){
        
    }
    function PegarPorId(){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "SELECT * FROM 'venda' where id= :idBuscar";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":idBuscar", $id);
            $p_sql->execute();
            $dados= $p_sql->fetchAll(PDO::FETCH_OBJ);
            $lista= array();
            foreach($dados as $p){
                $lista[]= self::popular($p);
            }
            if (sizeof($lista)>0)
                return $lista[0];
            else{
                return new Venda();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir".
                    $ex->getMessage();
        }  
        
    }
    function listarTodos(){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "SELECT * FROM 'venda' order by data ASC";
            $p_sql= $dbh->prepare($sql);
            $p_sql->execute();
            $dados= $p_sql->fetchAll(PDO::FETCH_OBJ);
            $lista= array();
            foreach($dados as $p){
                $lista[]= self::popular($p);
            }
            return $lista;
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir".
                    $ex->getMessage();
        }  
    }
    
    private static function popular($dados){
        $obj= new Venda();
        $obj->setId($dados->id);
        $obj->setData($dados->data);
        $obj->setHora($dados->hora);
        $obj->setId_cliente($dados->id_cliente);
        $obj->setValor($dados->valor);
        return $obj;
    }
}

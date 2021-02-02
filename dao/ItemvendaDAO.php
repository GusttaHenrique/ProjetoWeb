<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Itemvenda.php";
class ItemvendaDAO {
    function salvar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "insert into itemvenda (id_produto,id_servico,id_venda,quantidade,valor)
                values (:id_produto,:id_servico,:id_venda,:quantidade,:valor)";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":id_produto", $obj->getId_produto());
            $p_sql->bindValue(":id_servico", $obj->getId_servico());
            $p_sql->bindValue(":id_venda", $obj->getId_venda());
            $p_sql->bindValue(":quantidade", $obj->getQuantidade());
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
            $sql = "UPDATE itemvenda SET id_produto=:id_produto,id_servico=:id_servico,id_venda=:id_venda,"
                    . "quantidade=:quantidade.valor=:valor WHERE id=:id";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":id_produto", $obj->getId_produto());
            $p_sql->bindValue(":id_servico", $obj->getId_servico());
            $p_sql->bindValue(":id_venda", $obj->getId_venda());
            $p_sql->bindValue(":quantidade", $obj->getQuantidade());
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
            $sql = "DELETE FROM itemvenda WHERE id= :idRemovido";
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
    function PegarPorId($id){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "SELECT * FROM itemvenda where id= :idBuscar";
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
                return new Itemvenda();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir".
                    $ex->getMessage();
        }  
        
    }
    function listarTodos(){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "SELECT * FROM itemvenda order by id_produto ASC";
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
        $obj= new Itemvenda();
        $obj->setId($dados->id);
        $obj->setId_produto($dados->id_produto);
        $obj->setId_servico($dados->id_servico);
        $obj->setId_venda($dados->id_venda);
        $obj->setQuantidade($dados->quantidade);
        $obj->setValor($dados->valor);
        return $obj;
    }
}

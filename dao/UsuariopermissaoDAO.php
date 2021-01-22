<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Usuariopermissao.php";
class UsuariopermissaoDAO {
    function salvar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "insert into usuariopermissao (id_usuario,id_permissao,descricao)
                values (:id_usuario,:id_permissao,:descricao)";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":id_usuario", $obj->getId_usuario());
            $p_sql->bindValue(":id_permissao", $obj->getId_permissao());
            $p_sql->bindValue(":descricao", $obj->getDescricao());
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
            $sql = "UPDATE usuariopermissao SET id_usuario=:id_usuario,id_permissao=:id_permissao,"
                    . "descricao=:descricao WHERE id=:id";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":id_usuario", $obj->getId_usuario());
            $p_sql->bindValue(":id_permissao", $obj->getId_permissao());
            $p_sql->bindValue(":descricao", $obj->getDescricao());
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
            $sql = "DELETE FROM 'usuariopermissao' WHERE id= :idRemovido";
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
            $sql = "SELECT * FROM 'usuariopermissao' where id= :idBuscar";
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
                return new Usuariopermissao();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir".
                    $ex->getMessage();
        }  
        
    }
    function listarTodos(){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "SELECT * FROM 'usuariopermissao' order by id_usuario ASC";
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
        $obj= new Usuariopermissao();
        $obj->setId($dados->id);
        $obj->setId_usuario($dados->id_usuario);
        $obj->setId_permissao($dados->id_permissao);
        $obj->setDescricao($dados->descricao);
        return $obj;
    }
}

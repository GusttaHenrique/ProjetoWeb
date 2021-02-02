<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Servico.php";
class ServicoDAO {
    function salvar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "insert into servico (codigo,nome,preco,descricao)
                values (:codigo,:nome,:preco,:descricao)";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":codigo", $obj->getCodigo());
            $p_sql->bindValue(":nome", $obj->getNome());
            $p_sql->bindValue(":preco", $obj->getPreco());
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
            $sql = "UPDATE servico SET codigo=:codigo,nome=:nome,preco=:preco,descricao=:descricao WHERE id=:id";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":codigo", $obj->getCodigo());
            $p_sql->bindValue(":nome", $obj->getNome());
            $p_sql->bindValue(":preco", $obj->getPreco());
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
            $sql = "DELETE FROM servico WHERE id= :idRemovido";
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
            $sql = "SELECT * FROM servico where id= :idBuscar";
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
                return new Servico();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir".
                    $ex->getMessage();
        }  
        
    }
    function listarTodos(){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "SELECT * FROM servico order by nome ASC";
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
        $obj= new Servico();
        $obj->setId($dados->id);
        $obj->setCodigo($dados->codigo);
        $obj->setNome($dados->nome);
        $obj->setPreco($dados->preco);
        $obj->setDescricao($dados->descricao);
        return $obj;
    }
}

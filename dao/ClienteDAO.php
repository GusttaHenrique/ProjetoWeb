<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Cliente.php";
class ClienteDAO {
    function salvar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "insert into cliente (nome,rua,numero,bairro,cidade,uf,cep,celular,email)
                values (:nome,:rua,:numero,:bairro,:cidade,:uf,:cep,:celular,:email)";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":nome", $obj->getNome());
            $p_sql->bindValue(":rua", $obj->getRua());
            $p_sql->bindValue(":numero", $obj->getNumero());
            $p_sql->bindValue(":bairro", $obj->getBairro());
            $p_sql->bindValue(":cidade", $obj->getCidade());
            $p_sql->bindValue(":uf", $obj->getUf());
            $p_sql->bindValue(":cep", $obj->getCep());
            $p_sql->bindValue(":celular", $obj->getCelular());
            $p_sql->bindValue(":email", $obj->getEmail());
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
            $sql = "UPDATE cliente SET nome=:nome,rua=:rua,numero=:numero,bairro=:bairro,cidade=:cidade,"
                    . "uf=:uf,cep=:cep,celular=:celular,email=:email WHERE id=:id";
            $p_sql= $dbh->prepare($sql);
            $p_sql->bindValue(":nome", $obj->getNome());
            $p_sql->bindValue(":rua", $obj->getRua());
            $p_sql->bindValue(":numero", $obj->getNumero());
            $p_sql->bindValue(":bairro", $obj->getBairro());
            $p_sql->bindValue(":cidade", $obj->getCidade());
            $p_sql->bindValue(":uf", $obj->getUf());
            $p_sql->bindValue(":cep", $obj->getCep());
            $p_sql->bindValue(":celular", $obj->getCelular());
            $p_sql->bindValue(":email", $obj->getEmail());
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
            $sql = "DELETE FROM cliente WHERE id= :idRemovido";
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
            $sql = "SELECT * FROM cliente where id= :idBuscar";
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
                return new Cliente();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir".
                    $ex->getMessage();
        }  
        
    }
    function listarTodos(){
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/bd/Conexao.php";
        try {
            $sql = "SELECT * FROM cliente order by nome ASC";
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
        $obj= new Cliente();
        $obj->setId($dados->id);
        $obj->setNome($dados->nome);
        $obj->setRua($dados->rua);
        $obj->setNumero($dados->numero);
        $obj->setBairro($dados->bairro);
        $obj->setCidade($dados->cidade);
        $obj->setUf($dados->uf);
        $obj->setCep($dados->cep);
        $obj->setCelular($dados->celular);
        $obj->setEmail($dados->email);
        return $obj;
    }
}

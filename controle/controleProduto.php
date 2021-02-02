<?php

require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Produto.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/dao/ProdutoDAO.php";
$produto= new Produto();
$produto->setCodigo($_POST['codigo']);
$produto->setNome($_POST['nome']);
$produto->setPrecoCompra($_POST['precoCompra']);
$produto->setPrecoVenda($_POST['precoVenda']);
$produto->setQuantidade($_POST['quantidade']);
$produto->setDescricao($_POST['descricao']);
$produto->setId($_POST['id']);
$dao= new ProdutoDAO();
if($_POST['id']==0)
    $dao->salvar($produto);
else
    $dao->atualizar($produto);
    
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sysoficin/pages/listarProduto.php');

?>
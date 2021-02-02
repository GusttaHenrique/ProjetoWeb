<?php

require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Servico.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/dao/ServicoDAO.php";
$servico= new Servico();
$servico->setCodigo($_POST['codigo']);
$servico->setNome($_POST['nome']);
$servico->setPreco($_POST['preco']);
$servico->setDescricao($_POST['descricao']);
$servico->setId($_POST['id']);
$dao= new ServicoDAO();
if($_POST['id']==0)
    $dao->salvar($servico);
else
    $dao->atualizar($servico);
    
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sysoficin/pages/listarServico.php');

?>
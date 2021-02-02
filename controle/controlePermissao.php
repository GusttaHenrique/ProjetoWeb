<?php

require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Permissao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/dao/PermissaoDAO.php";
$permissao= new Permissao();
$permissao->setDescricao($_POST['descricao']);
$permissao->setId($_POST['id']);
$dao= new PermissaoDAO();
if($_POST['id']==0)
    $dao->salvar($permissao);
else
    $dao->atualizar($permissao);
    
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sysoficin/pages/listarPermissao.php');

?>
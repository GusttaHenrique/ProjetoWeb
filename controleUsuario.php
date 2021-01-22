<?php

require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Usuario.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/dao/UsuarioDAO.php";
$usuario= new Usuario();
$usuario->setNome($_POST['nome']);
$usuario->setEmail($_POST['email']);
$usuario->setLogin($_POST['login']);
$usuario->setSenha($_POST['senha']);
$usuario->setId($_POST['id']);
$dao= new UsuarioDAO();
if($_POST['id']==0)
    $dao->salvar($usuario);
else
    $dao->atualizar($usuario);
    
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sysoficin/listarUsuario.php');

?>
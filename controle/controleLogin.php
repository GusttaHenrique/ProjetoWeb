<?php

$login=$_POST['login'];
$senha=$_POST['senha'];
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/dao/UsuarioDAO.php";
$dao= new UsuarioDAO();
$usuarioLogado= $dao->logar($login, $senha);
if ($usuarioLogado!=null){
    echo "Olá ".$usuarioLogado->getNome();
    if (isset($_POST['lembrar'])){
        setcookie("idUsuarioLogado", $usuarioLogado->getId(), time()+(60*60*24*30));
    }
    session_start();
    $_SESSION['idUsuarioLogado']=$usuarioLogado->getId();
}
else{
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/sysoficin/login.php?erro=1');
}
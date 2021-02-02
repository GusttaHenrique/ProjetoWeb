<?php

require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Cliente.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/dao/ClienteDAO.php";
$cliente= new Cliente();
$cliente->setNome($_POST['nome']);
$cliente->setRua($_POST['rua']);
$cliente->setNumero($_POST['numero']);
$cliente->setBairro($_POST['bairro']);
$cliente->setCidade($_POST['cidade']);
$cliente->setUf($_POST['uf']);
$cliente->setCep($_POST['cep']);
$cliente->setCelular($_POST['celular']);
$cliente->setEmail($_POST['email']);
$cliente->setId($_POST['id']);
$dao= new ClienteDAO();
if($_POST['id']==0)
    $dao->salvar($cliente);
else
    $dao->atualizar($cliente);
    
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sysoficin/pages/listarCliente.php');

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require $_SERVER['DOCUMENT_ROOT']."/sysoficin/dao/UsuarioDAO.php";
        $dao= new UsuarioDAO();
        $dao->remover($_GET['id']);
        header('Location: '.$_SERVER['HTTP_HOST'].'/sysoficin/listarUsuario.php');
        ?>
    </body>
</html>

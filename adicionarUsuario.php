<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['idUsuarioLogado']) and !isset($_COOKIE['idUsuarioLogado'])){
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/sysoficin/login.php');
}
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/vo/Usuario.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/dao/UsuarioDAO.php";
$usuario= new Usuario();
if (isset($_GET['id'])){
    echo "Editar";
    $dao= new UsuarioDAO();
    $usuario= $dao->PegarPorId($_GET['id']);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo (isset($_GET['id'])? "Editar Usuário":"Adicionar Usuário") ?></title>
    </head>
    <body>
        <form method="post" action="controleUsuario.php">
            <input type="hidden" name="id" value="<?php echo (isset($_GET['id'])?$usuario->getId():0) ;?>" />
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required="required" 
                       value="<?php echo (isset($_GET['id'])?$usuario->getNome():"") ?>"/>
            </div>
            <div>
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" required="required"
                       value="<?php echo (isset($_GET['id'])?$usuario->getLogin():"") ?>"/>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required="required"
                       value="<?php echo (isset($_GET['id'])?$usuario->getEmail():"") ?>"/>
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required="required"/>
            </div>
            <div>
                <label for="confirmarSenha">Confirmar Senha:</label>
                <input type="password" id="confirmarSenha" name="confirmarSenha" />
            </div>
            
            <div>
                <input type="submit" value="Enviar"/>
            </div>
            
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>

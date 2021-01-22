<?php
session_start();
if (isset($_SESSION['idUsuarioLogado'])){
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/sysoficin/adicionarUsuario.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="controle/controleLogin.php" method="post">
            <?php
            if (isset($_GET['erro'])){
                echo "<div style='color:red'>Login ou Senha errados!</div>";
            }
            ?>
            <div>
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" placeholder="Digite o Seu Login"/>
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite a Sua Senha"/>
            </div>
            <div> 
                Lembrar de mim <input type="checkbox" name="lembrar" />
            </div>
            <div>
                <input type="submit" value="Entrar"/>
            </div>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>

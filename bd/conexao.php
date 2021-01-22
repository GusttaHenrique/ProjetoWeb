<?php
$dsn = 'mysql:dbname=sysoficin;host=127.0.0.1';
$user = 'root';
$password = '';

$dbh=null;
try {
    $dbh = new PDO($dsn, $user, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
} catch (PDOException $e) {
    echo 'Falha na Conexão: ' . $e->getMessage();
}
?>
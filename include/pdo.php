<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

try{
    $pdo = new PDO('mysql:dbname=vintage;host=127.0.0.1;port:3306;','root','agaudin');
    $pdo->exec("SET NAMES utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo("erreur".$e->getMessage());
}
?>
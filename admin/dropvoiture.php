<?php
$pdo = new PDO('mysql:dbname=vintage;host=127.0.0.1;port:3306;','root','agaudin');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid=$_GET['id'];
    $recupVoiture = $pdo->prepare('SELECT*FROM voiture WHERE id=?');
    $recupVoiture->execute(array($getid));
    if($recupVoiture->rowCount()>0){
        $dropVoiture = $pdo->prepare('DELETE FROM voiture WHERE id = ?');
        $dropVoiture->execute(array($getid));
        header('location: dash.php');
    }
}
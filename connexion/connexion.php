<?php
require('../include/pdo.php');
if(isset($_POST['submit'])){
    if(!empty($_POST['surname']) && !empty($_POST['password'])){
        $login= htmlspecialchars($_POST["surname"]);
        $pass= htmlspecialchars($_POST["password"]);            

        $recupUser = $pdo->prepare('SELECT*FROM editeur WHERE name = ? AND mdp = ?');
        $recupUser->execute(array($login, $pass));

        if($recupUser->rowCount()>0){
            $_SESSION["name"] = $login;
            $_SESSION["mdp"] = $pass;
            header('location: ../admin/dash.php');
            echo 'accès';
            exit;
            }
        
    }
}
?>
<form action="" method="POST" class="form-connect">
    <label for="surname">Login</label>
    <input type="surname" name="surname" value="" placeholder="Entrer le nom d'utilisateur" >
    
    <label for="password">Mot de passe</label>
    <input type="password" name="password"  placeholder="Entrer le mot de passe" >

    <input type="submit" name="submit" value="Connexion">
</form>
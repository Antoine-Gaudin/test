<?php
require_once("../include/pdo.php");
require('../include/header.php');
require('../include/nav.php');
//require_once("../fonction/session.php");
//acces();

    if(isset($_POST['valider'])){
       if(!empty($_POST['nom'])){
           
               
                $Nom = ($_POST['nom']);
                $note = ($_POST['note']);
                $date = ($_POST['date']);
                $avis = nl2br(($_POST['avis']));
        
                
                
                $inservo = $pdo->prepare('INSERT INTO avisgoogle(name,avis,note,date)
                VALUES(?, ?, ?, ?)');
                $inservo->execute(array($Nom,$avis,$note,$date));
                echo "succèss";
           }     
        }
      
?>


<form method="POST" action="" enctype="multipart/form-data">

    <div class="label">Nom</div>
        <input type="text" name="nom" autocomplete="off"/>
    <br>
    <div class="label">Note</div>
        <input type="text" name="note" autocomplete="off"/>
    <br>
    <div class="label">Date</div>
        <input type="text" name="date" autocomplete="off"/>
    <br>
    <div class="label">Avis</div>
        <textarea name="avis" cols="30" rows="10">...</textarea>
    <br>
    
        <input type="submit" name="valider" value="envoyer">
</form>
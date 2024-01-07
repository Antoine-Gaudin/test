<?php
require_once("../include/pdo.php");
require('../include/header.php');
require('../include/nav.php');
//require_once("../fonction/session.php");
//acces();

    if(isset($_POST['valider'])){
       if(!empty($_POST['marque']) AND !empty($_POST['modele']) AND 
       !empty($_POST['adm']) AND !empty($_POST['mec']) AND !empty($_POST['couleur']) AND 
       !empty($_POST['din']) AND !empty($_POST['kil']) AND !empty($_POST['carburant']) AND 
       !empty($_POST['bv']) AND !empty($_POST['np']) AND !empty($_POST['tv']) AND !empty($_POST['pf']) AND 
       !empty($_POST['permis'])AND !empty($_POST['crit'])AND !empty($_POST['description']) AND !empty($_POST['immat'])){
           
                $m = ($_POST['marque']);
                $mo = ($_POST['modele']);
                $a = ($_POST['adm']);
                $me = ($_POST['mec']);
                $c = ($_POST['couleur']);
                $d = ($_POST['din']);
                $k = ($_POST['kil']);
                $ca = ($_POST['carburant']);
                $b = ($_POST['bv']);
                $n = ($_POST['np']);
                $t = ($_POST['tv']);
                $p = ($_POST['pf']);
                $pe = ($_POST['permis']);
                $cr = ($_POST['crit']);
                $px = ($_POST['prix']);
                $immat = ($_POST['immat']);
                $de = nl2br(($_POST['description']));
                require_once('../include/img.php');
                
                
                $inservo = $pdo->prepare('INSERT INTO voiture(marque,modele,annee_du_modele,mise_en_circulation,couleur,puissance_din,kilometrage,carburant,boite_de_vitesse,nombre_porte,type_de_vehicule,puissance_fiscale,permis,crit_air,description,immatriculation,prix)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $inservo->execute(array($m,$mo,$a,$me,$c,$d,$k,$ca,$b,$n,$t,$p,$pe,$cr,$de,$immat,$px));
                echo "succèss";
           }     
        }
      
?>


<form method="POST" action="" enctype="multipart/form-data">

    <div class="label">image</div>
    <input type="file" name="image[]" multiple>

        <div class="label">IMMATRICULATION</div>
        <input type="text" name="immat" autocomplete="off"/>

        <div class="label">marque</div>
        <input type="text" name="marque" autocomplete="off"/>
    <br>
    <div class="label">modèle</div>
        <input type="text" name="modele" autocomplete="off"/>
    <br>
    <div class="label">l'année du modèle</div>
        <input type="text" name="adm" autocomplete="off"/>
    <br>
    <div class="label">mise en circulation</div>
        <input type="text" name="mec" autocomplete="off"/>
    <br>
    <div class="label">couleur</div>
        <input type="text" name="couleur" autocomplete="off"/>
    <br>
    <div class="label">puissance DIN</div>
        <input type="text" name="din" autocomplete="off"/>
    <br>
    <div class="label">kilométrage</div>
        <input type="text" name="kil" autocomplete="off"/>
    <br>
    <div class="label">carburant</div>
        <input type="text" name="carburant" autocomplete="off"/>
    <br>
    <div class="label">boite de vitesse</div>
        <input type="text" name="bv" autocomplete="off"/>
    <br>
    <div class="label">nombre de porte</div>
        <input type="text" name="np" autocomplete="off"/>
    <br>
    <div class="label">type de véhicule</div>
        <input type="text" name="tv" autocomplete="off"/>
    <br>
    <div class="label">puissance fiscale</div>
        <input type="text" name="pf" autocomplete="off"/>
    <br>
    <div class="label">permis</div>
        <input type="text" name="permis" autocomplete="off"/>
    <br>
    <div class="label">crit'air</div>
        <input type="text" name="crit" autocomplete="off"/>
    <br>
    <div class="label">prix</div>
        <input type="text" name="prix" autocomplete="off"/>
    <br>
    <div class="label">description</div>
        <textarea name="description" cols="30" rows="10">...</textarea>
    <br>
    
        <input type="submit" name="valider" value="envoyer">
</form>
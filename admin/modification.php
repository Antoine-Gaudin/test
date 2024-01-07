<?php
  require('../include/pdo.php');
  require('../include/header.php');
    require('../include/nav.php');
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getid=$_GET['id'];

        $recupVoiture = $pdo->prepare('SELECT*FROM voiture WHERE id = ?');
        $recupVoiture->execute(array($getid));
        if($recupVoiture->rowCount()>0){
            $global = $recupVoiture->fetch();
                $marque = $global['marque'];
                $modele = $global['modele'];
                $adm = $global['annee_du_modele'];
                $mec = $global['mise_en_circulation'];
                $couleur = $global['couleur'];
                $din = $global['puissance_din'];
                $kil = $global['kilometrage'];
                $carburant = $global['carburant'];
                $bv = $global['boite_de_vitesse'];
                $np = $global['nombre_porte'];
                $tv = $global['type_de_vehicule'];
                $pf = $global['puissance_fiscale'];
                $permis = $global['permis'];
                $crit = $global['crit_air'];
            $description=str_replace('<br />','', $global['description']);

            if(isset($_POST['valider'])){
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
                $de = nl2br(($_POST['description']));

                $updateArticle = $pdo->prepare('UPDATE voiture SET marque = ?, modele = ?, annee_du_modele = ?, mise_en_circulation = ?, couleur = ?,puissance_din = ?, kilometrage = ?, carburant = ?, boite_de_vitesse = ?, nombre_porte = ?, type_de_vehicule = ?, puissance_fiscale = ?, permis = ?, crit_air = ?, description = ? WHERE id = ?');
                $updateArticle->execute(array($m,$mo,$a,$me,$c,$d,$k,$ca,$b,$n,$t,$p,$pe,$cr,$de));

                header('location: dash.php');
            }
            
        }
    }


?>

<center><p>formulaire de modification</p></center>
<form class="form-modif" method="POST" action="">
    <div class="container-input">
       <div class="label">marque</div>
        <input value="<?=$marque;?>" type="text" name="marque" autocomplete="off"/>
    <br>     
    </div>
<div class="container-input">
        <div class="label">modèle</div>
        <input value="<?=$modele;?>" type="text" name="modele" autocomplete="off"/>
    <br>
</div>

<div class="container-input">
        <div class="label">l'année du modèle</div>
        <input value="<?=$adm;?>" type="text" name="adm" autocomplete="off"/>
    <br>
</div>
<div class="container-input">
        <div class="label">mise en circulation</div>
        <input value="<?=$mec;?>" type="text" name="mec" autocomplete="off"/>
    <br>
</div>
<div class="container-input">
        <div class="label">couleur</div>
        <input value="<?=$couleur;?>" type="text" name="couleur" autocomplete="off"/>
    <br>
</div>
<div class="container-input">
        <div class="label">puissance DIN</div>
        <input value="<?=$din;?>" type="text" name="din" autocomplete="off"/>
    <br>
</div>
<div class="container-input">
        <div class="label">kilométrage</div>
        <input value="<?=$kil;?>" type="text" name="kil" autocomplete="off"/>
    <br>
</div>
<div class="container-input">
        <div class="label">carburant</div>
        <input value="<?=$carburant;?>" type="text" name="carburant" autocomplete="off"/>
    <br>
</div>
<div class="container-input">    
    <div class="label">boite de vitesse</div>
        <input value="<?=$bv;?>" type="text" name="bv" autocomplete="off"/>
    <br>
</div>

<div class="container-input">
        <div class="label">nombre de porte</div>
        <input value="<?=$np;?>" type="text" name="np" autocomplete="off"/>
    <br>
</div>
<div class="container-input">
        <div class="label">type de véhicule</div>
        <input value="<?=$tv;?>" type="text" name="tv" autocomplete="off"/>
    <br>
</div>
<div class="container-input">
        <div class="label">puissance fiscale</div>
        <input value="<?=$pf;?>" type="text" name="pf" autocomplete="off"/>
    <br>
</div>
<div class="container-input">
        <div class="label">permis</div>
        <input value="<?=$permis;?>" type="text" name="permis" autocomplete="off"/>
    <br>
</div>
<div class="container-input">
        <div class="label">crit'air</div>
        <input value="<?=$crit;?>" type="text" name="crit" autocomplete="off"/>
    <br>
</div>
<div>
    <div class="label">description</div>
        <textarea value="<?=$description;?>"name="description" cols="80" rows="70"><?=$description;?></textarea>
    <br>
    <div>
        <input type="submit" name="valider" value="envoyer">
    </div>
</div>
</form>


<style>
    .form-modif{
        width: 70%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
    }

    .container-input{
        width: 200px;
    height: 50px;
    margin: 5px;
    }
</style>
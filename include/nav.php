<div class="container-logo">
    <img class="img-logo" src="../logo/logovintage.jpg" alt="LOGO vintage automobile 1856">
</div>
<nav class="nav">
    <ul class="nav-flex">
        <li class="element-nav position-left"><a class="li-a" href="../index.php">Accueil</a></li>
        <li class="element-nav"><a class="li-a" href="../pages/catalogue.php">Produits</a></li>
        <li class="element-nav"><a class="li-a" href="../pages/contact.php">Contact</a></li>
        <?php if(@$_SESSION["name"]): ?>
        <li class="element-nav"><a class="li-a" href="../connexion/session_destroy.php">Deconnection</a></li>
        <li class="element-nav"><a class="li-a" href="../admin/addvoiture.php">Ajouter une voiture</a></li>
        <li class="element-nav"><a class="li-a" href="../admin/dash.php">Dashboard</a></li>
        <li class="element-nav"><a class="li-a" href="../scrapping/scrap.php">Scrapping</a></li>
        <li class="element-nav"><a class="li-a" href="../pages/modèleVente.php">Fiche Voiture</a></li>
        <?php endif; ?>
    </ul>
</nav>

<style>
    .li-a{
        text-decoration: none;
        color: black;
    }

    .nav-flex {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .element-nav {
        float: left;
        margin: 15px;
        font-size: 1.6rem;
        font-weight: bold;
        border-bottom: 4px solid white;
    }


    .element-nav:hover{
        border-bottom: 4px solid var(--text);
    }

    .position-left {
        margin-left: 4%;
    }
</style>
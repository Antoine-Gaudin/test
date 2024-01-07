<?php
require_once("include/pdo.php");
require('include/header.php');

/*
$sql = "SELECT * FROM voiture 
WHERE vendu = '0'
ORDER BY create_time DESC
LIMIT 8";
$requete = $pdo->query($sql);
$voiture = $requete->fetchAll();

$sqlA = "SELECT * FROM article 
WHERE slide = 1
ORDER BY create_time DESC";
$requete = $pdo->query($sqlA);
$article = $requete->fetchAll();


$sqlAvis = "SELECT * FROM avisgoogle 
ORDER BY create_time DESC";
$requete = $pdo->query($sqlAvis);
$avis = $requete->fetchAll();*/

$chemin = 'Data/DataVoiture.php';
$voiture = require(realpath(__DIR__ . '/' . $chemin));

?>



<?php require('include/nav.php'); ?>


<div class="container-titre">
  <h2 class="titre">Bienvenu chez Vintage automobile 1856</h2>
</div>

<nav id="content" class="nav-two">
  <ul class="container-two">
    <li class="L-direct" onclick="window.location.href = './pages/catalogue.php'; return false;">Voir notre boutique</li>
    <li class="L-direct" id="estimation-btn">Estimer votre véhicule</li>
  </ul>
</nav>




<div class="barre"></div>


<!-- FORMULAIRE DE REPRISE-->

<!-- PRESENTATION DU SITE-->
<!-- Swiper -->
<div class="container-slide">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

      <div class="swiper-slide">
        <a class="a-slide" href="./pages/article.php?article=3">
          <img class="container-img-slide" src="/imgArticle/slideAchat.PNG" alt="Carte grise">
        </a>
      </div>


    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</div>

<?php require('include/form.php'); ?>

<!-- PRESENTATION DES VOITURES-->

<center>
  <h1>Nos derniers arrivages</h1>
</center>

<section class="height-slide">
  <div class="cards">
    <?php foreach ($voiture as $a) :
      $date = $a["create_time"];
      $timestamp = strtotime($date);
      $formatted_date = date("d/m/Y", $timestamp);

      $response = '';

      // Formate la date de l'article pour exclure l'heure
      $articleDate = date("Y-m-d", $timestamp);

      if ($articleDate === date("Y-m-d")) {
        $response = "Aujourd'hui";
      } else {
        $response = $formatted_date;
      }
      /*
      $sql = "SELECT * FROM images
            WHERE imageid = :id_img
            LIMIT 1";
      $requete = $pdo->prepare($sql);
      $requete->bindParam(':id_img', $a["immatriculation"]);
      $requete->execute();
      $img = $requete->fetch();

      $photoVoiture = $img["cheminimage"];*/
    ?>
      <div class="container-article" onclick="window.location.href = '/admin/detailvoiture.php?id=<?= $a['id'] ?>'; return false;">
        <div class="container-img">
          <img class="img-bull" src="./images/CC-170-AA/4459a31b3bec75d1c826c628bfb2d1b085355dc9.jpg" alt="">
        </div>
        <div class="bull-auteur">
          <div class="controler-auteur">
            <p class="p-auteur"><?= $a['prix'] ?></p>
          </div>
        </div>
        <div class="titre-article">
          <p class="titre-enter"><?= $a['marque'] ?> <?= $a['modele'] ?></p>
        </div>
        <div class="intro-article">
          <p><?= strlen($a['description']) > 150 ? substr($a['description'], 0, 150) . '...' : $a['description'] ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<h3 class="voir-avis" onclick="window.location.href = '/pages/catalogue.php'; return false;">Voir tout :</h3>

<div class="barre"></div>

<center>
  <h1>Avis Google</h1>
</center>

<section class="section-avis">

  <div class="container-avis">
    <center>
      <h4 class="name-avis">
        François Reculard
      </h4>
    </center>
    <div>
      <p>
        Note de 5/5
        <small>
          (Il y a 6 mois)
        </small>
      </p>
    </div>
    <div>
      <p class="p-a">
        Après 2 visites dans ce garage et un accueil toujours agréable, j'ai trouvé une voiture qui me convenait. Les voitures présentées sont très propres. Le responsable est très pro et a l'écoute des clients. Après l'achat, quelques réglages ont été nécessaires sur le véhicule. Le responsable, Julien, a mis tout son professionnalisme pour régler cela de façon magistrale. Donc je félicite Julien et son équipe pour leur sérieux. Garage que je recommande très vivement.
      </p>
    </div>
  </div>

</section>

<h3 class="voir-avis" onclick="window.location.href = 'https://www.google.com/maps/place/Vintage+Automobiles+1856/@49.4402147,1.1784625,17z/data=!4m8!3m7!1s0x47e0d9628715f981:0x57aa04dd5ddac8bb!8m2!3d49.4402147!4d1.1784625!9m1!1b1!16s%2Fg%2F11gh2vtp3b?entry=ttu;'">
  Voir tout les avis</h3>


<style>
  .p-a {
    text-align: justify;
  }

  .name-avis {

    background-color: black;
    padding: 13px;
    border-radius: 10px;
    width: 64%;

  }

  .section-avis {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .container-avis {
    width: 300px;
    padding: 10px;
    box-shadow: 0 0 10px var(--noir);
    border-radius: 10px;
    margin: 10px;
    background-color: var(--text);
    color: white;
  }

  .voir-avis {
    cursor: pointer;
    text-align: center;
  }

  .voir-avis:hover {
    color: var(--text);
  }

  .cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .container-article {
    box-shadow: 0 0 10px var(--noir);
    margin: 15px;
    width: 21rem;
    border-radius: 15px;
    cursor: pointer;
    transition: 0.25s ease;
  }

  .container-article:hover {
    transform: scale(1.05) rotate(1deg);
    box-shadow: 0 0 10px var(--text);
  }

  .container-img {

    height: 18rem;
    width: 21rem;
    border-radius: 15px 15px 0 0;


  }

  .intro-article {
    text-align: center;
  }


  .titre-enter {
    margin: 0;
  }

  .img-bull {

    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 15px 15px 0 0;
  }

  .date-article {
    text-align: center;
  }

  .bull-auteur {
    position: relative;
    top: -25px;
    border: 1px solid var(--text);
    text-align: center;
    width: 80%;
    margin: 0 auto;
    background-color: var(--text);


  }

  .p-auteur {
    color: white;
  }

  .titre-article {
    text-align: center;
    font-weight: bold;
  }

  .swiper {
    width: 100%;
    height: 500px;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>

<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


  document.addEventListener("DOMContentLoaded", function() {
    var estimationBtn = document.getElementById("estimation-btn");
    var customForm = document.getElementById("custom-form");
    var overlay = document.getElementById("overlay");

    estimationBtn.addEventListener("click", function() {
      // Afficher le formulaire personnalisé
      customForm.style.display = "block";
      overlay.style.display = "block";
    });
  });
</script>

<?php require('include/footer.php'); ?>

<style>
  .barre {

    width: 100%;
    margin: auto;
    height: 5px;
    background-color: var(--noir);

  }


  .container-two {
    list-style-type: none;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .L-direct {
    margin: 15px;
    font-size: 2rem;
    border: 3px solid var(--black);
    padding: 10px;
    border-radius: 7px;
    background-color: black;
    color: white;
  }

  .L-direct:hover {
    background-color: var(--text);
    transition: 0.3s;
  }

  .container-titre {
    margin: 7%;
  }

  .titre {
    text-align: center;
    font-size: 3rem;
    font-weight: bold;
  }

  .container-img-slide {
    width: 100%;
  }

  .a-slide {
    width: 100%;
  }
</style>
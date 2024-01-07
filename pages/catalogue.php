<?php
require_once("../include/pdo.php");
require('../include/header.php');
/*

$sql = "SELECT * FROM voiture 
ORDER BY create_time DESC";
$requete = $pdo->query($sql);
$voiture = $requete->fetchAll();*/

$chemin = '../Data/DataVoiture.php';
$voiture = require(realpath(__DIR__ . '/' . $chemin));

require('../include/nav.php');

?>


<center>
  <h2>Retrouvez l'ensemble de nos produits sur cette page</h2>
</center>


<h3 style="margin-left: 10%;">
  Partie filtre
</h3>

<div class="container-filter">
  Contenu des filtres
</div>


<style>
  .container-filter {
    border: 1px solid;
    width: 80%;
    height: 300px;
    margin: auto;
    border-radius: 10px;
  }
</style>
<div class="container-B-recherche">
  <input class="B-recherche" type="text" id="searchInput" placeholder="Rechercher...">
</div>


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

      /*$sql = "SELECT * FROM images
            WHERE imageid = :id_img
            LIMIT 1";
      $requete = $pdo->prepare($sql);
      $requete->bindParam(':id_img', $a["immatriculation"]);
      $requete->execute();
      $img = $requete->fetch();

      $photoVoiture = $img["cheminimage"];*/
    ?>
      <div class="container-article element" onclick="window.location.href = '/admin/detailvoiture.php?id=<?= $a['id'] ?>'; return false;">
        <div class="container-img">
          <img class="img-bull" src="../images/CC-170-AA/4459a31b3bec75d1c826c628bfb2d1b085355dc9.jpg" alt="">
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



<style>
  .container-B-recherche {
    text-align: center;
    margin: 15px;
  }

  .B-recherche {
    height: 50px;
    width: 850px;
    border: none;
    border-radius: 7px;
    box-shadow: 0px 0px 5px var(--noir);
    text-align: center;
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
</style>


<script>
  const searchInput = document.getElementById('searchInput');
  const articles = document.querySelectorAll('.element'); // Sélectionnez les éléments avec la classe "element"
  const checkboxValues = document.querySelectorAll('#checkboxValues input[type="checkbox"]');

  function performSearch() {
    const searchTerms = searchInput.value.toLowerCase().split(' '); // Divisez la valeur de la recherche en termes

    articles.forEach((article) => {
      const text = article.textContent.toLowerCase();
      const match = searchTerms.every((term) => text.includes(term)); // Vérifiez si tous les termes sont présents
      article.style.display = match ? 'block' : 'none';
    });
  }

  // Fonction pour mettre à jour la barre de recherche en fonction des cases à cocher
  function updateSearchInput() {
    let searchValue = '';

    checkboxValues.forEach((checkbox) => {
      if (checkbox.checked) {
        searchValue += ' ' + checkbox.value;
      }
    });

    searchInput.value = searchValue.trim(); // Mettez à jour la valeur de la barre de recherche
    performSearch(); // Déclenchez la recherche
  }

  // Ajoutez un gestionnaire d'événements pour les cases à cocher
  checkboxValues.forEach((checkbox) => {
    checkbox.addEventListener('change', updateSearchInput);
  });

  // Ajoutez un gestionnaire d'événements pour le champ de recherche
  searchInput.addEventListener('input', performSearch);
</script>

<?php require('../include/footer.php'); ?>
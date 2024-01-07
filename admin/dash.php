<?php 
require_once("../include/header.php");
require_once("../include/pdo.php");
require_once("../fonction/session.php");
require_once("../include/nav.php");
acces();

$requete = $pdo->query('SELECT*FROM voiture WHERE vendu = "0" ORDER BY create_time DESC');
$voiture = $requete->fetchAll();
?>





<div class="container-B-recherche">
  <input class="B-recherche" type="text" id="searchInput" placeholder="Rechercher...">
</div>

<div class="section-dash">
    <div class="div-dash">
        <a href="dash.php">
            voiture en vente
        </a>
        <a href="cataVendu.php">
            voiture vendu
        </a>
    </div>
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

      $sql = "SELECT * FROM images
            WHERE imageid = :id_img
            LIMIT 1";
      $requete = $pdo->prepare($sql);
      $requete->bindParam(':id_img', $a["immatriculation"]);
      $requete->execute();
      $img = $requete->fetch();

      $photoVoiture = $img["cheminimage"];
    ?>
      <div class="container-article element">
        <div class="container-img">
          <img class="img-bull" src="../images/<?= $photoVoiture ?>" alt="">
        </div>
        <div class="bull-auteur">
          <div class="controler-auteur">
            <p class="p-auteur"><?= $a['immatriculation'] ?></p>
          </div>
        </div>
        <div class="titre-article">
          <p class="titre-enter"><?= $a['marque'] ?> <?= $a['modele'] ?></p>
        </div>
        <div class="intro-article">
            <div class="b-mofid">
                <a class="buttn"href="dropvoiture.php?id=<?=$a["id"]?>">Supprimer l'annonce</a>
            </div>
            <div class="b-mofid">
                <a class="buttn" href="modification.php?id=<?=$a["id"]?>">modifier l'annonce</a>
            </div>
            <div class="b-mofid">
                <a class="buttn" href="Vendu.php?id=<?=$a["id"]?>">marqué comme vendu</a>
            </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
    
    <script src="../scrit.js"></script>
    


    <style>

.buttn{
  text-decoration: none;
    color: black;
    padding: 8px;
    background-color: var(--text);
    border-radius: 10px;
}

.b-mofid{
  margin: 20px;
}

.buttn:hover{
    background-color: black;
    color: white;

}

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


.cards{
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
  .section-dash{
        margin: auto;
        width: 20%;
    }

    .div-dash{
        display: flex;
    }

    .div-dash a{
        margin: 10px;
        text-decoration: none;
        color: black;
    }

    .div-dash a:hover{
        color: var(--text);
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

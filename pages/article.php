<?php 
session_start();
require_once('../include/pdo.php');
require_once('../include/header.php');

$id_article = $_GET['article'];


$stmt = $pdo->prepare("SELECT *
                      FROM article
                      WHERE `id` = ?");
$stmt->execute([$id_article]);
$article = $stmt->fetch();

$contenu = $article["contenu"];
$titre = $article["titre"];

$sqlA = "SELECT * FROM article 
WHERE slide = 1
ORDER BY create_time DESC";
$requete = $pdo->query($sqlA);
$articleTotal = $requete->fetchAll();

?>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<?php require_once('../include/nav.php'); ?>


<div class="barre"></div>

  <section>
    <article>
        <h1 class="title-article"><?= $titre?></h1>
      <div class="container-text">
        <?= $contenu?>
      </div>
    </article>
  </section>


<center><h2>Lire un autre article ? :</h2></center>

  <div class="container-slide">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <?php foreach ($articleTotal as $a) : ?>

        <div class="swiper-slide">
          <a class="a-slide" href="article.php?article=<?= $a['id'] ?>">
            <img class="container-img-slide" src="/imgArticle/<?= $a['image'] ?>" alt="Carte grise">
          </a>
        </div>

      <?php endforeach; ?>

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</div>



<?php require_once('../include/footer.php'); ?>


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
</script>

<style>
.title-article{
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
    width: 95%;
}

.container-text{
    width: 70%;
    margin-left: 10%;
    margin-bottom: 5%;

}

p{
    font-size: 1.3rem !important;
}


  .barre {

    width: 100%;
    margin: auto;
    height: 5px;
    background-color: var(--noir);

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

  .a-slide {
    width: 100%;
  }

  .container-img-slide {
    width: 100%;
  }
</style>

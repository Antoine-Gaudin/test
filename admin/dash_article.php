<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Ajout d'article</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<?php
    require('../include/pdo.php');

if (isset($_POST['valider'])) {

    $titre =$_POST['Titre'];
    $slide =$_POST['attache'];
    $contenu =nl2br($_POST['editordata']);
    $description = nl2br($_POST['intro']);

    require_once('../form_art_img.php');

    $inserDevis = $pdo->prepare('INSERT INTO article(titre,contenu,`image`,`description`,slide)VALUES(?, ?, ?, ?, ?)');
    $inserDevis->execute(array($titre,$contenu,$image,$description,$slide));

    echo "succèss";
  
}
?>


<body>
  <form class="contacth" method="POST" action="" enctype="multipart/form-data">
    <div class="">Titre</div>
    <input type="text" name="Titre" autocomplete="off" />

    <label for="fichier">image de l'article</label>
    <input type="file" name="image" id="fichier">

    <div class="">Slide</div>
    <input type="text" name="attache" autocomplete="off" />

    <textarea id="summernote" name="editordata"></textarea>

    <textarea id="summernote" name="intro"></textarea>

    <input type="submit" name="valider" value="envoyer">
  </form>

  <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script>
</body>

</html>
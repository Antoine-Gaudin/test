<?php
$dossier_images = "../images/" . $_POST['immat'] . "/";

if (!file_exists($dossier_images)) {
    mkdir($dossier_images, 0777, true);
}

if (isset($_FILES['image']['tmp_name'])) {
    $images = $_FILES['image']['tmp_name'];
    $noms_images = $_FILES['image']['name'];

    foreach ($images as $key => $image) {
        $nom_image = basename($noms_images[$key]);
        $chemin_image = $dossier_images . $nom_image;

        if (move_uploaded_file($image, $chemin_image)) {
            // Utilisation de requêtes préparées pour insérer les données dans la base de données
            $requete = "INSERT INTO images (nom, cheminimage, imageid) VALUES (:nom, :chemin_image, :image_id)";
            $stmt = $pdo->prepare($requete);
            $stmt->bindParam(':nom', $nom_image);
            $stmt->bindParam(':chemin_image', $chemin_image);
            $stmt->bindParam(':image_id',$immat);

            if ($stmt->execute()) {
                echo "Image insérée avec succès.";
            } else {
                echo "Erreur lors de l'insertion de l'image.";
            }
        }
    }
}

?>
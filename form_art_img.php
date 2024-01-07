<?php
        if(isset($_FILES["image"]) && $_FILES["image"]["error"]===0){
    $allowed = [
        "jpg" => "image/jpeg",
        "jpeg" => "image/jpeg",
        "png" => "image/png",
        "webp"=>"image/webp",
    ];

    $filename = $_FILES["image"]["name"];
    $filetype = $_FILES["image"]["type"];
    $filesize = $_FILES["image"]["size"];
    $filetmp = $_FILES["image"]["tmp_name"];

    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if(!array_key_exists($extension,$allowed) || !in_array($filetype,$allowed)){
            echo("erreur: format de fichier incorrect");
    }
    $newname = md5(uniqid());
    $newfilename = __DIR__ . "/imgArticle/$filename";
    $image=$filename;
    if(!move_uploaded_file($filetmp, $newfilename)){
        echo("l'upload a echoué");
    }
    //on interdit l'execution du fichier
    chmod($newfilename, 0644);
    }

?>
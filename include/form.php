<?php
if (isset($_POST['valider'])) {
    $entete  = 'MIME-Version: 1.0' . "\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $entete .= 'From: test@monsite.fr' . "\r\n";
    $entete .= 'Reply-to: ' . $_POST['email'];

    $message = '<h1>Message envoyé depuis la page Contact de monsite.fr</h1>
        <p><b>Email : </b>' . $_POST['email'] . '<br>
        <b>Message : </b>' . htmlspecialchars($_POST['nom']) . htmlspecialchars($_POST['immatriculation']) . htmlspecialchars($_POST['tel']) . htmlspecialchars($_POST['email']) . htmlspecialchars($_POST['modele']) . '</p>';

    $retour = mail('emaildejulien.fr', 'Envoi depuis le site', $message, $entete);
    //if($retour)
    echo '<p>Votre message a bien été envoyé.</p>';
}
?>


<div class="overlay">
    <form id="custom-form" method="POST" action="">
        <h1>Demande d'estimation</h1>
    <div class="container-form-accueil">
        <div class="container-input">
            <div>Nom</div>
            <input class="input-form-accueil" type="text" name="nom" autocomplete="off" />
            <small></small>
            <br>
        </div>

        <div class="container-input">
            <div>Prénom</div>
            <input class="input-form-accueil" type="text" name="prénom" autocomplete="off" />
            <small></small>
            <br>
        </div>

        <div class="container-input">
            <div>Immatriculation du véhicule</div>
            <input class="input-form-accueil" type="text" name="immatriculation" autocomplete="off" />
            <small></small>
            <br>
        </div>
        <div class="container-input">
            <div>Numéro de téléphone</div>
            <input class="input-form-accueil" type="text" name="tel" autocomplete="off" />
            <small></small>
            <br>
        </div>
        <div class="container-input">
            <div>Email</div>
            <input class="input-form-accueil" type="email" name="email" autocomplete="off" />
            <br>
        </div>
        <div class="container-input">
            <small></small>
            <div>Modèle de voiture</div>
            <input class="input-form-accueil" type="text" name="modele" autocomplete="off" />
            <br>
        </div>
    </div>
        <div>
            <input class="input-form-submit" type="submit" name="valider" value="envoyer">
        </div>

        <button class="button-fermer" id="button" onclick="fermerDiv('#custom-form', event)">X</button>
        <small></small>

    </form>
</div>

<div id="overlay"></div>


<script>
    function fermerDiv(divId, event) {
    event.stopPropagation(); // Arrêter la propagation de l'événement

    let targetDiv = document.getElementById(divId);

    if (targetDiv) {
        targetDiv.style.display = 'none';
    } else {
        console.error("L'élément avec l'ID", divId, "n'a pas été trouvé.");
    }
}
</script>

<style>

button{
    background: none;
    border: none;
    padding: 0;
    margin: 0;
    font: inherit;
    cursor: pointer;
    outline: inherit;
}

.container-form-accueil{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.button-fermer{
    color: white;
    font-size: 3rem;
    position: absolute;
    right: 15px;
    top: 0px;
}

.container-input{
    height: 50px;
    margin: 5px;
    width: 250px;
}

.input-form-accueil{
    border-radius: 7px;
    height: 26px;
    width: 210px;
}

.input-form-submit {
    background-color: black; /* Couleur de fond */
    color: white; /* Couleur du texte */
    padding: 10px 20px; /* Espace à l'intérieur du bouton */
    font-size: 16px; /* Taille du texte */
    border: none; /* Supprimer la bordure par défaut */
    border-radius: 5px; /* Coins arrondis */
    cursor: pointer; /* Curseur au survol */
    transition: 0.3s ease; /* Animation de transition */
}

.input-form-submit:hover {
    transform: scale(1.05);
}

    #custom-form {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        background-color: var(--text);
        color: #000000;
        padding: 20px;
        border-radius: 10px;
        max-width: 80%;
        text-align: center;
        z-index: 2;
        /* Place le formulaire au-dessus de l'overlay */
        color: white;
    }

    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Opacité de fond */
        z-index: 1;
        /* Place l'overlay au-dessus du reste du contenu */
    }
</style>
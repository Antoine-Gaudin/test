<?php 
require('../include/header.php');
require('../include/nav.php'); 
?>

<div class="container">
    <div>
        <h2 class="title"> Plan</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2594.3440160428913!2d1.1762738155770915!3d49.440214679348784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e0d9628715f981%3A0x57aa04dd5ddac8bb!2sVintage%20Automobiles%201856!5e0!3m2!1sfr!2sfr!4v1673003514296!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="partie2"> 
<div class="partie-info">
    <h3 id="telephonne" class="contact">Demande d'information ? Prendre un RDV ? </h3>
        <a href="tel:06 50 45 70 15">
        Appel téléphonique
        </a>
</div>
<div class="partie-info">
    <h3 id="horaire">Horaires d'ouverture</h3>
    <table class="table">
    <tbody class ="border">
        <tr>
            <td class ="border">lundi </td>
            <td class ="border">10h-12h </td>
            <td class ="border">14h-19h </td>
        </tr>
        <tr>
            <td class ="border">mardi </td>
            <td class ="border">10h - 12h</td>
            <td class ="border">14h - 19h</td>
        </tr>
        <tr>
            <td class ="border">mercredi </td>
            <td class ="border">10h - 12h</td>
            <td class ="border">14h - 19h</td>
        </tr>
        <tr>
            <td class ="border">jeudi </td>
            <td class ="border">10h - 12h</td>
            <td class ="border">14h - 19h</td>
        </tr>
        <tr>
            <td class ="border">vendredi </td>
            <td class ="border">10h - 12h</td>
            <td class ="border">14h - 19h</td>
        </tr>
        <tr>
            <td class ="border">samedi </td>
            <td class ="border">9h30 - 13h</td>
            <td class ="border">14h - 19h</td>
        </tr>
    </tbody>
    </table>
</div>

    </div>
</div>

<style>
    .container{
        display: flex;        
        margin: 20px;
        justify-content: center;
    }

    .partie2{
        margin-top: 4%;
    }

    .partie-info{
        margin: 20px;
    }

.title{
    margin-left: 5%;
}
</style>


<?php require('../include/footer.php'); ?>
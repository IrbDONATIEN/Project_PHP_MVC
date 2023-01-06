<?php 
ob_start(); 
?>

<div class="row">
    <div class="col-6">
        <p>Nom : <?= $auteur->getNom(); ?></p>
    </br> </br>
    <!-- <table class="table text-center">
        <tr class="table-dark">
            <th>Image</th>
            <th>Titre</th>
            <th>Nombre de pages</th>
        </tr>
        <!?php 
        //for($i=0; $i < count($livres);$i++) : 
        ?>
        <tr>
            <td class="align-middle"><img src="public/images/<!?= $livres[$i]->getImage(); ?>" width="60px;"></td>
            <td class="align-middle"><!?= $livres[$i]->getTitre(); ?></td>
            <td class="align-middle"><!?= $livres[$i]->getNbPages(); ?></td>
        </tr>
        <!-?php endfor; ?> -->
    </table>
    </div>
    <div class="col-6">
        <p>Prénom : <?= $auteur->getPrenom(); ?></p>
        <p>Sexe: <?= $auteur->getSexe(); ?></p>
        <p>Age: <?= $auteur->getAge(); ?></p>
        <p>Sexe: <?= $auteur->getSpecialite(); ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $auteur->getNom();
require "template.php";
?>
<?php 
ob_start(); 
?>

<form method="POST" action="<?= URL ?>auteurs/mv">
    <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $auteur->getNom() ?>">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom : </label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $auteur->getPrenom() ?>">
    </div>
    <div class="form-group">
        <label for="sexe">Sexe : </label>
        <input type="text" class="form-control" id="sexe" name="sexe" value="<?= $auteur->getSexe() ?>">
    </div>
    <div class="form-group">
        <label for="age">Age : </label>
        <input type="number" class="form-control" id="age" name="age" value="<?= $auteur->getAge() ?>">
    </div>
    <div class="form-group">
        <label for="specialite">Spécialité : </label>
        <input type="text" class="form-control" id="specialite" name="specialite" value="<?= $auteur->getSpecialite() ?>">
    </div>
    <input type="hidden" name="identifiant" value="<?= $auteur->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Modification de l'auteur : ".$auteur->getId();
require "template.php";
?>
<?php 
ob_start(); 
?>
<form method="POST" action="<?= URL ?>auteurs/av">
    <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom : </label>
        <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
    <div class="form-group">
        <label for="sexe">Sexe : </label>
        <input type="text" class="form-control" id="sexe" name="sexe">
    </div>
    <div class="form-group">
        <label for="age">Age : </label>
        <input type="number" class="form-control" id="age" name="age">
    </div>
    <div class="form-group">
        <label for="specialite">Spécialité : </label>
        <input type="text" class="form-control" id="specialite" name="specialite">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
<?php
$content = ob_get_clean();
$titre = "Ajout d'un auteur";
require "template.php";
?>
<?php 
ob_start(); 

if(!empty($_SESSION['alert'])) :
?>
    <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
        <?= $_SESSION['alert']['msg'] ?>
    </div>
    <?php 
    unset($_SESSION['alert']);
    endif; 
?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Nom</th>
        <th>Prénom</th>
        <th>Sexe</th>
        <th>Age</th>
        <th>Spécialité</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php 
    for($i=0; $i < count($auteurs);$i++) : 
    ?>
    <tr>
        <td class="align-middle"><a href="<?= URL ?>auteurs/l/<?= $auteurs[$i]->getId(); ?>"><?= $auteurs[$i]->getNom(); ?></a></td>
        <td class="align-middle"><?= $auteurs[$i]->getPrenom(); ?></td>
        <td class="align-middle"><?= $auteurs[$i]->getSexe(); ?></td>
        <td class="align-middle"><?= $auteurs[$i]->getAge(); ?></td>
        <td class="align-middle"><?= $auteurs[$i]->getSpecialite(); ?></td>
        <td class="align-middle"><a href="<?= URL ?>auteurs/m/<?= $auteurs[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle">
            <form method="POST" action="<?= URL ?>auteurs/s/<?= $auteurs[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer l'auteur ?');">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endfor; ?>
</table>
<a href="<?= URL ?>auteurs/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "Les auteurs des livres";
require "template.php";
?>
<h1 class="text-center my-4">La taverne des Combattants</h1>

<h3 class="text-center my-4">Bienvenue <?= $_SESSION["name"] ?></h3>

<p>Tu es niveau : <?= $_SESSION["role"] ?></p>

<br>
<p>Tu peux :</p>
<?php if ($_SESSION['role'] === 'user') : ?>
    <p>Voir tout les personnages</p>
<?php endif ?>
<?php if ($_SESSION['role'] === 'creator') : ?>
    <p>• Voir tout les personnages</p>
    <p>• Créer ton nouveau personnages</p>
    <p>• Modifier ou supprimer tes personnages</p>
<?php endif ?>
<?php if ($_SESSION['role'] === 'admin') : ?>
    <p>• Voir tout les personnages</p>
    <p>• Créer des personnages</p>
    <p>• Supprimer ou modifier toutes les créations</p>
<?php endif ?>



<a href="<?= ROOT ?>compte/deleteAccount"><button class="btn btn-danger">Supprimer mon compte</button></a>

<br><br>
<?php if(utilities::isAdmin()): ?>
    <a href="<?= ROOT ?>api/apiPage"><button class="btn btn-info">Les APIs</button></a>
<?php endif ?>
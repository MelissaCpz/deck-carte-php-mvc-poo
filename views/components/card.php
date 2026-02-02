<div class="card 
    <?= $character['side_name'] ?>Shadow"
    style="width: 18rem;">
    <img src="<?= ROOT ?>public/images/personnages/<?= $character['image'] ?>" class="card-img-top" alt="<?= $character['name'] ?>">
    <div class="card-body">
        <p class="small text-secondary">Par : <?= $character['author'] ?></p>
        <h5 class="card-title"><?= $character['name'] ?></h5>
        <p class="card-text d-flex justify-content-between">
            <span><b>Santé : </b></span>
            <span><?= $character['health'] ?> PV</span>
        </p>
        <p class="card-text d-flex justify-content-between">
            <span><b>Magie : </b></span>
            <span><?= $character['magic'] ?> PM</span>
        </p>
        <p class="card-text d-flex justify-content-between">
            <span><b>Puissance : </b></span>
            <span><?= $character['power'] ?> Atk</span>
        </p>
        <div class="d-flex justify-content-between">
            <?php if ((utilities::isCreator() && 
                $character['author'] == $_SESSION['name']) || (utilities::isAdmin()))
             : ?>
                <form action="<?= ROOT ?>personnages/modifyCharacter" method="POST">
                    <input type="hidden" name="id" value="<?= $character['id'] ?>">
                    <button class="btn btn-primary">Modifier</button>
                </form>
                <form action="<?= ROOT ?>personnages/deleteCharacter" method="POST">
                    <input type="hidden" name="id" value="<?= $character['id'] ?>">
                    <button class="btn btn-danger">Supprimer</button>
                </form>
            <?php endif ?>
        </div>
    </div>
</div>
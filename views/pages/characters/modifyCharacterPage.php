<h1 class="text-center my-4">La taverne des Combattants</h1>

<h3 class="text-center my-4"> Modifions <?= $character['name'] ?></h3>


<form action="<?= ROOT ?>personnages/updateCharacter" method="POST">
    <input type="hidden" name="id" value="<?= $character['id'] ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Nom du personnage</label>
        <input type="text" class="form-control" id="name" value="<?= $character['name'] ?>" name="name" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Avatar du personnage</label>
        <input type="text" class="form-control" id="image" value="<?= $character['image'] ?>" name="image" required>
    </div>
    <div class="mb-3">
        <label for="health" class="form-label">Santé du personnage</label>
        <input type="number" class="form-control" id="health" value="<?= $character['health'] ?>" name="health" required>
    </div>
    <div class="mb-3">
        <label for="magic" class="form-label">Magie du personnage</label>
        <input type="number" class="form-control" id="magic" value="<?= $character['magic'] ?>" name="magic" required>
    </div>
    <div class="mb-3">
        <label for="power" class="form-label">Puissance du personnage</label>
        <input type="number" class="form-control" id="power" value="<?= $character['power'] ?>" name="power" required>
    </div>
    <div class="mb-3">
        <label for="side" class="form-label">Quel coté de la force ?</label>
        <select name="side" id="side" type="text" class="form-select" required>
            
            <?php foreach($sides as $side) : ?>
                <option value="<?= $side['id'] ?>"
                <?= $side['id'] === $character['sides_id'] ? "selected" : ""  ?>
                ><?= $side['side'] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn btn-primary mt-3 w-100">Modifier le personnage</button>
    </div>
</form>



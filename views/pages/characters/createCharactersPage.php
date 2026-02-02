<h1 class="text-center my-4">La taverne des Combattants</h1>

<h3 class="text-center my-4"> Création d'un nouveau Combattant</h3>


<form action="createCharacter" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Nom du personnage</label>
        <input type="text" class="form-control" id="name" placeholder="Entrez le nom du personnage" name="name" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Avatar du personnage</label>
        <input type="text" class="form-control" id="image" placeholder="Entrez l'avatar du personnage" name="image" required>
    </div>
    <div class="mb-3">
        <label for="health" class="form-label">Santé du personnage</label>
        <input type="number" class="form-control" id="health" placeholder="Entrez les points de vie du personnage" name="health" required>
    </div>
    <div class="mb-3">
        <label for="magic" class="form-label">Magie du personnage</label>
        <input type="number" class="form-control" id="magic" placeholder="Entrez les points de magie du personnage" name="magic" required>
    </div>
    <div class="mb-3">
        <label for="power" class="form-label">Puissance du personnage</label>
        <input type="number" class="form-control" id="power" placeholder="Entrez la puissance du personnage" name="power" required>
    </div>
    <div class="mb-3">
        <label for="side" class="form-label">Quel coté de la force ?</label>
        <select name="side" id="side" type="text" class="form-select" required>
            <option disabled selected value="">Choisissez le coté du personnage ⏬</option>
            <?php foreach ($sides as $side) : ?>
                <option value="<?= $side['id'] ?>"><?= $side['side'] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn btn-primary mt-3 w-100">Créer le personnage</button>
    </div>
</form>
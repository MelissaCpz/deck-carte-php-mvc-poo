<h1 class="text-center my-4">La taverne des Combattants</h1>

<h3 class="text-center my-4">Inscrivez-vous</h3>


<form action="<?= ROOT ?>compte/register" method="POST">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-6">
            <div>
                <label for="name" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="name" placeholder="Nom d'utilisateur" name="name" required>
            </div>
             <div>
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required>
            </div>
            <button class="btn btn-success my-3 w-100" type="submit">Je crée mon compte</button>
            <a href="<?= ROOT ?>compte/connexion" class="btn btn-info w-100 my-3">J'ai déjà un compte</a>
        </div>
    </div>
</form>
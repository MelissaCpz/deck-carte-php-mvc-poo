    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-black shadowCustom mb-5">
        <div class="container-fluid container">
            <a class="navbar-brand" href="<?= ROOT ?>">Deck de Combattants</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>personnages/liste">Liste des Combattants</a>
                    <?php if(utilities::isCreator()): ?>
                    </li>
                       <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>personnages/nouveau">Créer un Combattant</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
            <?php if(empty($_SESSION)): ?>
                <div>
                <a href="<?= ROOT ?>compte/connexion" class="btn btn-light">Connexion</a>
                </div>
            <?php else: ?>
                <div>
                <a href="<?= ROOT ?>compte/profil" class="btn btn-light"><?= $_SESSION["name"] ?></a>
                </div>
                <div>
                <a href="<?= ROOT ?>compte/deconnexion" class="btn btn-light">Deconnexion</a>
                </div>
            <?php endif ?>
        </div>
    </nav>
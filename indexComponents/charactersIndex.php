<?php

// switch case venant de index.php. index.php étant un fichier conséquent, on le découpe en plusieurs parties.
// Cela concernant toutes les manips des personnages, on l'a appelé charactersIndex.php. character = personnages; index = pour index.php.


switch ($url[0]) {
    case "accueil":
        $mainController->homePage();
        break;

    case "personnages":
        switch ($url[1]) {
            case "liste":
                $charactersController->charactersList();
                break;

            case "nouveau":
                $charactersController->createCharacter();
                break;

            case "createCharacter":
                // utilities::showArray($_POST);
                $name = htmlentities($_POST['name']);
                $image = htmlentities($_POST['image']);
                $health = htmlentities($_POST['health']);
                $magic = htmlentities($_POST['magic']);
                $power = htmlentities($_POST['power']);
                $side = isset($_POST['side']) ? htmlentities($_POST['side']) : null;

                if (
                    empty($name) ||
                    empty($side) ||
                    empty($image) ||
                    empty($health) ||
                    empty($magic) ||
                    empty($power)
                ) {
                    $mainController->errorPage("Tous les champs sont obligatoires !");
                    return;
                }
                $charactersController->createNewCharacter($name, $image, $health, $magic, $power, $side);
                break;

            case "deleteCharacter":
                $id = htmlentities($_POST['id']);
                $charactersController->deleteCharacter($id);
                break;

            case "modifyCharacter":
                $id = htmlentities($_POST['id']);
                $charactersController->modifyCharacter($id);
                break;

            case "updateCharacter":
                $id = htmlentities($_POST['id']);
                $name = htmlentities($_POST['name']);
                $image = htmlentities($_POST['image']);
                $health = htmlentities($_POST['health']);
                $magic = htmlentities($_POST['magic']);
                $power = htmlentities($_POST['power']);
                $side = isset($_POST['side']) ? htmlentities($_POST['side']) : null;

                if (
                    empty($name) ||
                    empty($side) ||
                    empty($image) ||
                    empty($health) ||
                    empty($magic) ||
                    empty($power)
                ) {
                    $mainController->errorPage("Tous les champs sont obligatoires !");
                    return;
                }
                $charactersController->updateCharacter($id, $name, $image, $health, $magic, $power, $side); 
                break;
        }
    default:
        throw new Exception("La page demandée n'existe pas.");
}

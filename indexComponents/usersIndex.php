<?php

if(empty ($url[1])) {
    $url[1] = "connexion";
    
}
switch ($url[1]) {

    case "enregistrement":
        $usersController->registerPage();
        break;

    case "register":
        $name = htmlentities($_POST['name']);
        $password = htmlentities($_POST['password']);
        if(empty($name) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires !");
        }
        $usersController->createAccount($name, $password);
        break;

    case "connexion":
        $usersController->loginPage();
        break;

    case "login":
        $name = htmlentities($_POST['name']);
        $password = htmlentities($_POST['password']);
        if(empty($name) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires !");
        }
        $usersController->login($name, $password);
        break;

    case "profil":
        $usersController->profilPage();
        break;

    case "deconnexion":
        $usersController->logout();
        break;

    case "deleteAccount":
        $usersController->deleteAccount();
        break;

        default:
        throw new Exception("La page demandée n'existe pas.");
}

?>
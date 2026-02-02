<?php

session_name("php_mvc_poo");
session_start();

define("ROOT", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]));

require_once("controllers/MainController.php");
$mainController = new MainController();
require_once("controllers/CharactersController.php");
$charactersController = new CharactersController();
require_once("controllers/users/UsersController.php");
$usersController = new UsersController();
require_once("controllers/admin/ApisController.php");
$apisController = new ApisController();

try {
    if (empty($_GET['page'])) {
        $url[0] = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    }

    switch ($url[0]) {
        case "accueil":
            $mainController->homePage();
            break;

        case "personnages":
            require_once("indexComponents/charactersIndex.php");
            break;

        case "compte":
            require_once("indexComponents/usersIndex.php");
            break;

        case "api":
            require_once("indexComponents/apisIndex.php");
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    $mainController->errorPage($e->getMessage());
}

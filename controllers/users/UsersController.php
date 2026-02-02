<?php

require_once("controllers/MainController.php");

class UsersController extends MainController
{
    public function registerPage(){

        if (!utilities::isConnected()) {
        $datas_page = [
            "description" => "Bienvenue sur la page d'enregistrement",
            "title" => "Enregistrement",
            "view" => "views/pages/users/registerPage.php",
            "layout" => "views/commons/layout.php",
        ];

        utilities::renderPage($datas_page);
    } else {
            header("location: " . ROOT . "personnages/liste");
        }
    }

    public function createAccount($name, $password)
    {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (!$this->usersModel->getUserByName($name)) {

            if ($this->usersModel->createAccount($name, $hashedPassword)) {
                header("location: " . ROOT . "compte/connexion");
            } else {
                header("location: " . ROOT . "compte/enregistrement");
            }
        } else {
            throw new Exception("Ce nom d'utilisateur est deja pris.");
        }
    }

    public function loginPage()
    {

        if (!utilities::isConnected()) {

            $datas_page = [
                "description" => "Bienvenue sur la page de connexion",
                "title" => "Connexion",
                "view" => "views/pages/users/loginPage.php",
                "layout" => "views/commons/layout.php",
            ];

            utilities::renderPage($datas_page);
        } else {
            header("location: " . ROOT . "personnages/liste");
        }
    }

    public function login($name, $password)
    {

        $datasUser = $this->usersModel->getUserByName($name);

        if ($this->usersModel->isAccountValid($name, $password)) {
            $_SESSION["name"] = $datasUser["name"];
            $_SESSION["role"] = $datasUser["role"];
            header("Location: " . ROOT);
        } else {
            header("Location: " . ROOT . "compte/connexion");
        }
    }

    public function profilPage()
    {

        if(utilities::isConnected()){
        $datas_page = [
            "description" => "Bienvenue sur votre profil",
            "title" => "Profil de " . $_SESSION["name"],
            "view" => "views/pages/users/profilPage.php",
            "layout" => "views/commons/layout.php",
        ];

        utilities::renderPage($datas_page);
    } else {
            header("location: " . ROOT . "compte/connexion");
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: " . ROOT);
    }

    public function deleteAccount() {
        $this->logout();
        if($this->usersModel->deleteAccount($_SESSION["name"])) {
            header("Location: " . ROOT);
        } else {
            throw new Exception("Impossible de supprimer le compte");
        }
    }
}

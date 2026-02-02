<?php

require_once("controllers/MainController.php");

class ApisController extends MainController
{
    private function sendJson_get($data)
    {
        // tous les sites y ton accés
        header('Access-Control-Allow-Origin: *');
        // On autorise seulement GET et non POST, PUT, DELETE, head et options
        header('Access-Control-Allow-Methods: GET');
        // On envoie du JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }


    public function charactersApi()
    {
        $allCharacters = $this->charactersModel->getAllCharacters();
        $this->sendJson_get($allCharacters);
    }

    public function classesApi()
    {
        $allClasses = $this->sidesModel->getAllsides();
        $this->sendJson_get($allClasses);
    }

    public function usersApi()
    {
        $allUsers = $this->usersModel->getAllUsers();
        $this->sendJson_get($allUsers);
    }

    public function globalApi()
    {
        $allUsers = $this->usersModel->getAllUsers();
        $allsides = $this->sidesModel->getAllsides();
        $allCharacters = $this->charactersModel->getAllCharacters();
        $allDatas = [
            "characters" => $allCharacters,
            "sides" => $allsides,
            "users" => $allUsers
        ];
        $this->sendJson_get($allDatas);
    }

    public function apisPage()
    {
        if (utilities::isAdmin()) {
            $datas_page = [
                "description" => "les apis du site",
                "title" => "Nos API",
                "view" => "views/pages/admin/apiPage.php",
                "layout" => "views/commons/layout.php",
            ];
            utilities::renderPage($datas_page);
        } else {
            header("location: " . ROOT);
        }
    }
}

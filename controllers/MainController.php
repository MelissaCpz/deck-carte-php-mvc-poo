<?php

require_once("controllers/utilities.php");
require_once("models/charactersModel.php");
require_once("models/sidesModel.php");
require_once("models/users/usersModel.php");



class MainController
{
    //     public function homePage() {
    //         require_once ("views/pages/homePage.php");
    //     }
    // }

    //       public function homePage() {
    //         ob_start();
    //         require_once ("views/pages/homePage.php");
    //         $title = "Page d'accueil";
    //         $description = "Bienvenue sur mon site en PHP / MVC / POO";
    //         $content = ob_get_clean();
    //         require_once ("views/commons/layout.php");
    //     }
    // }

    public $charactersModel;
    public $sidesModel;
    public $usersModel;

    public function __construct() {
        $this->charactersModel = new charactersModel();
        $this->sidesModel = new sidesModel();
        $this->usersModel = new usersModel();
    }

    public function homePage()
    {

        $name = "Kikisan";
        // $characters = $this->charactersModel->getAllCharacters();

        // $datas_page = [
        //     "description" => "Bienvenue sur mon site en PHP / MVC / POO",
        //     "title" => "Page d'accueil",
        //     "view" => "views/pages/homePage.php",
        //     "layout" => "views/commons/layout.php",
        //     "name" => $name,
        //     "characters" => $characters,
        // ];

        $character = $this->charactersModel->getLastCharacter();

        $datas_page = [
            "description" => "Bienvenue sur mon site en PHP / MVC / POO",
            "title" => "Page d'accueil",
            "view" => "views/pages/homePage.php",
            "layout" => "views/commons/layout.php",
            "name" => $name,
            "character" => $character,
        ];

        utilities::renderPage($datas_page);

    }


    public function errorPage($message) {

        $datas_page = [
            "description" => "On est perdu ?",
            "title" => "Erreur",
            "view" => "views/pages/errorPage.php",
            "layout" => "views/commons/layout.php",
            "message" => $message,
        ];

        utilities::renderPage($datas_page);
    }

}

<?php

class CharactersController extends MainController {
    public function charactersList() {
        
        $characters = $this->charactersModel->getAllCharacters();

        $datas_page = [
            "description" => "Bienvenue dans la taverne, voici mes combattants",
            "title" => "Tous les combattants",
            "view" => "views/pages/characters/allCharactersPage.php",
            "layout" => "views/commons/layout.php",
            "characters" => $characters,
        ];

        utilities::renderPage($datas_page);
    }


        public function createCharacter() {
        
        if(utilities::isCreator()) {
        $sides = $this->sidesModel->getAllSides();

        $datas_page = [
            "description" => "Bienvenue dans le formulaire de création d'un personnage",
            "title" => "Création d'un personnage",
            "view" => "views/pages/characters/createCharactersPage.php",
            "layout" => "views/commons/layout.php",
            "sides" => $sides,
        ];

        utilities::renderPage($datas_page);
        } else {
            header("Location: " . ROOT . "personnages/liste");
        }
    }


    public function createNewCharacter($name, $image, $health, $magic, $power, $side) {
        if($this->charactersModel->createNewCharacter($name, $image, $health, $magic, $power, $side)) {
            header("Location: " . ROOT);
        } else {
            throw new Exception("Impossible de créer le personnage");
        }
    }


    public function deleteCharacter($id) {
        if($this->charactersModel->deleteCharacter($id)) {
            header("Location: " . ROOT . "personnages/liste");
        } else {
            throw new Exception("Impossible de supprimer le personnage");
        }
    }


    public function modifyCharacter($id) {

        $character = $this->charactersModel->getOneCharacter($id);
        $sides = $this->sidesModel->getAllSides();

        $datas_page = [
            "description" => "Bienvenue dans le formulaire de modification d'un personnage",
            "title" => "Modifions " . $character['name'],
            "view" => "views/pages/characters/modifyCharacterPage.php",
            "layout" => "views/commons/layout.php",
            "character" => $character,
            "sides" => $sides
        ];

        utilities::renderPage($datas_page);
        
    }


    public function updateCharacter($id, $name, $image, $health, $magic, $power, $side) {
        if($this->charactersModel->updateCharacter($id, $name, $image, $health, $magic, $power, $side)) {
            header("Location: " . ROOT . "personnages/liste");
        } else {
            throw new Exception("Impossible de modifier le personnage");
        }
    }
    
}
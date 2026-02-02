<?php

    require_once("./models/pdoModel.php");

    class charactersModel extends pdoModel {
        // public function getAllCharacters() {
        //     $req = "SELECT * FROM characters";
        //     $stmt = $this->setDB()->prepare($req);
        //     $stmt->execute();
        //     $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     $stmt->closeCursor();
        //     return $datas;
        // }


    public function getAllCharacters() {
        $req = "SELECT characters.*, sides.side AS side_name 
                FROM characters 
                JOIN sides ON characters.sides_id = sides.id";
        $stmt = $this->setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function getLastCharacter() {
        $req = "SELECT characters.*, sides.side AS side_name 
                FROM characters 
                JOIN sides ON characters.sides_id = sides.id 
                ORDER BY characters.id DESC 
                LIMIT 1";
        $stmt = $this->setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function createNewCharacter($name, $image, $health, $magic, $power, $sides) {
        $req = "INSERT INTO characters (name, image, health, magic, power, sides_id, author) 
                VALUES (:name, :image, :health, :magic, :power, :sides, :author)";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":image", $image, PDO::PARAM_STR);
        $stmt->bindParam(":health", $health, PDO::PARAM_INT);
        $stmt->bindParam(":magic", $magic, PDO::PARAM_INT);
        $stmt->bindParam(":power", $power, PDO::PARAM_INT);
        $stmt->bindParam(":sides", $sides, PDO::PARAM_INT);
        $stmt->bindParam(":author", $_SESSION['name'], PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    }


    public function deleteCharacter($id) {
        $req = "DELETE FROM characters WHERE id = :id";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true;

    }


    public function getOneCharacter($id) {
        $req = "SELECT characters.*, sides.side AS side_name 
                FROM characters 
                JOIN sides ON characters.sides_id = sides.id 
                WHERE characters.id = :id";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }


    public function updateCharacter($id, $name, $image, $health, $magic, $power, $sides) {
        $req = "UPDATE characters SET name = :name, image = :image, health = :health, magic = :magic, power = :power, sides_id = :sides WHERE id = :id";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":image", $image, PDO::PARAM_STR);
        $stmt->bindParam(":health", $health, PDO::PARAM_INT);
        $stmt->bindParam(":magic", $magic, PDO::PARAM_INT);
        $stmt->bindParam(":power", $power, PDO::PARAM_INT);
        $stmt->bindParam(":sides", $sides, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    }

}



?>

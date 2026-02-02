<?php

require_once("./models/pdoModel.php");

    class sidesModel extends pdoModel {
        public function getAllSides() {
            $req = ("SELECT * FROM sides");
            $stmt = $this->setDB()->prepare($req);
            $stmt->execute();
            $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $datas;
        }
    }


?>
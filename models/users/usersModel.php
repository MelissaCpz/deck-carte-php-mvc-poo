<?php

require_once("./models/pdoModel.php");

    class usersModel extends pdoModel {
        public function createAccount($name, $password) {
            $req = "INSERT INTO users (name, role, password) VALUES (:name, 'user', :password)";
            $stmt = $this->setDB()->prepare($req);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
            return true;
        }


        public function getUserByName($name) {
            $req = "SELECT * FROM users WHERE name = :name";
            $stmt = $this->setDB()->prepare($req);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $row;
        }


        public function isAccountValid($name, $password) {
            $req = "SELECT password FROM users WHERE name = :name";
            $stmt = $this->setDB()->prepare($req);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->execute();
            $passwordDB = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return password_verify($password, $passwordDB['password']);
        }


        public function deleteAccount($name) {
            $req = "DELETE FROM users WHERE name = :name";
            $stmt = $this->setDB()->prepare($req);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
            return true;
        }


        public function getAllUsers() {
            $req = "SELECT * FROM users";
            $stmt = $this->setDB()->prepare($req);
            $stmt->execute();
            $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $datas;
        }
    }


?>
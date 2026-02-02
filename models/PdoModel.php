<?php

require_once __DIR__ . '/../config.php';
    abstract class pdoModel {
        public static $pdo;
        protected function setDB() {  // protected = accessible dans la classe elle-même et de celles qui héritent mais pas de l'extérieur.
            if(self::$pdo === null) {
                self::$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$pdo;
        }
    }

?>
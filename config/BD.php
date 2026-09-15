<?php
    class BD {
        public static function getConexao(){
            
            $conn = new PDO(
                "mysql:host=localhost;dbname=cafeteriabd",
                "root",
                "root"
            );

            return $conn;
        }
    }
?>
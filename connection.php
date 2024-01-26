<?php

class Database {
    public static $connection;

    public static function setupConnection() {
        if(!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "SuV@gmv0", "myEshop", "3306");
        }
    }

    public static function iud($q) {
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q) {
        Database::setupConnection();
        $resultSet = Database::$connection->query($q);
        return $resultSet;
    }
}

?>
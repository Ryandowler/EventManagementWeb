<?php

class Connection {
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL){
            $host = 'localhost';
            $database = 'n00134315';
            $username = 'root';
            $password = '';
            $dsn = 'mysql:dbname=' .$database.";host=".$host;
            
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!connection::$connection){
                die("Could not connect to the database!");
            }
        }
        return Connection::$connection;
    }
}
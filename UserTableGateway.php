<?php

class UserTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getUserByUsername($username) {
        // execute a query to see if username is in the database
        //$sqlQuery = "SELECT * FROM users WHERE username = :username";
        $sqlQuery = 'SELECT * FROM users WHERE username = "' . $username . '"';

        $statement = $this->connection->query($sqlQuery);
        $params = array(
            "username" => $username
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve users usertablegateway");
        }

        return $statement;
        echo 'this is statement' . $statement;
    }

    public function insertUser($username, $password, $fullname, $age, $emailaddress, $maidenName) {
        $sqlInsert = "INSERT INTO users (username, password, fullname, age, emailaddress, maidenName)"
                . " VALUES (:username, :password, :fullname, :age, :emailaddress, :maidenName)";


        $statement = $this->connection->prepare($sqlInsert);

        $params = array(
            "username" => $username,
            "password" => $password,
            "fullname" => $fullname,
            "age" => $age,
            "emailaddress" => $emailaddress,
            "maidenName" => $maidenName 
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert new user");
        }
    }

}

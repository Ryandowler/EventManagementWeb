<?php

class EventTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    public function getEvents() {
        // execute a query to get all programmers
        $sqlQuery = "SELECT * FROM event";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve users eventtablegateway1");
        }
        
        return $statement;
    }
    
    public function getEventById($eventID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM event WHERE eventID = :eventID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "eventID" => $eventID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve user eventtablegateway2");
        }
        
        return $statement;
    }
    
    
    
    
    
    //hhhhhhhhhhhhh
    public function deleteEvent($eventID) {
        $sqlQuery = "DELETE FROM event WHERE eventID = :eventID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "eventID" => $eventID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateEvent($eventID, $t, $d, $sd, $ed, $tm, $ma, $c, $mID) {
        $sqlQuery =
                "UPDATE event SET " .
                "title = :title, " .
                "description = :description, " .
                "startDate = :startDate, " .
                "endDate = :endDate, " ."time = :time, " ."maxAttendees = :maxAttendees, " ."cost = :cost, " ."managerID = :managerID " ."WHERE eventID = :eventID"; 
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "eventID" => $eventID,
            "title" => $t,
            "description" => $d,
            "startDate" => $sd,
            "endDate" => $ed,
            "time" => $tm,
            "maxAttendees" => $ma,
            "cost" => $c,
            "managerID" => $mID
            
        );
        
        $status = $statement->execute($params);
        return ($statement->rowCount() == 1);
    }

    public function insertEvent($t, $d, $sd, $ed, $tm, $ma, $c, $mID) {
        $sqlQuery = "INSERT INTO event " .
                "(title, description, startDate, endDate, time, maxAttendees, cost, managerID) " .
                "VALUES (:title, :description, :startDate, :endDate, :time, :maxAttendees, :cost, :managerID)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "title" => $t,
            "description" => $d,
            "startDate" => $sd,
            "endDate" => $ed,
            "time" => $tm,
            "maxAttendees" => $ma,
            "cost" => $c,
            "managerID" => $mID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert Eventttt");
        }
        
        $id = $this->connection->lastInsertId();
        // need to add in event id 
        return $id;
    }
}


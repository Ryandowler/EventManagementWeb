<?php

require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

//$id = $_POST['id'];
//$title = $_POST['title'];
$eventID = filter_input(INPUT_POST, 'eventID', FILTER_SANITIZE_STRING);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$startDate = filter_input(INPUT_POST, 'startDate', FILTER_SANITIZE_STRING);
$endDate = filter_input(INPUT_POST, 'endDate', FILTER_SANITIZE_STRING);
$time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING);
$maxAttendees = filter_input(INPUT_POST, 'maxAttendees', FILTER_SANITIZE_STRING);
$cost = filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_STRING);
$managerID = filter_input(INPUT_POST, 'managerID', FILTER_SANITIZE_STRING);

$gateway->updateEvent($eventID, $title, $description, $startDate, $endDate, $time, $maxAttendees, $cost, $managerID);
header('Location: home.php');


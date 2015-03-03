<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';

/* creates session if theres not already a session*/
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

//validate form data
//removes data that is potentially harmful (filter part)
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$startDate = filter_input(INPUT_POST, 'startDate', FILTER_SANITIZE_STRING);
$endDate = filter_input(INPUT_POST, 'endDate', FILTER_SANITIZE_STRING);
$time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING);
$maxAttendees = filter_input(INPUT_POST, 'maxAttendees', FILTER_SANITIZE_STRING);
$cost = filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_STRING);
$managerID = filter_input(INPUT_POST, 'managerID', FILTER_SANITIZE_STRING);
//$organiserName1 = filter_input(INPUT_POST, 'organiserName1', FILTER_SANITIZE_STRING);
//$organiserEmail1 = filter_input(INPUT_POST, 'organiserEmail1', FILTER_SANITIZE_STRING);
//$organiserAddress1 = filter_input(INPUT_POST, 'organiserAddress1', FILTER_SANITIZE_STRING);
//$organiserMobileNumber1 = filter_input(INPUT_POST, 'organiserMobileNumber1', FILTER_SANITIZE_STRING);

//if statements to validate form, works with createEvent.php
$errorMessage = array();
if ($title === FALSE || $title === '') {
    $errorMessage['title1'] = 'Title must not be blank<br/>';
}
else if ($title === TRUE || $title != '') {
    $errorMessage['title1'] = 'Title ISNT blank<br/>';
}

if ($description === FALSE || $description === '') {
    $errorMessage['description'] = 'description must not be blank<br/>';
}

if ($startDate === FALSE || $startDate === '') {
    $errorMessage['startDate'] = 'startDate must not be blank<br/>';
}

if ($endDate === FALSE || $endDate === '') {
    $errorMessage['endDate'] = 'endDate1 must not be blank<br/>';
}

if ($time === FALSE || $time === '') {
    $errorMessage['time'] = 'time must not be blank<br/>';
}

if ($maxAttendees === FALSE || $maxAttendees === '') {
    $errorMessage['maxAttendees'] = 'maxAttendee1 must not be blank<br/>';
}

if ($cost === FALSE || $cost === '') {
    $errorMessage['cost'] = 'cost must not be blank<br/>';
}
if ($managerID === FALSE || $managerID === '') {
    $errorMessage['managerID'] = 'manager id must not be blank<br/>';
}
$eventID = $gateway->insertEvent($title, $description, $startDate, $endDate, $time, $maxAttendees, $cost, $managerID);
$message = "event created woohooo";
header("Location: home.php");

//making sure $username is set and not null
/*
if (!isset($_SESSION['events'])) {
    die("Illegal Request");
} 
else {
    $events = $_SESSION['events'];
}
*/
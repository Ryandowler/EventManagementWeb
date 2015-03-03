<?php
 
echo '<pre>';
print_r($_POST);
echo '</pre>';
 
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
 
$events = $_POST['events'];
foreach ($events as $eventId){
echo '<pre>';
print_r($eventId);
echo '</pre>';
    $gateway->deleteevent($eventId);
}
 
 
    header("Location: home.php");
 
?>
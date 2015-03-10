<html>
    <head
    <?php
    require 'NavBar.php';
    require 'ensureUserLoggedIn.php';
    //I didnt use this as i went with the better option of drop down sign out like a real site
    // Calling in navigation bar, if i need to edit just edit NavBar.php
    require 'Styles.php';
    require 'Scripts.php';
    require_once 'Event.php';
    require_once 'Connection.php';
    require_once 'EventTableGateway.php';
    ?>

</head>
<body>

    <?php
    if (isset($message)) {
        echo '<p>' . $message . '</p>';
    }
    ?>

    <div>


        <?php
        $id = session_id();
        if ($id == "") {
            session_start();
        }

        require 'ensureUserLoggedIn.php';

        if (!isset($_GET) || !isset($_GET['id'])) {
            die('Invalid request');
        }
        $id = $_GET['id'];

        $connection = Connection::getInstance();
        $gateway = new EventTableGateway($connection);

        $statement = $gateway->getEventById($id);
        ?>

        <table id ="table" border="1">
            <tbody>
<?php
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo '<tr>';
echo '<th>Title</th>'
 . '<td>' . $row['title'] . '</td>';
echo '</tr>';
echo '</tr>';
echo '<th>Description</th>'
 . '<td>' . $row['description'] . '</td>';
echo '</tr>';
echo '<th>Start Date</th>'
 . '<td>' . $row['startDate'] . '</td>';
echo '</tr>';
echo '<th>End Date</th>'
 . '<td>' . $row['endDate'] . '</td>';
echo '</tr>';
echo '<th>Time</th>'
 . '<td>' . $row['time'] . '</td>';
echo '</tr>';
echo '<th>Max Attendees</th>'
 . '<td>' . $row['maxAttendees'] . '</td>';
echo '</tr>';
echo '<th>Cost</th>'
 . '<td>' . $row['cost'] . '</td>';
echo '</tr>';
echo '<th>Manager id</th>'
 . '<td>' . $row['managerID'] . '</td>';
echo '</tr>';
?>
            </tbody>
        </table>

        <p>
            <a href="editEventForm.php?id=<?php echo $row['eventID']; ?>" class="btn btn-md editEventBTN">
                Edit Event</a>
            <a class="btn btn-md btn-info" href="deleteEvent.php?id=<?php echo $row['eventID']; ?> " >Delete Event</a>
        </p>
    </div>

</body>
</html>

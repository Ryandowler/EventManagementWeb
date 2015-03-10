<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';
require 'ensureUserLoggedIn.php';
require 'Styles.php';
require 'Scripts.php';
require 'NavBar.php';
$id = session_id();
if ($id == "") {
    session_start();
}

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEventById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h1>Edit Event Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
    <div>
        <div>
            <div id="table">
                <form id="editEventForm" name="editEventForm" action="editEvent.php" method="POST">

                    <input type="hidden" name="eventID" value="<?php echo $id; ?>" />
                    <table border="0">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>
                                    <input type="text" name="title" value="<?php
                                    if (isset($_POST) && isset($_POST['title'])) {
                                        echo $_POST['title'];
                                    } else {
                                        echo $row['title'];
                                    }
                                    ?>" />
                                    <span id="titleError" class="error">
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['title'])) {
                                            echo $errorMessage['title'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <!--next table data-->
                                <td>Description</td>
                                <td>
                                    <input type="text" name="description" value="<?php
                                    if (isset($_POST) && isset($_POST['description'])) {
                                        echo $_POST['description'];
                                    } else {
                                        echo $row['description'];
                                    }
                                    ?>" />
                                    <!--giving the input box an id and error code id to call it later to check for errors etc-->
                                    <span id="descriptionError" class="error">
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['description'])) {
                                            echo $errorMessage['description'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr><!--next table data-->
                                <td>Start Date</td>
                                <td>
                                    <input type="text" name="startDate" value="<?php
                                    if (isset($_POST) && isset($_POST['startDate'])) {
                                        echo $_POST['startDate'];
                                    } else {
                                        echo $row['startDate'];
                                    }
                                    ?>" />
                                    <span id="startDateError" class="error">
                                        <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['startDate'])) {
                                            echo $errorMessage['startDate'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr><!--next table data-->
                                <td>End Date</td>
                                <td>
                                    <input type="text" name="endDate" value="<?php
                                    if (isset($_POST) && isset($_POST['endDate'])) {
                                        echo $_POST['endDate'];
                                    } else {
                                        echo $row['endDate'];
                                    }
                                    ?>" />
                                    <span id="endDateError" class="error">
                                        <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['endDate'])) {
                                            echo $errorMessage['endDate'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr><!--next table data-->
                                <td>Time</td>
                                <td>
                                    <input type="text" name="time" value="<?php
                                    if (isset($_POST) && isset($_POST['time'])) {
                                        echo $_POST['time'];
                                    } else {
                                        echo $row['time'];
                                    }
                                    ?>" />
                                    <span id="timeError" class="error">
                                        <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['time'])) {
                                            echo $errorMessage['time'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>Max Attendees</td>
                                <td>
                                    <input type="text" name="maxAttendees" value="<?php
                                    if (isset($_POST) && isset($_POST['maxAttendees'])) {
                                        echo $_POST['maxAttendees'];
                                    } else {
                                        echo $row['maxAttendees'];
                                    }
                                    ?>" />
                                    <span id="maxAttendeesError" class="error">
                                        <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['maxAttendees'])) {
                                            echo $errorMessage['maxAttendees'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr><!--next table data-->
                                <td>Cost</td>
                                <td>
                                    <input type="text" name="cost" value="<?php
                                    if (isset($_POST) && isset($_POST['cost'])) {
                                        echo $_POST['cost'];
                                    } else {
                                        echo $row['cost'];
                                    }
                                    ?>" />
                                    <span id="costError" class="error">
                                        <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['cost'])) {
                                            echo $errorMessage['cost'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr><!--next table data-->
                                <td>manager id</td>
                                <td>
                                    <input type="text" name="managerID" value="<?php
                                    if (isset($_POST) && isset($_POST['managerID'])) {
                                        echo $_POST['managerID'];
                                    } else {
                                        echo $row['managerID'];
                                    }
                                    ?>" />
                                    <span id="managerIDError" class="error">
                                        <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['managerID'])) {
                                            echo $errorMessage['managerID'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Update Event" name="updateEvent" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
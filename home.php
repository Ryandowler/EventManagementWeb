<html>
    <head>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!--importing jquery for navbar-->
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="js/script.js"></script>
        <script src="js/deleteEvent.js"></script>
        <script type="text/javascript" src="js/event.js"></script>
    </head>
    <body>
        <?php
        require 'ensureUserLoggedIn.php';
        //Calling in navigation bar, if i need to edit just edit NavBar.php
        require 'NavBar.php'
        ?>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        <div>
            <?php
            //requiring Event.php as some of its elements are needed in this page
            require_once 'Event.php';
            require_once 'Connection.php';
            require_once 'EventTableGateway.php';
            /* 'ensureUserLoggedIn.php';
              moved this up before require 'toolbar.php' as if the user was not signed in and visited
             * this page they still could view the page. the check should be done before requireing this
             */
            //require 'viewEvent.php';

            $connection = Connection::getInstance();
            $gateway = new EventTableGateway($connection);

            $statement = $gateway->getEvents();
            /* creating the session */
            $id = session_id();
            /* checking if there is not already a session and if there is start it */
            if ($id == "") {
                session_start();
            }
            //if events session is set add it to the array
            if (!isset($_SESSION['events'])) {
                $events = array();
                //hard coding variables into the array through parameters in another page

                $_SESSION['events'] = $events;
            } else {
                //making this session events
                $events = $_SESSION['events'];
            }
            ?>
            <!DOCTYPE html>
            <!-- error checking -->
            <?php
            if (isset($message)) {
                echo '<p>' . $message . '</p>';
            }
            ?>
            <div class="col-lg-12">
                <div class="otherTablesBox col-lg-2">
                    <h1>Other Tables</h1>
                    <div class="col-lg-1">
                        <table class="displayingOtherTables table-responsive table-condensed table-striped table-hover">

                            <tr>
                            <td><img src="img/notepad.png" /></td>
                                <td><a href = "#.php">Events</a></td>
                            </tr>
                            <tr>
                                <td><img src="img/manager.png" /></td>
                                <td><a href = "#.php">Managers</a></td>
                            </tr>
                            <tr>
                                <td><img src="img/organiser.png" /></td>
                                <td><a href = "#.php">Organisers</a></td>
                            </tr>
                            <tr>
                                <td><img src="img/asset.png" /></td>
                                <td><a href = "#.php">Assets</a></td>
                            </tr>
                            <tr>
                                <td><img src="img/location.png" /></td>
                                <td><a href = "#.php">Location</a></td>
                            </tr>
                            <tr>
                                <td><img src="img/attendee.png" /></td>
                                <td><a href = "#.php">Attendee</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <form ID="HomeForm" class="col-lg-7 col-lg-push-2" method="POST" action="deleteSelectedEvents.php">
                    <table class ="homeTable table-responsive table-condensed table-striped table-hover  " >
                        <?php
                        $username = $_SESSION['username'];
                        echo '<h4> Welcome, ' . $username . '</h4>';
                        ?>
                        <thead>
                            <tr id="bleh">
                                <th><input type="checkbox" onclick="checkAll(this)"><br></th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="thPush">Start Date</th>
                                <th class="thPush">End Date </th>
                                <th>Time</th>
                                <th>Max Attendees</th>
                                <th>Cost</th>
                                <th>Manager ID</th>
                                <th>Options</th>
                            </tr>

                        </thead>
                        <tbody> 
                        <script language="javascript">
                            function checkAll(master) {
                                var checked = master.checked;
                                var col = document.getElementsByTagName("INPUT");
                                for (var i = 0; i < col.length; i++) {
                                    col[i].checked = checked;
                                }
                            }
                        </script>
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {

                            echo '<td><input type="checkbox" value="' . $row['eventID'] . '" name="events[]" /></td>';
                            echo '<td>' . $row['eventID'] . '</td>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td >' . $row['startDate'] . '</td>';
                            echo '<td>' . $row['endDate'] . '</td>';
                            echo '<td>' . $row['time'] . '</td>';
                            echo '<td>' . $row['maxAttendees'] . '</td>';
                            echo '<td>' . $row['cost'] . '</td>';
                            echo '<td>' . $row['managerID'] . '</td>';

                            echo '<td class=" noHover ">'
                            //<a href="somepage.html"><button type="button">Text of Some Page</button></a>
                            . '<a href="viewEvent.php?id=' . $row['eventID'] . '"><button type="button" class="grid_2"  >View</button></a> '
                            . '<a href="editEventForm.php?id=' . $row['eventID'] . '"><button type="button" class="grid_2">Edit</button></a> '
                            . '<a class="deleteEvent" <a href="deleteEvent.php?id=' . $row['eventID'] . '"><button type="button" class="grid_2">Delete</button></a> '
                            . '<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>'
                            . '</td>';
                            echo '</tr>';
                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>

                        </tbody>
                    </table>  
                    <input type="submit" name="deleteSelected" value="Delete Selected" />

                </form>
            </div>
        </div> 



    </body>
</html>

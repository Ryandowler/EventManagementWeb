<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <meta charset="UTF-8">
        <title></title>
        <!-- linking in javascript form validation-->
        <script type="text/javascript" src="js/event.js"></script>
        <!--importing jquery for navbar-->
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="js/script.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <script src="js/respond.js"></script>
        <!-- linking in CSS for styling-->
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        
        //Calling in navigation bar, if i need to edit just edit NavBar.php
 require 'NavBar.php'

        ?>
        
     
        <div>
            
            <h1>Create Event Form</h1>
            <!--creating an function that will cancel the creation a event -->
            <!--<form action="home.php" 
                  method="POST"
                  onsubmit="return validateCreateEvent(this);">
            -->
            <!-- starting a form to structure the entry boxes to create an event-->
            <!--creating an function that will create a event -->
            <form id="createEventForm" action="createEvent.php" method="POST">

                <table border="0">
                    <tbody>
                        <!--making table rows to input data-->
                        <tr>
                            <!--table data-->
                            <td>Title</td>
                            <td>
                                <input type="text" name="title" value="" />
                                <!--giving the input box an id and errorcode id to call it later to check for errors etc-->

                            </td>
                        </tr>
                        <tr>
                            <!--next table data-->
                            <td>Description</td>
                            <td>
                                <input type="text" name="description" value="" />
                                <!--giving the input box an id and error code id to call it later to check for errors etc-->
                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>Start Date</td>
                            <td>
                                <input type="text" name="startDate" value="" />  
                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>End Date</td>
                            <td>
                                <input type="text" name="endDate" value="" />

                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>Time</td>
                            <td>
                                <input type="text" name="time" value="" />

                            </td>
                        </tr>
                        <tr>
                            <td>Max Attendees</td>
                            <td>
                                <input type="text" name="maxAttendees" value="" />

                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>Cost</td>
                            <td>
                                <input type="text" name="cost" value="" />

                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>Manager ID</td>
                            <td>
                                <input type="text" name="managerID" value="" />

                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><!--creating the submit button that will be working with creating the event -->
                                <input type="submit" value="Create Event" name="createEvent" />

                                <!--calling an function that will cancel a event -->
                                <input type="button" value="Cancel" name="cancel" onclick ="document.location.href = 'home.php'" />
                            </td>
                        </tr>
                    </tbody>
                </table>


























                <!--second Table to print out errors-->
                <table id="noStyle"border="0">
                    <tbody>
                        <!--making table rows to input data-->
                        <tr>
                            <!--table data-->
                            <td><span id="titleError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['title'])) {
                                        echo $errorMessage['title'];
                                    }
// else if (!!isset($errorMessage) && !isset($errorMessage['title'])) {
//     echo $errorMessage['title'];
// }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <!--next table data-->
                            <td>
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
                            <td><span id="startDateError" class="error">
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
                            <td><span id="endDateError" class="error">
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
                            <td><span id="timeError" class="error">
                                    <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['time'])) {
                                        echo $errorMessage['time'];
                                    }
                                    ?>
                                </span></td>

                        </tr>
                        <tr>
                            <td><span id="maxAttendeesError" class="error">
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
                            <td><span id="costError" class="error">
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
                            <td><span id="managerIDError" class="error">
                                    <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['managerID'])) {
                                        echo $errorMessage['managerID'];
                                    }
                                    ?>
                                </span>
                            </td>          
                        </tr>

                    </tbody>
                </table>
            </form>
































        </div>
    </form>
</body>
</html>

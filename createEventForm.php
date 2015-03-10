<!DOCTYPE html>
<html>
    <head>
        <?php
        require 'Styles.php';
        require 'Scripts.php';
        require 'NavBar.php';
        require 'ensureUserLoggedIn.php';
        ?>
        <title>Create Event</title>
    </head>
    <body id="createEventFormBG">

        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }

        //Calling in navigation bar, if i need to edit just edit NavBar.php
        //require 'NavBar.php'
        ?>


        <div>

            <h1 class="col-lg-offset-4">Create Your Event</h1>
            <!--creating an function that will cancel the creation a event -->
            <!--<form action="home.php" 
                  method="POST"
                  onsubmit="return validateCreateEvent(this);">
            -->
            <!-- starting a form to structure the entry boxes to create an event-->
            <!--creating an function that will create a event -->
            <form id="createEventForm" class="well col-lg-5 col-lg-offset-4" action="createEvent.php" method="POST">

                <table border="0">
                    <tbody>
                        <!--making table rows to input data-->
                        <tr>
                            <!--table data-->
                            <td>Title</td>
                            <td>
                                <input type="text" class="inputFieldPush form-control" name="title" value="<?php
                                if (isset($_POST) && isset($_POST['title'])) {
                                    echo $_POST['title'];
                                }
                                ?>" />
                                <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                <span id="titleError" class="error">
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
                            <td>Description</td>
                            <td>
                                <input type="text" class="inputFieldPush form-control" name="description" value="<?php
                                if (isset($_POST) && isset($_POST['description'])) {
                                    echo $_POST['description'];
                                }
                                ?>" />
                                <!--giving the input box an id and error code id to call it later to check for errors etc-->
                                <span id="descriptionError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['description'])) {
                                        echo $errorMessage['description'];
                                    }
// else if (!!isset($errorMessage) && !isset($errorMessage['title'])) {
//     echo $errorMessage['title'];
// }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>Start Date</td>
                            <td>
                                <input type="text" class="inputFieldPush form-control" name="startDate" value="<?php
                                if (isset($_POST) && isset($_POST['startDate'])) {
                                    echo $_POST['startDate'];
                                }
                                ?>" /> 
                                <span id="startDateError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['startDate'])) {
                                        echo $errorMessage['startDate'];
                                    }
// else if (!!isset($errorMessage) && !isset($errorMessage['title'])) {
//     echo $errorMessage['title'];
// }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>End Date</td>
                            <td>
                                <input type="text" class="inputFieldPush form-control" name="endDate" value="<?php
                                if (isset($_POST) && isset($_POST['endDate'])) {
                                    echo $_POST['endDate'];
                                }
                                ?>" />
                                <span id="endDateError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['endDate'])) {
                                        echo $errorMessage['endDate'];
                                    }
// else if (!!isset($errorMessage) && !isset($errorMessage['title'])) {
//     echo $errorMessage['title'];
// }
                                    ?>
                                </span>

                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>Time</td>
                            <td>
                                <input type="text" class=" inputFieldPush form-control" name="time" value="<?php
                                if (isset($_POST) && isset($_POST['time'])) {
                                    echo $_POST['time'];
                                }
                                ?>" />
                                <span id="timeError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['time'])) {
                                        echo $errorMessage['time'];
                                    }
// else if (!!isset($errorMessage) && !isset($errorMessage['title'])) {
//     echo $errorMessage['title'];
// }
                                    ?>
                                </span>

                            </td>
                        </tr>
                        <tr>
                            <td>  Max Attendees  </td>
                            <td>
                                <input type="text" class="inputFieldPush form-control" name="maxAttendees" value="<?php
                                if (isset($_POST) && isset($_POST['maxAttendees'])) {
                                    echo $_POST['maxAttendees'];
                                }
                                ?>" />
                                <span id="maxAttendeesError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['maxAttendees'])) {
                                        echo $errorMessage['maxAttendees'];
                                    }
// else if (!!isset($errorMessage) && !isset($errorMessage['title'])) {
//     echo $errorMessage['title'];
// }
                                    ?>
                                </span>


                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>Cost</td>
                            <td>
                                <input type="text" class="inputFieldPush form-control" name="cost" value="<?php
                                if (isset($_POST) && isset($_POST['cost'])) {
                                    echo $_POST['cost'];
                                }
                                ?>" />
                                <span id="costError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['cost'])) {
                                        echo $errorMessage['cost'];
                                    }
// else if (!!isset($errorMessage) && !isset($errorMessage['title'])) {
//     echo $errorMessage['title'];
// }
                                    ?>
                                </span>

                            </td>
                        </tr>
                        <tr><!--next table data-->
                            <td>Manager ID</td>
                            <td>
                                <input type="text" class="inputFieldPush form-control" name="managerID" value="" />

                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><!--creating the submit button that will be working with creating the event -->
                                <input type="submit" value="Create Event" class="btn btn-md createEventBTNs " name="createEvent" />

                                <!--calling an function that will cancel a event -->
                                <input type="button" value="Cancel" class="btn btn-md createEventBTNs" name="cancel" onclick ="document.location.href = 'home.php'" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--second Table to print out errors------------------------------------------------------------------------>

            </form>
































        </div>
    </form>

</body>
</html>

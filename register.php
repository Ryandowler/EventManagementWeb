<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/register.js"></script>
        <!--importing jquery for navbar-->
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="js/script.js"></script>
    </head>
    <body>
        
        <!-- Calling in navigation bar, if i need to edit just edit NavBar.php-->
        <?php
            //require 'NavBar.php'
            ?>
        <?php
        //I didnt use this as i went with the better option of drop down sign out like a real site
        //require 'toolbar.php' 
        ?>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        
        <div>
            <!-- showing HTML where the forms data is coming from, bassically linking it-->
            <form id="registerForm" action="checkRegister.php" method="POST" onsubmit="return validateRegistration(this);">
                <table>
                    <tbody>
                        <tr><!-- table data-->
                            <!--<td>Username</td>-->
                            <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                <input type="text" name="username" class="form-control" placeholder="Your Username" value="" />     
                                <span id="usernameError" class="error">
                                    <!--using internal PHP code to check everything its told to do in the other page
                                    (no blanks etc), and the id to link up to the correct one -->

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                <input type="password" class="form-control" placeholder="Pick a Password" name="password" value="" />   

                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                <input type="password" class="form-control" placeholder="Verify your Password" name="password2" value="" />

                            </td>
                        </tr>
                        <tr><!-- table data-->
                            <td>Full Name</td>
                            <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                <input type="text" class="form-control" placeholder="What's your name?" name="fullname" value="<?php
                                if (isset($_POST) && isset($_POST['fullname'])) {
                                    echo $_POST['fullname'];
                                }
                                ?>" />     

                            </td>
                        </tr>
                        <tr><!-- table data-->
                            <td>Age</td>
                            <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                <input type="text" class="form-control" name="age" placeholder="What age are you?" value="<?php
                                if (isset($_POST) && isset($_POST['age'])) {
                                    echo $_POST['age'];
                                }
                                ?>" />     

                            </td>
                        </tr>
                        <tr><!-- table data-->
                            <td>Email-Address</td>
                            <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                <input type="text" class="form-control" name="emailaddress" placeholder="Email-address" value="<?php
                                if (isset($_POST) && isset($_POST['emailaddress'])) {
                                    echo $_POST['emailaddress'];
                                }
                                ?>" />     

                            </td>
                        </tr>
                        <tr><!-- table data-->
                            <td>Mothers maiden name</td>
                            <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                <input type="text" class="form-control" name="maidenName" placeholder="Mothers mainden name?" value="<?php
                                if (isset($_POST) && isset($_POST['maidenName'])) {
                                    echo $_POST['maidenName'];
                                }
                                ?>" />     

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <!-- making a button of type submit -->
                                <input type="submit" value="Register" class="btn btn-sm col-lg-12" name="register" />
                                <!-- WHY DO I NEED THIS <input type="button" value="Cancel" name="cancel" onclick ="document.location.href = 'index.php'" /> -->
                            </td>
                        </tr>
                    </tbody>
                </table>




                <!-- second table for the errors-->

                <table id="noStyle">
                    <tbody>
                        <tr><!-- table data-->
                            <td><span id="usernameError" class="error">
                                    <!--using internal PHP code to check everything its told to do in the other page
                                    (no blanks etc), and the id to link up to the correct one -->
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['username'])) {
                                        echo $errorMessage['username'];
                                    }
                                    ?>
                                </span></td>

                        </tr>
                        <tr>
                            <td><span id="passwordError" class="error">
                                    <!--using internal PHP code to check everything its told to do in the other page
                                    (no blanks etc), and the id to link up to the correct one -->
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password'])) {
                                        echo $errorMessage['password'];
                                    }
                                    ?>
                                </span>
                            </td>

                        </tr>
                        <tr>
                            <td><span id="password2Error" class="error">
                                    <!--using internal PHP code to check everything its told to do in the other page
                                    (no blanks etc), and the id to link up to the correct one -->
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                        echo $errorMessage['password2'];
                                    }
                                    ?>
                                </span>
                            </td>

                        </tr>
                        <tr><!-- table data-->
                            <td><span id="fullnameError" class="error">
                                    <!--using internal PHP code to check everything its told to do in the other page
                                    (no blanks etc), and the id to link up to the correct one -->
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['fullname'])) {
                                        echo $errorMessage['fullname'];
                                    }
                                    ?>
                                </span>
                            </td>

                        </tr>
                        <tr><!-- table data-->
                            <td><span id="ageError" class="error">
                                    <!--using internal PHP code to check everything its told to do in the other page
                                    (no blanks etc), and the id to link up to the correct one -->
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['age'])) {
                                        echo $errorMessage['age'];
                                    }
                                    ?>
                                </span>
                            </td>

                        </tr>
                        <tr><!-- table data-->
                            <td><span id="emailaddressError" class="error">
                                    <!--using internal PHP code to check everything its told to do in the other page
                                    (no blanks etc), and the id to link up to the correct one -->
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['emailaddress'])) {
                                        echo $errorMessage['emailaddress'];
                                    }
                                    ?>
                                </span>
                            </td>

                        </tr>
                        <tr><!-- table data-->
                            <td><span id="maidenNameError" class="error">
                                    <!--using internal PHP code to check everything its told to do in the other page
                                    (no blanks etc), and the id to link up to the correct one -->
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['maidenName'])) {
                                        echo $errorMessage['maidenName'];
                                    }
                                    ?>
                                </span>
                            </td>

                        </tr>
                        <tr>
                            <td></td>

                        </tr>
                    </tbody>
                </table>

            </form> <!-- linking in the javascript -->
            <script type="text/javascript" src="js/register.js"></script>
        </div>   
    </body>
</html>

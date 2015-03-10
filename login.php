<!DOCTYPE html>
<!--making sure $username is set and not null-->
<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}
if (!isset($username)) {
    $username = '';
}


$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEvents();

//Calling in navigation bar, if i need to edit just edit NavBar.php
//require 'NavBar.php'
?>
<html>
    <head>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <script src="js/respond.js"></script>
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="js/script.js"></script>
        <meta charset="UTF-8">
        <title></title>
        <!--Login/register tabbed function-->
        <link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" class="cssdeck">

    </head>
    <body>
        <div class = "navbar navbar-inverse navbar-static-top myNav">
            <div class = "container">
                <a href = "Event_Management.php" class = "navbar-brand">
                    <span class="glyphicon glyphicon-home"></span> Eventer</a>
                <link rel="stylesheet" type="text/css" href="css/style.css">
                <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                    <!-- 3 LINES TO MAKE BURGER MENU-->
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                </button>
                <!-- LINKS-->
                <div class = "collapse navbar-collapse navHeaderCollapse">
                    <ul class = "nav navbar-nav navbar-right">
                        <li><a href = "#">Home</a></li>
                        <li><a href = "#">MyEvents</a></li>
                        <li><a href = "#">Contact</a></li>
                        <li><a href = "#">Profile</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        <div class="mainColour">
            <!--doing somw javascript (internal) to make user interctivity when they forget password-->
            <script>
                function myFunction() {
                    var user = prompt("please enter your username", "Example");
                    var user1 = prompt("please enter your email", "Example");
                    var security = prompt("what is your mothers maiden name?", "Example");

                    if (user !== null && user1 !== null) {
                        alert("An email has been sent to User " + (user) + " with your password.");
                    }
                }
            </script>
            <div class="container">

                <div class="" id="loginModal">
                    <div class="modal-header">
                        <h1>Sign In</h1>
                    </div>
                    <div>
                        <div class="loginBackground col-lg-5">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                                <li><a href="#create" data-toggle="tab" class="createAccount">Create Account</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane active in" id="login">
                                    <form action="checkLogin.php" method="POST">
                                        <table border="0">
                                            <tbody>
                                                <tr>
                                                   <!-- HIDING THIS ADD IN PLACEHOLDER <td>Username</td>-->
                                                    <td>
                                                        <input type="text" class="form-control"  name="username" placeholder="Your Username" value="<?php echo $username; ?>" />
                                                        <span id="usernameError" class="error">
                                                            <?php
                                                            if (isset($errorMessage) && isset($errorMessage['username'])) {
                                                                echo $errorMessage['username'];
                                                            }
                                                            ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <!-- HIDING THIS ADD IN PLACEHOLDER     <td>Password</td> -->
                                                    <td>
                                                        <input type="password" class="form-control password" placeholder="Your Password" name="password" value="" />
                                                        <span id="passwordError" class="error">
                                                            <?php
                                                            if (isset($errorMessage) && isset($errorMessage['password'])) {
                                                                echo $errorMessage['password'];
                                                            }
                                                            ?>
                                                        </span>
                                                    </td>
                                                </tr>

    <!-- HIDING THIS ADD IN PLACEHOLDER  <td></td> -->
                                            <td> 

                                                <input  type="submit" class="btn btn-lg col-lg-12"  value="Login" name="login" />
                                                <input  type="button" class="btn btn-sm col-lg-6" value="Forgot Password" name="forgot" onclick="myFunction()" />

                                            </td >

                                            </tbody>
                                        </table>
                                    </form>   
                                    <!--/END Sign in tab -->
                                </div>
                                <!------------ REGISTER SECTION---------------------->
                                <div class="tab-pane fade" id="create">
                                    <form  action="checkRegister.php" method="POST" onsubmit="return validateRegistration(this);">
                                        
                                        <table id="registerTable">
                                            <tbody>
                                                <tr><!-- table data-->
                                                   <!-- <td>Username</td>-->
                                                    <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                                        <input type="text" name="username" class="form-control" placeholder="Username" value="" />     
                                                        <span id="usernameError" class="error">
                                                            <!--using internal PHP code to check everything its told to do in the other page
                                                            (no blanks etc), and the id to link up to the correct one -->

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <!-- <td>Password</td>-->
                                                    <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                                        <input type="password" class="form-control" placeholder="Password" name="password" value="" />   

                                                    </td>
                                                </tr>
                                                <tr>
                                                   <!--<td>Confirm Password</td>-->
                                                    <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                                        <input type="password" class="form-control" placeholder="Verify Password" name="password2" value="" />

                                                    </td>
                                                </tr>
                                                <tr><!-- table data-->
                                                    <!--<td>Full Name</td>-->
                                                    <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                                        <input type="text" class="form-control" placeholder="Name" name="fullname" value="<?php
                                                        if (isset($_POST) && isset($_POST['fullname'])) {
                                                            echo $_POST['fullname'];
                                                        }
                                                        ?>" />     

                                                    </td>
                                                </tr>
                                                <tr><!-- table data-->
                                                  <!--  <td>Age</td>-->
                                                    <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                                        <input type="text" class="form-control" name="age" placeholder="Age" value="<?php
                                                        if (isset($_POST) && isset($_POST['age'])) {
                                                            echo $_POST['age'];
                                                        }
                                                        ?>" />     

                                                    </td>
                                                </tr>
                                                <tr><!-- table data-->
                                                   <!-- <td>Email-Address</td>-->
                                                    <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                                        <input type="text" class="form-control" name="emailaddress" placeholder="Email-address" value="<?php
                                                        if (isset($_POST) && isset($_POST['emailaddress'])) {
                                                            echo $_POST['emailaddress'];
                                                        }
                                                        ?>" />     

                                                    </td>
                                                </tr>
                                                <tr><!-- table data-->
                                                   <!-- <td>Mothers maiden name</td>-->
                                                    <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                                        <input type="text" class="form-control" name="maidenName" placeholder="Mothers mainden name" value="<?php
                                                        if (isset($_POST) && isset($_POST['maidenName'])) {
                                                            echo $_POST['maidenName'];
                                                        }
                                                        ?>" />     

                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td> <!-- making a button of type submit -->
                                                        <input type="submit" value="Register" class="btn btn-sm col-lg-12" name="register" />
                                                        <!-- WHY DO I NEED THIS <input type="button" value="Cancel" name="cancel" onclick ="document.location.href = 'index.php'" /> -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                
            </div>

            <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>    

















    </body>
</div>
</html>

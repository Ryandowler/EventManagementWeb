<!DOCTYPE html>
<!--making sure $username is set and not null-->
<!--PAGE NOT USEDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD-->
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
require 'NavBar.php'
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3>Have an Account?</h3>
                    </div>
                    <div>
                        <div class="well">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                                <li><a href="#create" data-toggle="tab" class="testr">Create Account</a></li>
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
                                        <input type="password" class="form-control password" name="password" value="" />
                                        <span id="passwordError" class="error">
                                            <?php
                                            if (isset($errorMessage) && isset($errorMessage['password'])) {
                                                echo $errorMessage['password'];
                                            }
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- HIDING THIS ADD IN PLACEHOLDER  <td></td> -->
                                    <td>
                                        <input  type="submit" class="btn btn-sm col-lg-12" value="Login" name="login" />
                                        <input  type="button" class="btn btn-sm col-lg-12" value="Forgot Password" name="forgot" onclick="myFunction()" />
                                    </td >
                                </tr>
                            </tbody>
                        </table>
                    </form>   
                                    <!--END Sign in tab -->
                                </div>
                                <div class="tab-pane fade" id="create">
                                    <form id="tab">
                                        <label>Username</label>
                                        <input type="text" value="" class="input-xlarge">
                                        <label>First Name</label>
                                        <input type="text" value="" class="input-xlarge">
                                        <label>Last Name</label>
                                        <input type="text" value="" class="input-xlarge">
                                        <label>Email</label>
                                        <input type="text" value="" class="input-xlarge">
                                        <label>Address</label>
                                        <textarea value="Smith" rows="3" class="input-xlarge">
                                        </textarea>

                                        <div>
                                            <button class="btn btn-primary">Create Account</button>
                                        </div>
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

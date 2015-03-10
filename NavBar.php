<!-- NAVBAR-->
<html>
    <?php
    
    //require 'ensureUserLoggedIn.php';
    //I didnt use this as i went with the better option of drop down sign out like a real site
    //require 'toolbar.php' 
    ?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/respond.js"></script>
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
            <!-- Fixed burger menu on screen-->
         
            
            <!-- LINKS-->
            <div class = "collapse navbar-collapse navHeaderCollapse">
                <ul class = "nav navbar-nav navbar-right">
                    <li class="active"><a href = "Event_Management.php">Home</a></li>
                    <li><a href = "home.php">MyEvents</a></li>
                    <li><a href = "#">Contact</a></li>
                    <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">My Profile <b class="caret"> </b></a>
                        <ul class="dropdown-menu">
                            <li> <a href ="profile.php"> Profile</a></li>
                            <li> <a href ="index.php"> Sign In</a></li>
                            <li> <a href ="#"> Update Account</a></li>
                            <li><a href="home.php"> <?php
                                    $username = $_SESSION['username'];
                                    echo $username;
                                    ?></a></li>
                            <li> <a href="#"><?php require 'toolbar.php' ?></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <text class="visible-lg">LARGE</text>
    <text class="visible-md">MEDIUM</text>
    <text class="visible-sm">SMALL</text>
    <text class="visible-xs">X-SMALL</text>
    <!-- END OF NAVBAR-->
</html>
<html>
    <head> 
        <?php
        require 'User.php';
        require 'ensureUserLoggedIn.php';
        require 'Styles.php';
        require 'Scripts.php';
        require 'NavBar.php';
        ?>
    </head>
    <body>
        <div class="container">
            <div class=" profileLeft col-lg-6">
                <div class="user-image col-lg-4">
                    <img src="img/profilePic.png" class="img-responsive thumbnail">
                </div>
                <div class="user-pad">
                    <h3>Welcome back,  <?php
                        $username = $_SESSION['username'];
                        echo $username;
                        ?></h3>

                    <h4 class="white"><i class=""></i>Ryan Dowler</h4>
                    <h4 class="white"><i class=""></i><span class="hidden-xs glyphicon glyphicon-star-empty"></span> Prestige User</h4>
                    <h4 class="white"><i class=""></i><span class="hidden-xs glyphicon glyphicon-eye-open"></span> 14765 Views</h4>
                    <h4 class="white"><i class=""></i><span class="hidden-xs glyphicon glyphicon-user"></span> 144 Connects</h4>
                    <h4 class="white"><i class="fa fa-twitter"></i> @RyanD123twitter</h4>
                    <button type="button" class="btn btn-labeled btn-info" href="#">
                        <span class="btn-label"><i class="fa fa-pencil"></i></span>Update</button>
                </div>



            </div>
            <div class="profileRight col-lg-6">
                <h3 class="col-lg-offset-4">Active Events</h3>


            </div>
        </div>


    </body>
</html>
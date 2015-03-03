

        <?php
$t_session_id = session_id();
if ($t_session_id == "") {
    session_start();
}
/* I didnt use this as i went with the better option of drop down sign out like a real site
if (isset($_SESSION['username'])) {
    echo '<p><a href="logout.php"><button class="grid_2 type="button"  >Logout</button></a></p>';
}
else {
    echo '<p><a href="login.php"><button class="grid_2 type="button"  >Login</button></a></p>';
}
 
 */
if (isset($_SESSION['username'])) {
    echo '<p><a href="logout.php">Logout</button></a></p>';
}
else {
    echo '<p><a href="login.php">Login</button></a></p>';
}
?>

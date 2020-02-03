<?php
ob_start();
session_start();

require_once 'config.php';



// if session is not set this will redirect to login page
if( !isset($_SESSION['users']) ) {
    header("Location: indexadmin.php");
    exit;
}

// select loggedin users detail
$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);





?>




    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Welcome - <?php echo $userRow['fname']; ?></title>
    </head>
    <body>


    Hello <?php echo $userRow['fname']; ?> you are sucessfully logged in!

    <br>Your last name is <?php echo $userRow['lname']; ?>
    <br>Your email address is <?php echo $userRow['email']; ?>

    <br><br><br><br><br><br><br><br><br><br>


    <h1><?php echo $userRow['userlevel']; ?></h1>





    <br><br><br><br><br><br><br><br><br><br>


    <a href="logout.php?logout"></span>Sign Out</a></li>

    <br>
    <br>
    <a href="register.php">Register</a> <a href="index.php">Sign in</a> <a href="admin.php">Admin</a>

    </body>
    </html>
<?php ob_end_flush(); ?><?php

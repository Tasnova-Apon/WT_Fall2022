<?php

session_start();

if (empty($_SESSION["username"]) && empty($_SESSION["password"]))
{
    header("location: ../view/userlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>User - Home </title>

</head>

<body bgcolor="grey">
    <center>

        <header>
            <h1><font color="black">Safe Travels!</font></h1>
            <p><strong><font color="black">User Homepage</font></strong></p>
            <br><br><br><br>
        </header>

        <h3> <a href="viewinformation.php">View user Information </a></h3>
        <br>

        <h2> <strong><font color="blue"> Welcome to Your Home Page<?php include('../control/cookie.php'); ?> </font></strong> </h2> 
        <br><br>

        <h3>Do you want to <a href="../control/userlogout.php">Logout?</a></h3>

    </center>
</body>

</html>

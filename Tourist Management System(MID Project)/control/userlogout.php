<?php
session_start();

if(session_destroy()) // Destroying All Sessions
{
header("Location: ../view/userlogin.php"); // Redirecting To Home Page
}
?>


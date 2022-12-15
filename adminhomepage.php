<?php

session_start();

if (empty($_SESSION["username"]) && empty($_SESSION["password"]))
{
    header("location: ../View/adminlogin.php");
}

@include("../View/header.php");
@include("../View/navbar.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/CSS" href="../CSS/adminhome.css">
    <title>Admin Dashboard</title>
    
   <style>
    .center{
        padding-left: 550px;
    }
   </style>


</head>

<body>


<div class="nav-wrapper">
        <div class="topnav" id="theTopNav">  
            <a id="logout" href="../Control/adminlogout.php">Logout</a>
        </div>
</div>

    <div class="flex-container">
        <div class="flex-item">
            <h1 id="customer">Welcome to the Admin Dashboard<?php include('../Control/cookie.php'); ?></h1> 
        </div>  
    </div>

    <div class="center"> 
        <input type="image" src="../Image/header_pic.jpg">   
    </div> 

</body>

</html>
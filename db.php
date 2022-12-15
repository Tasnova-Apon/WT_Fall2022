<?php

class db
{
    function openConn()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "traveldb";
        $conn =  new mysqli( $servername, $username, $password, $dbname);
        if ($conn->connect_error)
        {
            echo "error connecting database";
        }
        return $conn;
    }

   
    function loginadmin($conn, $admintbl, $uname, $pass)
    {
        $sqlstr = "SELECT uname, pass FROM $admintbl WHERE uname = '$uname' AND pass = '$pass'";
        return $conn -> query($sqlstr);
    }

    
    function insertapplicant($uname,$email,$cpassword,$admintbl,$conn)
    {
        $sqlstr = "INSERT INTO $admintbl(uname,pass,email) VALUES ('$uname','$cpassword','$email')";
        return $conn->query($sqlstr);
    }

    
}
?>
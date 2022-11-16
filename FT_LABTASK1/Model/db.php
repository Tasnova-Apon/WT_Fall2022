<?php

class db
{
    function openConn()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tourist";
        $conn =  new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error)
        {
            echo "Error connecting database";
        }
        return $conn;
    }

    function insertUser($FirsName, $LastName,$Password,$ConfirmPassword, $Email,$Username,$Phone,$Street,$City,$Postal,$gender,$Date, $conn)
    {
        $sql = "INSERT INTO $tourist(firstname,lastname,password,confirmpassword,email,username,phone,street,city,postal,gender,'DOB')
        VALUES ('$FirsName', '$LastName', '$Email', '$Username', '$Phone', '$Street', '$City', '$Postal','$gender','$Date')";
        return $conn->query($sql);
    }
}

?>

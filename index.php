<?php
include("../Control/process.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Registration form using JSON</title>
</head>

<body>
    <?php

    echo $Fname;
    echo $Lname;
    echo $Age;
    echo $designation;
    echo $Email;
    echo $password;
    echo $file;
    
    ?>
    <h1> Website Registration Form </h1>
    
    <form action="" method="post" enctype="multipart/form-data">

        <table>

            <tr>
                <td>
                    First Name :
                </td>
                <td>
                    <input type="text" name="fname" placeholder=" Enter First Name"> <br>
                </td>
            </tr>

            <tr>
                <td>
                    Last Name :
                </td>
                <td>
                    <input type="text" name="lname" placeholder="Enter Last Name"> <br>
                </td>
            </tr>

            <tr>
                <td>
                    Age :
                </td>
                <td>
                    <input type="text" name="age" placeholder="Enter Your Age"> <br>
                </td>
            </tr>

            <tr>
                <td>
                    Designation :
                </td>
                <td>
                    <input type="radio" name="designation" value="studentr">student
                    <input type="radio" name="designation" value="teacherr">teacher
                    <input type="radio" name="designation" value="employee">employee
                    <br>
                </td>
            </tr>

            
            <tr>
                <td>
                    Email :
                </td>
                <td>
                    <input type="email" name="email" placeholder="Enter Your Email" autocomplete="on"> <br>
                </td>
            </tr>

            <tr>
                <td>
                    password :
                </td>
                <td>
                    <input type="password" name="password" placeholder="Enter Your password"> <br>
                </td>
            </tr>

            <tr>
                <td>
                    Please choose a file
                </td>
                <td>
                    <input type="file" name="myfile"> <br>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="Submit">
                    <input type="reset">
                </td>
            </tr>

        </table>

    </form>

</body>

</html>
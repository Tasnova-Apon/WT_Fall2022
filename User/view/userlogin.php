<?php

include('../control/userlogincontrol.php');

if (isset($_SESSION['username']))
{
    header("location: ../view/upage1.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Log in</title>
</head>

<body bgcolor="grey">
    <form action="" method="POST" enctype="multipart/form-data">
        <center>
            <header>
                <h1>
                    <font color="black">Safe Travels.</font>
                </h1>
                <p><strong>
                        <font color="black">Login As An User</font>
                    </strong></p>
                <br><br><br><br>
            </header>

            <form action="" method="POST" enctype="multipart/form-data">

                <table>

                    <tr>
                        <td>
                            <label>
                                <font color="black">Username:</font>
                            </label>
                            <input type="text" name="username"> <br><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>
                                <font color="black">Password :</font>
                            </label>
                            <input type="password" name="password"> <br><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                <b>Remember Me</b>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <br>
                            <label></label>
                            <input type="submit" name="submit" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="registration" value="Registration">

                        </td>
                    </tr>

            
            

                </table>      
            </form>
        </center>
    </form>
</body>

</html

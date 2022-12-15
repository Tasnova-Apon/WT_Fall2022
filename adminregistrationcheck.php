<?php

@include("../Model/db.php");

$errors = array();
$success = array();
$uppercase = $lowercase = $number = $specialchars = "";

session_start();

if(isset($_POST["submit"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $nid = $_POST["nid"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $picture = $_FILES["picture"]["name"];
    $cv = $_FILES["cv"]["name"];

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialchars = preg_match('@[^\W]@', $password);

    if (empty($fname) && empty($lname) && empty($uname) && empty($email) && empty($nid) && empty($phone) && empty($password) && empty($cpassword) && empty($_FILES["picture"]["tmp_name"]) && empty($_FILES["cv"]["tmp_name"]))
    {
        $errors['empty-fields'] = "You did not fill all the fields! ";
    }
    else if(empty($fname))
    {
        $errors['empty-fname'] = "Please Enter Your Firstname.";
    }
    else if(empty($lname))
    {
        $errors['empty-lname'] = "Please Enter Your Lastname.";
    }
    else if(empty($uname))
    {
        $errors['empty-uname'] = "Please Enter Your Username.";
    }
    else if (!empty($uname) && strlen($uname) <= 5)
    {
        $errors['uname-char'] = "Username must be more than 5 characters! ";
    }
    else if(empty($email))
    {
        $errors['email-notvalid'] = "Please Enter Valid Email Address. ";
    }
    else if(!empty($email) && !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    {
        $errors['email-notvalid'] = "Please Enter Valid Email Address. ";
    }
    else if(empty($nid))
    {
        $errors['empty-nid'] = "Please Enter Valid National Identity Number. ";
    }
    else if(!empty($nid) && strlen($nid) != 8)
    {
        $errors['nid-digit'] = "NID should be 8 digits. ";
    }
    else if(empty($phone))
    {
        $errors['empty-phone'] = "Please Enter Valid Phone Number. ";
    }
    else if(!empty($phone) && !preg_match("/^\+?(88)?0?1[3456789][0-9]{8}\b/", $phone))
    {
        $errors['phone-invalidp'] = "Invalid Phone Number Pattern";
    }
    else if(empty($password))
    {
        $errors['empty-pass'] = "Enter Password! ";
    }
    else if(empty($cpassword))
    {
        $errors['empty-cpass'] = "Confirm Your Password ";
    }
    else if(!empty($password) && !empty($cpassword))
    {
        if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) <= 8)
        {
            $errors['pass-notvalid'] = "Password should be more than or equal to 8 characters and should include at least one uppercase, one lower case, one number and one special character! ";
        }
        else if($password != $cpassword)
        {
            $errors['pass-notmatched'] = "Password didn't match. ";
        }
    }
    if ($fname != "" && $lname != "" && $uname != "" && $email != "" && $nid != "" && $phone != "" && $password != "" && $cpassword != "") 
    {
        

    $mydb = new db();
    $myconn = $mydb->openConn();
    $mydb->insertapplicant($uname,$email,$password,"admintbl", $myconn);
    $success['registration-done'] = "Congratulations ! You have done your resgistration.";
        

    }
    else
    {
        $errors['registration-failed'] = "Your registration failed. Please try again. ";
    }
}

?>
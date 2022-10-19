<?php
  $Fname = "";
  $Lname = "";
  $Age = "";
  $password = "";
  $Email = "";
  $file = "";
  $designation="";
  $filepath="";
  $formdata="";
  

  
  

if(isset($_POST["Submit"]))
{
    $Fname = $_POST["fname"];
    $Lname = $_POST["lname"];
    $Age = $_POST["age"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $Designation = $_POST["designation"];

    if (empty($Fname)|| (strlen($Fname)<3))
    {
        $Fname = 'Please Enter First Name';
    }
    else if (is_numeric($Fname))
    {
        $Fname = 'First Name can not be numeric';
    }
    else
    {
        echo 'First name format is valid';
    }

    echo '<br>';

    if (empty($Lname))
    {
        $Lname = 'Please Enter Your Last Name';
    }
    else if (is_numeric($Lname))
    {
        $Lname = 'Last Name can not be numeric';
    }
    else
    {
        echo 'Last name format is valid';
    }

    echo '<br>';


    if (empty($Age))
    {
        $Age = 'Please Enter your Age ';
    }
    else if(!is_numeric($Age))
    {
        $Age = "Age can't be a character";
    }
    else
    {
        echo 'Age format is valid';
    }

    echo '<br>';

    if (isset($Designation))
    {
        if ( $Designation== 'Student')
        {
            echo "You have selected Student";
        }
        else if ($Designation == 'Teacher')
        {
            echo "You have selected Teacher";
        }
        else if ($Designation == 'employee')
        {
            echo "You have selected Employee";
        }
        else
        {
            $designation = 'You have not selected any designation';
        }
    }

    echo '<br>';



    if (empty($email))
    {
        $Email = "You must enter email";
    }
    else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    {
        $Email = "Wrong Email Pattern";
    }
    else
    {
        echo "Your email format is valid";
    }

    echo '<br>';

    if (strlen($password) < 4)
    {
        $password =  'Enter a valid password';
    }
    else
    {
        echo 'password format is valid';
    }

    echo '<br>';

    if(move_uploaded_file($_FILES["myfile"]["tmp_name"],"../uploads/".$_FILES["myfile"]["name"]))
    { 
        $filepath = "../uploads/".$_FILES["myfile"]["name"];
        $formdata = array(
            'firstname'=>$_POST["fname"],
            'lastname'=>$_POST["lname"],
            'age'=>$_POST["age"],
            'password'=>$_POST["password"],
            'email'=>$_POST["email"],
            'designation'=>$_POST["designation"],
            'filepath'=>$filepath
        );
        $existingdata = file_get_contents('../data/data.json');
        $tempJSONdata = json_decode($existingdata);
        $tempJSONdata[] =$formdata;
        $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
        
        if(file_put_contents("../data/data.json",$jsondata))
        {
            echo "File Uploaded :- " . $_FILES["myfile"]["name"];
            echo '<br>';
            echo 'Data Successfully Saved';
            echo '<br><br>';
        }
        else
        {
            echo 'No Data Saved';
            echo '<br><br><br>';
        }

        echo "Showing saved data from json file(data.json) <br>";
        $data = file_get_contents("../data/data.json");
        $mydata = json_decode($data);
        foreach ($mydata as $myobject)
        {
            foreach ($myobject as $key => $value)
            {
                echo $key . " => " . $value . "<br>";
            }
        }
    }
    else
    {
        $file = "Sorry, there was an error uploading your file.";
    }
}
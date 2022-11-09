<?php

session_start();  
if(isset($_POST['submit']))
{
    $Username = $_POST['username'];
    $password = $_POST['password'];

    if($Username != "" && $password != "")
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") 
       {  
           /*$remember = false;
            if(isset($_POST["remember"]))
            {
                $remember = true;
            }*/

            $f = 0;    
            $userdata = file_get_contents('../Data/data.json');  
            $userdata_array = json_decode($userdata,true);   
            if($userdata_array != NULL)  
            {foreach($userdata_array as $useruser)  
        {
         if($useruser["username"] === $_POST["username"] && $useruser["password"] === $_POST["password"]) 
          {$_SESSION['username'] = $employeuser["username"]; 
          $_SESSION['password'] = $employeuser["password"];
              
          if (!empty($_POST["remember"]))

                        {
                        setcookie("username", $_SESSION['username'], time() + 86000);
                        setcookie("password", $_SESSION['password'], time() + 86000);
                        echo "";

                        }

                        else{
                     setcookie("username","");
                     setcookie("password","");
                     echo "";

    }
          /*$f = 1;   // remeber me r code
                    if($remember)
                       {
                            setcookie("username", $_POST["username"],time()+86000);
                        }
                        header("location: ../view/upage1.php");
                            */
        } }
    }
           if ($f == 0) 
           {
                echo  "Username and Password Doesn't Match";
           }
            else
            {
            $userinfo = array
            (
                'username' => $Username,
                'password' => $Password
            );
            $userdata_array[] = $userinfo;
            $userinfoencode = json_encode($userdata_array,JSON_PRETTY_PRINT);  

            if (file_put_contents('../Data/userlogindata.json', $userinfoencode))   
            {

                echo " ";
            } else {
                echo " ";
            }
            }
        }
    }
    else
    {
        echo " Username and Password Can't be Empty";
    }
    }
if(isset($_POST['registration']))
{
    header("location: ../view/userregistration.php");
}

?>

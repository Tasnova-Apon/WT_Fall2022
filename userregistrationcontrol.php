<?php

$FirstnameErr = "";
$LastnameErr = "";
$UsernameErr="";
$passwordErr = "";
$confirmPasswordErr="";
$emailErr = "";
$PhoneErr="";
$genderErr="";
$fileErr = "";
$filepath ="";
$imagepath="";
$ValidStreet="";
$ValidCity="";
$ValidPostal="";
$ValidCode="";
$DateErr="";
$img_err ="";



if (isset($_POST['Registration']))    
//if (isset($_POST['Registration'])&& !empty($_POST['username'])&& !empty($_POST['password']))
{

        $FirsName = $_POST["firstname"];
        $LastName = $_POST["lastname"];
        $Password = $_POST["password"];
        $ConfirmPassword = $_POST["conformpassword"];
        $Email = $_POST["email"];
        $Username=$_POST["username"];
        $Phone=$_POST["phone"];   
        $Street=$_POST["street"];
        $City=$_POST["city"];
        $Postal=$_POST["postal"];
        $gender=$_POST["gender"]; 
       $Date = date('Y-m-d', strtotime($_POST['DOB']));   

  



        if (empty($FirsName))
        {
            $FirstnameErr ='Please Enter First Name';
        }
        else if(is_numeric($FirsName))
          {
            $FirstnameErr ='First Name can not be numeric'; }

            else if (!preg_match("/^[a-zA-Z-' ]*$/",$FirsName))                                
            {
              $FirstnameErr = "Only letters and white space allowed";
            }
         else
        {
          $FirstnameErr= 'Your First Name is ' . $FirsName;
        }
        echo '<br>';


   
        



        if (empty($LastName))
        {
            $LastNameErr ='Please Enter First Name';
        }
        else if(is_numeric($LastName))
          {
            $LastNameErr ='First Name can not be numeric'; }

            else if (!preg_match("/^[a-zA-Z-' ]*$/",$LastName))                                
            {
              $LastNameErr = "Only letters and white space allowed";
            }
         else
        {
          $LastNameErr= 'Your First Name is ' . $LastName;
        }
        echo '<br>';




    

   
    

     if (empty($Username) || strlen($Username)<6)                 
     {
      $UsernameErr ='"Name Must contain 6 letter !!"';
      }
      else if (!preg_match("/^[a-zA-Z-' ]*$/",$Username)) 
       {
         $UsernameErr = "User name added ";
       }

      else if(!is_string($Username))                                           
     {
    $UsernameErr ='User Name must be string';
     }
      
   
     else
     {
         $UsernameErr = "Valid Username";
     }
     
    echo '<br>';




  

        

        if (strlen($Password) < 7 ||empty($Password))      
         {
            $passwordErr =  'Password Must Contain 8 character!';
        } 
        

      else if(ctype_lower($Password ))                                                    
      {
			if(ctype_upper($Password))
			{

			}
			else 
			{
				$passwordErr= "Password Must contain upper case and lower case";
               
			}
    }
        
        else if(is_numeric($Password))
        {
            $passwordErr= "Password Must contain number-letter-special Character";
            
        }
        
        else
        {
          $passwordErr= 'password is valid';
        }





        if(empty($ConfirmPassword))
        {
            $confirmPasswordErr="Confirm Password Cannot be empty!";
            
        }

       else if
        
        (($ConfirmPassword != $Password))
         {
            $confirmPasswordErr = 'Oops! Password did not match. Try again.';
        } 
        else
         {
          $confirmPasswordErr = 'password is match';
         }





         if(empty($Phone))
         {
          $PhoneErr="Phone Must Required !!";
           
         }


           else if(!is_numeric($Phone ))   
         {
            
           $PhoneErr="Phone must be numeric number ";
         }

        else if (strlen($Phone) < 10)                         
        {
            $PhoneErr="Phone must be 11 digits ";

        }
        else
       {
        $PhoneErr= 'Your Phoone number is '. $Phone;
       }
       







       if(empty($Email))
        {
            $emailErr = "You must enter email";
        } 
        else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$Email))
        { $emailErr = "Wrong Pattern Email";} 
        else{
            $emailErr= "Your email is ".$Email;
          echo '<br>';
    
        }






        if(empty($Street))
     {
        $ValidStreet="Street information can not be empty !!";
        
     }
     else{
      $ValidStreet= "Your Road number ".$Street;
      echo '<br>';
    }

   
    if(empty($City) || ctype_upper($City))                               
   {
    $ValidCity="City name  sloud start with uper case!";
     
    }
    else{
      $ValidCity= "Your City is ".$City;
      echo '<br>';
    }


    if(empty($Postal))
   {
    $ValidPostal="Postal Code must be filled!!";
     

   }
   else if(strlen($Postal)<3)                                              
  {
    $ValidPostal="Postal must contain 4 characters ";
  }
  else{
    echo "Your City is ".$Postal;
    echo '<br>';
     }





        if (!isset($_POST["gender"]))
            {
              //$genderErr = ' You have not selected any Gender';
            }
              if (isset($_POST["gender"]) )
              {   

            if ($_POST["gender"]=="male")
             {
                $genderErr = 'You selected male';
             
            }
              if ($_POST["gender"]=='female')
             {
                $genderErr = 'You selected female';
             
            } 
            $gender =   $_POST["gender"];}
            
         else {
            $genderErr = ' You have not selected any Gender';
        }


        if(empty($Date))
{
    $DateErr="DOB can not be empty!";
   
}
   else{
    $DateErr="DOB can not be empty!";
    "Your DOB is ".$Date;
  echo '<br>';
   }
     






      echo $_FILES["myfile"]["name"];

       if(move_uploaded_file($_FILES["myfile"]["tmp_name"],"../uploads/".$_FILES["myfile"]["name"]))
         { $filepath = "../uploads/".$_FILES["myfile"]["name"];
    $fileErr = "File Uploaded"; 
         }else
    {$fileErr = 'No file is upload';} 


    echo $_FILES["image"]["name"];

       if(move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/".$_FILES["image"]["name"]))
         { $imagepath = "../uploads/".$_FILES["myfile"]["name"];
    $img_err = "File Uploaded"; 
         }else
    {$img_err = 'No file is upload';} 

  /**  json part  **/  

  if(!empty($FirsName)&&!empty($LastName)&&!empty($Username)&&!empty($Password) &&!empty($NID))
  //if(!empty($FirsName)&&!empty($LastName))
{
    $formdata = array(
    'firstname'=>$_POST["firstname"],
    'username'=>$_POST["username"],
    'lastname'=>$_POST["lastname"],
    
    'phone'=>$_POST["phone"],
    'email'=>$_POST["email"],
    'password'=>$_POST["password"],
   'conformpassword'=>$_POST["conformpassword"],
    
    'DOB'=>$_POST["DOB"], 
    'gender'=> $gender,
    'city'=>$_POST["city"],
    'street'=>$_POST["street"],
    'postal'=>$_POST["postal"],
    'imagepath' => $imagepath,
    'filepath'=>$filepath);
    



$existingdata = file_get_contents('../Data/empregistrationdata.json');
$tempJSONdata = json_decode($existingdata);
$tempJSONdata[] =$formdata;


$jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
if(file_put_contents("../Data/data.json",$jsondata))
{
    echo 'Register has Successfully complete';
}
else
echo 'No Data Saved';
}
}
if(isset($_POST["login"]))
{
    header("location: ../view/userlogin.php");
}


  
?>
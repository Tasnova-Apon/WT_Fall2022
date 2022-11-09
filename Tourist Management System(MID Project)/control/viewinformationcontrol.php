<?php

include("../control/userregistrationcontrol.php"); 

session_start();



$data = file_get_contents("../Data/data.json");

$mydata = json_decode($data);

foreach ($mydata as $myobject) {

    foreach ($myobject as $key => $value) {

        echo $key . " => " . $value . "<br>";

    }

    echo "<br><br>";

}

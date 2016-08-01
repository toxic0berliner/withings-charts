<?php

$config=array();

$config["identifier"]="get your own from https://healthmate.withings.com/partners";
$config["secret"]="get your own from https://healthmate.withings.com/partners";
$config["callback_uri"]="https://www.example.com/path/callback.php";
$config["refreshDelay"]=6; // Number of hours to keep the data in session. After that, a refresh is performed
$config["userIdJson"]="1234567"; //get it from the withings api
$config["dataJson"]="resources/data.json"; //point it to your json file
$config["jsonLastDate"]="2016-07-13 09";
$config["jsonLastDateFormat"]="Y-m-d H";

?>

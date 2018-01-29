<?php

// Connect to DB
require 'dbconnect.php';

//Form variables

session_start();

if(isset($_SESSION['userid'])){
    $pfuserid = $_SESSION['userid']; 
}
else {
    die ("You need to log in before you can save your results...");
}
$pfresult = $_POST['pfresult'];
$wkdate = $_POST['date'];
$workouttype = $_POST['workout'];
$weight = $_POST['weight'];
$reps = $_POST['reps'];
$time = $_POST['time'];

//The exercise and then the actual weight in kg
$wktypeweight = "" . $_POST['workout'] . "weight";
$wkweight = $_POST['weight'];

$wktypereps = "" . $_POST['workout'] . "reps";
$wkreps = $_POST['reps'];

$wktypetime = "" . $_POST['workout'] . "time";
$wktime = $_POST['time'];

$wktypepf = "" . $_POST['workout'] . "pf";
$wkpf = $_POST['pfresult'];

$pfuserlower = strtolower($pfuserid);
$tablename = str_replace("@", "_", $pfuserlower);    
$tablename = str_replace(".", "_", $tablename); 
$tablename = $tablename . "_data";

// need to check if database has entry for the date 

$sqlCheck = "SELECT wkdate, $wktypepf FROM $tablename WHERE wkdate='$wkdate' AND $wktypepf != '0'";
$result = $conn->query($sqlCheck);
if ($result->num_rows > 0) {
    print_r ($result);
    die('There is already a ' . $workouttype . ' entry for that date...');
}

else{
    require 'insertdata.php';
}

?>
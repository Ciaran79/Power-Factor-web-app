<?php
//serverDB details 
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

//Form variables
// $pfresult = $_GET['pfresult'];
// $wkdate = $_GET['date'];
$workouttype = $_GET['workout-old'];
// $weight = $_GET['weight'];
// $reps = $_GET['reps'];
// $time = $_GET['time'];

$wktypeweight = "" . $_GET['workout-old'] . "weight";
// $wkweight = $_GET['weight'];

$wktypereps = "" . $_GET['workout-old'] . "reps";
// $wkreps = $_GET['reps'];

$wktypetime = "" . $_GET['workout-old'] . "time";
// $wktime = $_GET['time'];

$wktypepf = "" . $_GET['workout-old'] . "pf";
// $wkpf = $_GET['pfresult'];

$pfuserid = $_GET['login-name-area-two']; 

        $pfuserlower = strtolower($pfuserid);
        $tablename = str_replace("@", "_", $pfuserlower);    
        $tablename = str_replace(".", "_", $tablename); 
        $tablename = $tablename . "_data";

// $tablename = $pfuserlower . "_data";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// need to check if database has entry for the date 

$sql = "SELECT wkdate, $wktypepf, $wktypereps, $wktypeweight, $wktypetime FROM $tablename";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Date: " . $row['wkdate'] . "<br>" 
        . $workouttype . " power factor was " . $row[$wktypepf] . "kg per minute <br>" 
        . $workouttype . " weight was: ". $row[$wktypeweight] . "kg <br>"
        . $workouttype . " reps was: " . $row[$wktypereps] . " reps <br>" 
        . $workouttype . " time was: ". $row[$wktypetime] . " minutes<br>";
        // echo "<a href='index.html'>Go back</a>";
       
    }
} else {
    echo "0 results";
}

$conn->close();
?>
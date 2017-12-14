<?php
//serverDB details 
$servername = "localhost";
$username = "towdie10_pf";
$password = "Sp4nk1ngs";
$dbname = "towdie10_pf_data";

//Form variables
// $pfresult = $_POST['pfresult'];
// $wkdate = $_POST['date'];
$workouttype = $_POST['workout'];
// $weight = $_POST['weight'];
// $reps = $_POST['reps'];
// $time = $_POST['time'];

$wktypeweight = "" . $_POST['workout'] . "weight";
// $wkweight = $_POST['weight'];

$wktypereps = "" . $_POST['workout'] . "reps";
// $wkreps = $_POST['reps'];

$wktypetime = "" . $_POST['workout'] . "time";
// $wktime = $_POST['time'];

$wktypepf = "" . $_POST['workout'] . "pf";
// $wkpf = $_POST['pfresult'];

$pfuser = $_POST['login-name-area-two']; 

$pfuserlower = strtolower($pfuser);

$tablename = $pfuserlower . "_data";



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
        echo "<a href='index.html'>Go back</a>";
       
    }
} else {
    echo "0 results";
}

$conn->close();
?>
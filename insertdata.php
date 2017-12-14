<?php
//serverDB details 
$servername = "localhost";
$username = "towdie10_pf";
$password = "Sp4nk1ngs";
$dbname = "towdie10_pf_data";

//Form variables
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

$pfuser = $_POST['login-name-area']; 
$pfuserlower = strtolower($pfuser);

$tablename = $pfuserlower . "_data";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "INSERT INTO $tablename ($wktypeweight, $wktypereps, $wktypetime, $wktypepf, wkdate)
VALUES ($wkweight, $wkreps, $wktime, $wkpf, '$wkdate')";


if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    // echo "New record created successfully. Last inserted ID is: " . $last_id; 
    echo "<br>Saved on $wkdate";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Refresh:5; url=index.html");


$conn->close();
?>
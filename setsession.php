<?php

// First check to see if login exists in database

// Make a connection
require 'dbconnect.php';

// Check and set POST login variables
// if(isset($_POST['user'])){
//     $pfuserid = mysqli_escape_string($conn, $_POST['user']); 
// }

if(isset($_POST['user'])){
    $pfuserid = mysqli_escape_string($conn, $_POST['user']); 
    if (!filter_var($pfuserid, FILTER_VALIDATE_EMAIL)){
        die('username must be a valid email address');
    }
}

if(isset($_POST['password'])){
    $pfuserpw = mysqli_escape_string($conn, $_POST['password']); 
}

// Get details from the database

$sql = "SELECT username, password FROM users WHERE username='$pfuserid'";

$result = mysqli_query($conn, $sql)
  or die('Error querying database.');

// $name = mysqli_fetch_all($result, MYSQLI_ASSOC);

$row=mysqli_fetch_assoc($result);

if(password_verify($pfuserpw, $row['password'])){

    // // Start the session
session_start();

$_SESSION['userid'] = $pfuserid;
setcookie('userid', $pfuserid, time() + 3600);

echo $pfuserid;

}

else {
   die ('The username and password do not match...');
}

   
$conn->close();
 

?>


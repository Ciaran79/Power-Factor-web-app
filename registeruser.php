<?php 

// First check to see if anyone is logged in
session_start();
if(isset($_SESSION['userid'])){
    die('You need to log out the previous user before registering a new user...');
  }

else {
    // Connect to db
    require 'dbconnect.php';

    // Check and set POST login variables
    if(isset($_POST['user'])){
        $pfuserid = mysqli_escape_string($conn, $_POST['user']); 
        if (!filter_var($pfuserid, FILTER_VALIDATE_EMAIL)){
            die('username must be a valid email address');
        }
    }

    if(isset($_POST['password'])){
        $pfuserpw = mysqli_escape_string($conn, $_POST['password']); 
        $pfuserpw = password_hash($pfuserpw, PASSWORD_DEFAULT, ['cost'=> 12]);
    }

    // See if user exists in the database

    $sql = "SELECT * FROM users WHERE username='$pfuserid'";

    $result = $conn->query($sql);

    if(mysqli_num_rows($result) > 0){
        echo 'That username is already taken...';
    }

    else {
        
        $sqlreg = "INSERT INTO users (username, password)
        VALUES ('$pfuserid', '$pfuserpw')";

        $tablename = str_replace("@", "_", $pfuserid);    
        $tablename = str_replace(".", "_", $tablename); 
         $tablename = $tablename . "_data";

         $sqltab = "CREATE TABLE $tablename LIKE template_data";

        if (($conn->query($sqltab)) && ($conn->query($sqlreg)) === TRUE) {

            echo "You have registered successfully!";
        }
        else {
            echo "Error: " . $sqlreg . "<br>" . $conn->error;
        }

    }

    $conn->close();

    }




?>
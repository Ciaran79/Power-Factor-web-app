<?php
// Start the session
session_start();

$pfuserid = $_POST['user']; 
$pfuserpw = $_POST['password'];

// Set session variables

if (($pfuserid == 'Towdie') && ($pfuserpw == 'Sp4nk')){
    $_SESSION['userid'] = $pfuserid;
    setcookie('userid', $pfuserid, time() + 3600);
    print_r($_SESSION);
    echo "$pfuserid has logged in";
    
 }
else {
    echo "The username and password are not recognised.";
}



header("Refresh:5; url=index.html");
?>


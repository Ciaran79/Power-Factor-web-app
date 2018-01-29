<?php
session_start();

session_unset();
if(isset($_COOKIE['userid'])){setcookie('userid', "", time() - 3600);}
        
echo 'You have logged out';



  ?>
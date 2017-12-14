<?php
session_start();
    function runMyFunction() {
        session_unset();
        if(isset($_COOKIE['userid'])){setcookie('userid', "", time() - 3600);}
        
    print_r($_SESSION);
    }
  
    if (isset($_GET['hello'])) {
      runMyFunction();
    }

    header("Refresh:5; url=index.html");

  ?>
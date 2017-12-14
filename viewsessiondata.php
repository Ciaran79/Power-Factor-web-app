<?php 
session_start();
function runMyFunction() {
   print_r($_SESSION);

  }

if (isset($_GET['show'])) {
  runMyFunction();
}
header("Refresh:5; url=index.html");   

?>
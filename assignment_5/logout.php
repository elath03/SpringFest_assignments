<?php


          $servername = "localhost";
         $username = "u828165350_esha";
         $password = "esha@1917";
         $dbname = "u828165350_login";
         $conn = mysqli_connect($servername, $username, $password, $dbname);
         if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
             }
     session_start();
      $_SESSION = array();
    session_destroy();

   
    header("location:login.php");
?>
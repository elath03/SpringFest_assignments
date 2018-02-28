<?php

         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "register";
         $conn = mysqli_connect($servername, $username, $password, $dbname);
         if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
             }
      require 'include.php';
      session_destroy();
      header("Location: login.php");


?>
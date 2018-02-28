<?php
ob_start();
session_start();
          $servername = "localhost";
         $username = "u828165350_esha";
         $password = "esha@1917";
         $dbname = "u828165350_login";
         $conn = mysqli_connect($servername, $username, $password, $dbname);
         if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
             }
            
         if(isset($_SESSION['user'])&&!empty($_SESSION['user'])  ){
         	echo ".";
} 
else{
	header("Location: login.php");
	
}

?>
<html>
<head>
<link rel="icon" 
      type="image/png" 
      href="pic.png">
<title>Welcome</title>
<style>
body{
	font-family:"Berlin Sans FB";
	background-image: url(reg.png);
background-size: cover;
}
#logout{

font-size: 35px;
background-color: #7FB3D5 ;
    border-radius: 10px;
    border:black 0px solid;
	margin-top: 3%;
	margin-left: 25%;
	margin-right:25%;
    padding-top:5%;
    padding-bottom: 5%;
    text-align: center;
    padding-left: 30px;
    padding-right: 30px;
}
#w{
	color:blue;
}
#log{
	font-size: 40px;
	text-decoration: none;
	border:1px black solid;
	border-radius: 5px;
	padding:5px;
	background-color: #e8ebed;
}
#log:hover{
	color: #e8ebed;
	background-color:#6C3483;
}
</style>

</head>
<body>
<div id="logout">
<?php  if(isset($_SESSION['user'])&&!empty($_SESSION['user'])  ){
        echo "welcome ".$_SESSION['user'];
       } ?><br><br>
       You have successfully logged in to our website!<br><br><br>


<a id="log" href="logout.php">logout</a>
</div>
</body>
</html>








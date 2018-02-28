<?php
ob_start();
session_start();
$user=$pass="";
$user_error=$pass_error="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["user"])){
        $user_error="*please enter Username";
	}
	else{
		$user=($_POST["user"]);
		
	}
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["pass"])){
        $pass_error="*please  enter password";
	}
	else{
		$pass=($_POST["pass"]);
		$pass_hash=md5($pass);
	}
}


if(!empty($user)&&!empty($pass) ){
 $servername = "localhost";
         
         $username = "u828165350_esha";
         $password = "esha@1917";
         $dbname = "u828165350_login";
         $conn = mysqli_connect($servername, $username, $password, $dbname);
         if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
             }
          else{
             $log="SELECT `Username`,`Password` FROM site WHERE `Username`='$user'AND `Password`='$pass_hash'";
            $res=mysqli_query($conn,$log) ;
            $userRow=mysqli_num_rows($res);
            
                if($userRow==0){

            	$message= "This Username and Password does not exist";
            	echo "<script type='text/javascript'>alert('$message');</script>";
            }
                 else{
                 	$row=mysqli_fetch_array($res);
                     $_SESSION['user'] = $row['Username'];
                     header("Location: welcome.php");
                 }

          }

}






?>
<html>
<head>
<link rel="icon" 
      type="image/png" 
      href="pic.png">
<title> LOGIN
</title>
<style>
body{
	font-family:"Berlin Sans FB";
	background-image: url(reg.png);
    background-size: cover;
}
form{
	color:black;
	font-family:"Berlin Sans FB";
	font-size: 30px;
	border:black 0px solid;
	margin-top: 5%;
	margin-left: 25%;
	margin-right:25%;
    padding-left:30px;
    padding-top: 60px;
    padding-bottom: 20px;
    background-color: #7FB3D5 ;
    border-radius: 10px;
}
input{
	color:black;
    font-size: 20px;
	height:45px;
	background-color:#e8ebed;
	border:0px black solid;
	border-radius: 5px;
	transition:0.5s ease-in-out;
	padding-left: 5px;
	
}
input:focus{
	border:1px #e8ebed solid;
	background-color:white;
	border-radius: 5px;
	 outline-width: 0px;
	 transition:0.2s ease-in-out;
	 cursor: pointer;
}

.err{
	font-size: 15px;
	color:red;
}
#submit{
	font-size: 30px;
	color:white;
	font-family:"Berlin Sans FB";
	padding-left:5px;
	padding-top:5px;
	padding-right:5px;
	padding-bottom:5px;
	height:50px;
	width: 150px;
    cursor:pointer;
    text-align: center;
    background-color: #6C3483;
    letter-spacing: 2px;}

#submit:hover{
    color: #6C3483;
    background-color: #e8ebed;
    letter-spacing: px;}
 #h{
 	font-size:45px;
 	text-align: center;
 	letter-spacing: 2px;
	text-shadow: 2px 2px #D7BDE2;
 }
 #p{
 	margin-left: 40px;
 }
 #u{
 	margin-left: 30px;
 }
#reg{
	text-shadow: none;
}
#reg:hover{
	color:white;
	font-size:45px;
	text-decoration: none;
}

</style>

</head>
<BODY>
<div id="h"> Do not have an account,connect with us today!<br><br> <a id="reg" href="register.php">Register</a></div>
<form method="POST">
Username:<input id="u" type="text" name="user">
<span class="err"><?php echo $user_error; ?><br><br><br><br></span>
Password:<input id="p" type="password" name="pass">
<span class="err"><?php echo $pass_error; ?><br><br><br><br></span>
<input id="submit" type="submit" name="submit" value="Login">
<script type="text/javascript" src="jquery-1.12.4.min.js"></script>
</form>
</body>
</html>
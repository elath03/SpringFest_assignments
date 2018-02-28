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
	if($user=='admin'&&$pass=='pass'){
		 header("Location: adminpage.php");
	}
    else {
    	$message='incorrect data';
    	echo  "<script type='text/javascript'>alert('$message');</script>";
    }

}




?>
<html>
<head>
<link rel="icon" 
      type="image/png" 
      href="pic.png">
<title> Admin
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
    padding-top: 1px;
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
 #h,#a{
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
#reg,#admin{
	text-shadow: none;
}
#reg:hover,#admin:hover{
	color:white;
	font-size:45px;
	text-decoration: none;
}

</style>

</head>
<BODY>
<div id="h"> Do not have an account,connect with us today!<br> <a id="reg" href="register.php">REGISTER</a></div>
<form method="POST">
<h4>ADMIN LOGIN</h4>
Username:<input id="u" type="text" name="user">
<span class="err"><?php echo $user_error; ?><br><br><br><br></span>
Password:<input id="p" type="password" name="pass">
<span class="err"><?php echo $pass_error; ?><br><br><br><br></span>
<input id="submit" type="submit" name="submit" value="Login">
<script type="text/javascript" src="jquery-1.12.4.min.js"></script>
</form>
<p id="a" > login as a user.. <a id ="admin" href="login.php"> USER</a></p>
</body>
</html>
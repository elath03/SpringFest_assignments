

<?php
$user_name=$firstname=$lastname=$email=$pass_word=$re_enter_password="";
$username_error=$lastname_error=$email_error=$password_error=$re_enter_password_error=$firstname_error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["user_name"])){
        $username_error="*please enter Username";
	}
	else{
		$user_name=($_POST["user_name"]);
	}
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["firstname"])){
        $firstname_error="*please  enter Firstname";
	}
	else{
		$firstname=($_POST["firstname"]);
	}
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["pass_word"])){
        $password_error="*please  enter Password";
	}
	else{
		$pass_word=($_POST["pass_word"]);
	}
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["re_enter_password"])){
        $re_enter_password_error="*please re enter password";
	}
	else{
		$re_enter_password=($_POST["re_enter_password"]);
	}
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["lastname"])){
        $lastname_error="*please  enter Lastname";
	}
	else{
		$lastname=($_POST["lastname"]);
	}
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["email"])){
        $email_error="*please enter mail id";
	}
	else{
		$email=($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "*Invalid email format"; 
      $email=NULL;    }
	}
}







if(!empty($user_name)&&!empty($pass_word)&&!empty($firstname)&&!empty($lastname)&&!empty($email)&&!empty($re_enter_password)){

     if($pass_word!=$re_enter_password){
     	$message="passwords do not match,please try again!";
     	echo "<script type='text/javascript'>alert('$message');</script>";
	      
         }
     else{
         $servername = "localhost";
         $username = "u828165350_esha";
         $password = "esha@1917";
         $dbname = "u828165350_login";
         $conn = mysqli_connect($servername, $username, $password,$dbname);
         if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
             }
         else{
            $log="SELECT `Username` FROM site WHERE `Username`='$user_name'";
            $res=mysqli_query($conn,$log) ;
            $userRow=mysqli_num_rows($res);
            if($userRow==1){
            	 $message="this username already exist";
     	         echo "<script type='text/javascript'>alert('$message');</script>";
	             }
         
             else{
         
         	$pass_hash=$re_enter_password=md5($pass_word);

             $sql = "INSERT INTO site (Username,First_Name,Last_Name,Password,Re_Enter_Password,E_mail)
             VALUES ('$user_name','$firstname','$lastname','$pass_hash','$pass_hash','$email' )";

             if (mysqli_query($conn, $sql)) {
                  $messag= "New record created successfully";
                    echo "<script type='text/javascript'>alert('$messag');</script>";}
             else {
                 echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
         mysqli_close($conn);
         $user_name=$firstname=$lastname=$email=$pass_word=$re_enter_password="";
         $user_name_error=$lastname_error=$email_error=$password_error=$re_enter_password_error=$firstname_error="";}
         }
        }
      
  }


?>







<html>
<head>
<link rel="icon" 
      type="image/png" 
      href="pic.png">
<title> Register </title>
<style>
body{
	font-family:"Berlin Sans FB";
	background-image: url(reg.png);
background-size: cover;
}


form{
	color:black;
	font-family:"Berlin Sans FB";
	font-size: 25px;
	border:black 0px solid;
	margin-top: 3%;
	margin-left: 25%;
	margin-right:25%;
    padding-left:30px;
    padding-top: 20px;
    padding-bottom: 20px;
    background-color: #7FB3D5 ;
    border-radius: 10px;
}

input{
	color:black;
    font-size: 20px;
	height:35px;
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

.error{
	font-size:15px;
	color:red;
	

}
#h{
	font-size:50px;
	text-align: center;
	font-weight: :normal;
	letter-spacing: 2px;
	text-shadow: 2px 2px #D7BDE2;

}
#user{
	margin-left:87px;
	
}
#f{
	margin-left:72px;

}
#p{
	margin-left: 92px;
}
#e{
	margin-left: 122px;
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
    letter-spacing: 1px;}

#submit:hover{
    color: #6C3483;
    background-color: #e8ebed;
    letter-spacing: 1px;

}
#login{
	font-size: 30px;
	text-align: center;
}
#l:hover{
	font-size:40px;
	text-decoration: none;
	color:white;

}
#l{
	
	font-size:40px;
}
</style>

</head>
<body background-image=url("reg.png")>


<div id="h">GET STARTED TODAY! CREATE A FREE ACCOUNT</div>
<form action="register.php" method="POST">
Username:
<input id="user" type="text" name="user_name" value="<?php echo $user_name; ?>">
<span class="error"> <?php echo $username_error;?></span>
<br><br>
First_Name:
<input id="f" type="text" name="firstname" value="<?php echo $firstname; ?>">
<span class="error"> <?php echo $firstname_error;?></span>
<br><br>
Last_Name:
<input id="f" type="text" name="lastname" value="<?php echo $lastname; ?>">
<span class="error">  <?php echo $lastname_error;?></span>
<br><br>
Password:
<input id="p" type="password" name="pass_word">
<span class="error">  <?php echo $password_error;?></span>
<br><br>
ReEnter_Password:
<input id="r" type="password" name="re_enter_password">
<span class="error">  <?php echo $re_enter_password_error;?></span>
<br><br>
E_mail:
<input id="e" type="text" name="email" value="<?php echo $email; ?>">
<span class="error"> <?php echo $email_error;?></span>
<br><br>
<input id="submit" type="submit" name="submit" value="Register">



</form>
<div id="login">Already have an account? <a id="l" href="login.php">LOGIN</a></div>
<script type="text/javascript" src="jquery-1.12.4.min.js"></script>
</body>
</html>

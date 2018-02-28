<?php
ob_start();
session_start();
$user="";
$user_error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["user"])){
        $user_error="*please enter Username";
	}
	else{
		$user=($_POST["user"]);
		
	}
}

    $servername = "localhost";
    $username = "u828165350_esha";
         $password = "esha@1917";
         $dbname = "u828165350_login";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
                   die("Connection failed: " . mysqli_connect_error());}
     
           $log="SELECT `First_Name`,`Last_Name`,`Username` FROM site";
            $res=mysqli_query($conn,$log) ;
            $userRow=mysqli_num_rows($res);
                if($userRow==0){

              $message= "no professor has yet created an account";
              echo $message;
            }
                else{

                  echo '<div style="font-size:40px;text-align:center" >'."LIST OF PROFESSORS ".'</div>';
                 while($query_row=mysqli_fetch_assoc($res) )
                 {
                  $first_name=$query_row['First_Name'];
                  $last_roll=$query_row['Last_Name'];
                 $id= $query_row['Username'];
                //  $id= $_SESSION['user'];
                echo  '<div style="font-size:25px;text-align:center;color:PURPLE;border:0px solid black;margin-left:300px;margin-right:300px;padding:5px;margin-top:10px;background-color:#FCDFFF;border-radius:5px;" >'.$first_name." ".$last_roll.'<br>'.'('.$id.')'.'</div>';

                 }}
                
  

if(!empty($user)){
             $log="SELECT `Username`,`Password` FROM site WHERE `Username`='$user'";
            $res=mysqli_query($conn,$log) ;
            $userRow=mysqli_num_rows($res);
            
                if($userRow==0){

            	$message= "This Username does not exist";
            	echo "<script type='text/javascript'>alert('$message');</script>";
            }
                 else{
                 	$row=mysqli_fetch_array($res);
                     $_SESSION['user'] = $row['Username'];
                     header("Location: admin_login.php");
                 }}
        

?>
<html>
<head>
<link rel="icon" 
      type="image/png" 
      href="pic.png">
<title> ADMIN PAGE
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
  font-size: 25px;
  border:black 0px solid;
  margin-top: 3%;
  margin-left: 25%;
  margin-right:25%;
  height:120px;
    padding-left:30px;
    padding-top: 40px;
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
.err{
	font-size: 15px;
	color:red;
}
#submit{
	font-size: 25px;
	color:white;
	font-family:"Berlin Sans FB";
	padding-left:2px;
	padding-top:2px;
	padding-right:2px;
	padding-bottom:2px;
	height:40px;
	width: 120px;
    cursor:pointer;
    text-align: center;
    background-color: #6C3483;
    letter-spacing: 1px;}

#submit:hover{
    color: #6C3483;
    background-color: #e8ebed;
    letter-spacing: px;}
    #log{
  font-size: 30px;
  text-decoration: none;
  border:1px black solid;
  border-radius: 5px;
  padding:5px;
  background-color: #e8ebed;
  text-align:center;
  margin-left:600px;
}
#log:hover{
  color: #e8ebed;
  background-color:#6C3483;
}
</style>
</head>
<body>
	<script type="text/javascript" src="jquery-1.12.4.min.js"></script>
<form method="POST">
Please enter the username of the professor<br><br>
Username:<input id="u" type="text" name="user">

<input id="submit" type="submit" name="submit" value="Login"><br><br>
<span class="err"><?php echo $user_error; ?></span>
<script type="text/javascript" src="jquery-1.12.4.min.js"></script>
</form>
<a id="log" href="logout.php">logout</a><br><br>
</body></html>
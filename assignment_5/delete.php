<?php 

session_start();

$roll=$std=$std_error=$roll_error="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST["std"])){
        $std_error="*please enter student's name";
  }
  else{
    $std=($_POST["std"]);
  }
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST["roll"])){
        $roll_error="*please  enter roll number";
  }
  else{
    $roll=($_POST["roll"]);
  }
}
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "register";
         $conn = mysqli_connect($servername, $username, $password, $dbname);
         if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                      }
         if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
         	
             if(!empty($roll)&&!empty($std)){
             	
                      $log="DELETE FROM esha WHERE `Student_Name`='$std' AND `Student_Roll`='$roll'";
                          
                        
                        if (mysqli_query($conn, $log)) {
                        	 
                                  $message="Student has been removed from your list if he/she was present";
                                  echo "<script type='text/javascript'>alert('$message');</script>";
                                  
                                   } 

                         else {
                                    echo "Error deleting record: " .mysqli_error($conn);
                              }

                   }}
                   else{
	header("Location: login.php");
	}
           

?>
<html>
<head>
<link rel="icon" 
      type="image/png" 
      href="pic.png">
<title>REMOVE</title>
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
  height:250px;
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
#h{
	font-size:40px;
	text-align: center;
	font-weight: :normal;
	letter-spacing: 2px;
	text-shadow: 2px 2px #D7BDE2;

}
#s{
   margin-left: 20px;
}
#r{
   margin-left: 45px;
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
	margin-top: 50px;
	margin-left: 600px;
}
#log:hover{
	color: #e8ebed;
	background-color:#6C3483;
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
#ho{
	font-size: 30px;
}
.error{
  font-size:15px;
  color:red;
  

}
#hom:hover{
  font-size:40px;
  text-decoration: none;
  color:white;

}
#hom{
  
  font-size:40px;}
</style>

</head>
    <div id="h">Want to remove a student?<br>Fill in his/her details!</div>
<form method="POST">
Student Name:<input id="s" type="text" name="std">
<span class="error"> <?php echo $std_error;?></span><br><br>
Student Roll:<input id="r" type="text" name="roll">
<span class="error"> <?php echo $roll_error;?></span><br><br>
<input type="submit" value="Remove" id="submit" ><br><br>
<div id="ho" >Do you want to go back to home page? <a href="welcome.php" id="hom" > home </a></div>
</form>


<a id="log" href="logout.php">Logout</a>

</body>
</html>
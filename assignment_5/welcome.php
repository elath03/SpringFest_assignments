<?php
session_start();
ob_start();


$id=$_SESSION['user'];
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
    $username = "u828165350_esha";
         $password = "esha@1917";
         $dbname = "u828165350_login";
         $conn = mysqli_connect($servername, $username, $password, $dbname);
         if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
             }
            if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){

           $log="SELECT `Student_Name`,`Student_Roll` FROM esha WHERE `Professor_id`='$id'";
            $res=mysqli_query($conn,$log) ;
            $userRow=mysqli_num_rows($res);
                if($userRow==0){

              $message= "No students are under you";
              echo $message;
            }
                else{

                  echo '<div style="font-size:40px;text-align:center" >'."LIST OF STUDENTS ".'</div>';
                 while($query_row=mysqli_fetch_assoc($res) )
                 {
                  $student_name=$query_row['Student_Name'];
                  $student_roll=$query_row['Student_Roll'];
                  echo  '<div style="font-size:25px;text-align:center;color:PURPLE;border:0px solid black;margin-left:350px;margin-right:350px;padding:5px;margin-top:10px;background-color:#FCDFFF;border-radius:5px;" >'.$student_name." - ".$student_roll.'</div>' ;
                 
           //       "<span style = 'font-color: #ff0000'> Movie List for {$key} 2013 </span>";




                 }
}



         if(isset($_SESSION['user'])&&!empty($_SESSION['user'])&&!empty($roll)&&!empty($std)){
         	echo ".";
         
          $wel="INSERT INTO esha (Professor_id,Student_Name,Student_Roll) 
                 VALUES ( '$id','$std','$roll')";
             if (mysqli_query($conn, $wel)) {
                  $messag= "New record created successfully";
                    echo "<script type='text/javascript'>alert('$messag');</script>";
                   header("Location: welcome.php");}
             else {
                 echo "Error: " . $wel . "<br>" . mysqli_error($conn);}
            } }
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
#del{
  font-size:30px;
  text-align:center;
}
#hi{
  font-size: 30px;
color:blue;
text-align: center;}
#remove:hover{
  font-size:40px;
  text-decoration: none;
  color:white;

}
#remove{
  
  font-size:40px;
}
.error{
  font-size:15px;
  color:red;
  

}
#s{
   margin-left: 20px;
}
#r{
   margin-left: 45px;
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

.
}

</style>

</head>
<body>
<div id="hi">


</div>
<form action="welcome.php" method="POST">
<?php  if(isset($_SESSION['user'])&&!empty($_SESSION['user']) ){
        echo "Hello ".$_SESSION['user']." you are logged in! ";
       } ?><br><br>

Student Name:<input id="s" type="text" name="std">
<span class="error"> <?php echo $std_error;?></span><br><br>
Student Roll:<input id="r" type="text" name="roll">
<span class="error"> <?php echo $roll_error;?></span><br><br>
<input type="submit" value="Submit" id="submit" ><br><br>

 </form>
<div id="del">Want to remove a student from the list?  <a href="delete.php" id="remove" > remove </a></div><br><br>

<a id="log" href="logout.php">logout</a><br><br>
</body>
</html>
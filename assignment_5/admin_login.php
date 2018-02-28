<?php
session_start();
ob_start();
$id=$_SESSION['user'];
$roll=$std=$std_error=$roll_error=$stud_error=$rol_error="";
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
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST["stud"])){
        $stud_error="*please enter student's name";
  }
  else{
    $stud=($_POST["stud"]);
  }
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST["rol"])){
        $rol_error="*please  enter roll number";
  }
  else{
    $rol=($_POST["rol"]);
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

              $mesage= "No students are under you";
              echo "<script type='text/javascript'>alert('$mesage');</script>";
            }
                else{
                 echo '<div style="font-size:30px;text-align:left" >'.$id.'</div>';
                  echo '<div style="font-size:40px;text-align:center" >'."LIST OF STUDENTS ".'</div>';
                 while($query_row=mysqli_fetch_assoc($res) )
                 {
                  $student_name=$query_row['Student_Name'];
                  $student_roll=$query_row['Student_Roll'];
                  echo  '<div style="font-size:25px;text-align:center;color:PURPLE;border:0px solid black;margin-left:350px;margin-right:350px;padding:5px;margin-top:10px;background-color:#FCDFFF;border-radius:5px;" >'.$student_name." - ".$student_roll.'</div>' ;

                 }
}



         if(isset($_SESSION['user'])&&!empty($_SESSION['user'])&&!empty($roll)&&!empty($std)){
         	echo ".";
         
          $wel="INSERT INTO esha (Professor_id,Student_Name,Student_Roll) 
                 VALUES ( '$id','$std','$roll')";
             if (mysqli_query($conn, $wel)) {
                  $messag= "New record created successfully";
                    echo "<script type='text/javascript'>alert('$messag');</script>";
                   header("Location: admin_login.php");}
             else {
                 echo "Error: " . $wel . "<br>" . mysqli_error($conn);}
            } 
                           
         if(isset($_SESSION['user'])&&!empty($_SESSION['user'])&&!empty($rol)&&!empty($stud)){
          
            
              
                      $log="DELETE FROM esha WHERE `Student_Name`='$stud' AND `Student_Roll`='$rol'";
                          
                        
                        if (mysqli_query($conn, $log)) {
                           
                                  $message="Student has been removed from your list if he/she was present";
                                  echo "<script type='text/javascript'>alert('$message');</script>";
                                   header("Location: admin_login.php");
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
<title>Admin Login</title>
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
  font-size: 20px;
  border:black 0px solid;
  margin-top: 3%;
  margin-left: 15%;
  margin-right:15%;
    padding-left:20px;
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

</style>

</head>
<body>
<div id="hi">


</div>
<form action="admin_login.php" method="POST">

      Add a student..
       <br>

Student Name:<input id="s" type="text" name="std">
<span class="error"> <?php echo $std_error;?></span>
Student Roll:<input id="r" type="text" name="roll">
<span class="error"> <?php echo $roll_error;?></span>
<input type="submit" value="Submit" id="submit" ><br><br>

 </form>
<form method="POST">
Remove a student..<br>
Student Name:<input id="s" type="text" name="stud">

Student Roll:<input id="r" type="text" name="rol">

<input type="submit" value="Add" id="submit" ><br><br>

</form>

<a id="log" href="logout.php">logout</a><br><br>
</body>
</html>
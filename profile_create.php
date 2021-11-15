<?php

 include 'config.php';
 include 'security.php';
 session_start();
 $user=$_SESSION['username'];

 //$user_data=check_login();

 /*if(isset($_POST['submit'])){
  $first=$_POST['firstname'];
  $last=$_POST['lastname'];
  $date=$_POST['dob'];
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  $ocup=$_POST['Ocupation'];
  $address=$_POST['address'];
  $mobile=$_POST['mobile'];

   if(isset($_FILES['photo']))
   {
    $img_name=$_FILES['photo']['name'];
    $img_size=$_FILES['photo']['size'];
    $img_path=$_FILES['photo']['tmp_name'];
    $img_error=$_FILES['photo']['error'];

    if($img_error==0){
      $img_upload="img/".$img_name;
      move_uploaded_file($img_path, $img_upload);
    }
   }

  $sql="insert into userinfo values('$first','$last','$date','$username','$password','$ocup','$address','$mobile','$img_name')";
  $result=mysqli_query($mysqli,$sql);
  if($result){
    echo "<script>alert('inserted.')</script>";
    header("Location:login.php");
    die;
  }
  else{
    echo "<script>alert('not inserted.')</script>";
  }
 }*/
  
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>register</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>ADD PROFESSIONAL INFO</h1>
    <div>
    	<form method="POST" action="">
    		<div>
    		<label>Brief intro about yourself:</label>
        <textarea name="intro" id="intro"></textarea>
    		
    	</div>
    	<div>
    		<label>Your work experience:</label>
        <textarea name="experience" id="experience"></textarea>
    	</div>
    	<div>
    		<label>LinkedIn Account</label>
    		<input type="link" name="LinkedIn">
    	</div>
    	<div>
    		<label>Field of interest:</label>
    		<input type="text" name="field" >
    	</div>
      <div>
    		
    		<input type="submit" name="submit">
    	</div>
        </form>
        <p>to login<a href="login.php">login</a></p>s
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
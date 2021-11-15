<?php

 include 'config.php';

 if(isset($_POST['submit'])){
  $first=$_POST['firstname'];
  $last=$_POST['lastname'];
  $date=$_POST['dob'];
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  $ocup=$_POST['Ocupation'];
  $address=$_POST['address'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];

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

  $sql="insert into userinfo values('$first','$last','$date','$username','$password','$ocup','$address','$email','$mobile','$img_name')";
  $result=mysqli_query($mysqli,$sql);
  if($result){
    echo "<script>alert('inserted.')</script>";
    header("Location:login.php");
    die;
  }
  else{
    echo "<script>alert('not inserted.')</script>";
  }
 }
  
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="stylesheet" href="reg.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <section id="main">
        <div id="full">
            <h1>REGISTER</h1>

            <div id="full1">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div id="a">
                        <label>First Name </label>
                        <input type="text" name="firstname">
                    </div>
                    <div id="a">
                        <label>Last Name </label>
                        <input type="text" name="lastname">
                    </div>
                    <div id="a">
                        <label>Date of Birth </label>
                        <input type="date" name="dob">
                    </div>
                    <div id="a">
                        <label>User name </label>
                        <input type="text" name="username" placeholder="Eg:abc@gmail.com">
                    </div>
                    <div id="a">
                        <label>Password </label>
                        <input type="password" name="password">
                    </div>
                    <div id="a">
                        <label>Ocupation </label>
                        <input type="text" name="Ocupation">
                    </div>

                    <div id="a">
                        <label> Address </label>
                        <input type="text" name="address" row=3>
                    </div>

                    <div id="a">
                       <label>Email</label>
                       <input type="text" name="email">
                    </div>

                    <div id="a">
                        <label>Mobile No </label>
                        <input type="text" name="mobile">
                    </div>

                    <div>
                        <input type="file" name="photo" id="img" style="display:none;" />
                        <label class="btn btn-info" for="img">Click me to upload image</label>
                    </div>

                    <div id="a">

                        <input class="btn btn-primary" id="sub" type="submit" name="submit">

                    </div>
                </form>
                <p>to Login <a href="login.php"> Login</a></p>
            </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>
</body>

</html>
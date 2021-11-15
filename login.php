<?php

  include 'config.php';
  session_start();
  if(isset($_POST['submit'])){
    $user=$_POST['username'];
    $password=md5($_POST['password']);
     $_SESSION['username']=$user;
    

    $querry="SELECT * from userinfo where UserName='$user' and Password='$password' ";

    
    $result=$mysqli -> query($querry);
    $row=$result->fetch_assoc();

       if($mysqli -> affected_rows> 0){
        echo "<script>alert('matched.')</script>";
        header("Location:dashboard.php");
        //die;
    }
    else{
      echo "<script>alert('not matched.')</script>";
    }

  }


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="lohit.css">
    <title>Documents</title>
</head>


<body>
    <main>

        <section>
            <div id="div" class="column justify-items-center ">
                <div class="inner">
                    <h1 class="dispaly-1">LOGIN</h1>
                    

                    <div>
                        <form method="POST" action=" ">
                            <label><span>User Name</span></label>
                            <br>
                            <input type="text" name="username" placeholder="Username">
                        
                    
                    <div>
                        <label><span>Password</span></label>
                        <br>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div>
                        <input type="submit" name="submit" class="btn btn-success">
                    </div>
                  </form>
                </div>
                    <div>
                        <p>To Register : <a href="register.php"><span id="sp">Register</span></a></p>
                    </div>
                </div>

            </div>

        </section>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
            crossorigin="anonymous"></script>
    </main>
</body>

</html>
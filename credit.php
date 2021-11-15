<?php

 include 'config.php';
 include 'security.php';
session_start();

  $user_details=check_login($mysqli);
  $user=$_SESSION['username'];

  $dt=date("Y-m-d");

  if(isset($_POST['submit1'])){
    //echo "hi";
    $course=$_POST['coursename'];
    $institution=$_POST['institution'];
    $description=$_POST['description'];
    $course_sdate=$_POST['start_date'];
    $course_edate=$_POST['comp_date'];

    

    if(isset($_FILES['coursecertificate'])){
      //echo "image is there";
      $img_name = $_FILES['coursecertificate']['name'];
      $img_size = $_FILES['coursecertificate']['size'];
      $img_path = $_FILES['coursecertificate']['tmp_name'];
      $img_error= $_FILES['coursecertificate']['error'];


      if($img_error==0){
           $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
           //echo $img_ex;
          // $img_ex_lc = strlower($img_ex);

           $allowed_ex=array('jpg','jpeg');
           if(in_array($img_ex,$allowed_ex)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex;
                $img_upload='img/'.$new_img_name;

                //echo $img_path;
                move_uploaded_file($img_path,$img_upload);

                $sql="insert into usercourses values('$user','$course' ,'$institution','$description','$course_sdate','$course_edate','$new_img_name','$dt')";
                $result= mysqli_query($mysqli,$sql);
                if($result){
                  echo "<script>alert('inserted.')</script>";
                }
                else
                {
                  echo "<script>alert('not inserted.')</script>";
                }
           }
           else
           {
            echo "you cant upload this file";
           }
      }
      else
      {
        echo "<h2>error in loading image</h2>";
      }
    }
    else{
      echo "image not loaded";
    }

  }

  if(isset($_POST['submit2'])){
    $intern=$_POST['internname'];
    $institution=$_POST['company'];
    $intern_description=$_POST['description_intern'];
    $intern_sdate=$_POST['start_date_intern'];
    $intern_edate=$_POST['end_date_intern'];

    if(isset($_FILES['intern_certificate'])){
      //echo "image is there";
      $img_name = $_FILES['intern_certificate']['name'];
      $img_size = $_FILES['intern_certificate']['size'];
      $img_path = $_FILES['intern_certificate']['tmp_name'];
      $img_error= $_FILES['intern_certificate']['error'];

      if($img_error==0){
           $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
           //echo $img_ex;
           //$img_ex_lc = strlower($img_ex);

           $allowed_ex=array('jpg','jpeg');
           if(in_array($img_ex,$allowed_ex)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex;
                $img_upload='img/'.$new_img_name;
                move_uploaded_file($img_path,$img_upload);

                $sql="insert into userinterns values('$user','$institution','$intern_description','$intern_sdate','$intern_edate','$new_img_name','$dt')";
                $result= mysqli_query($mysqli,$sql);
                if($result){
                  echo "<script>alert('inserted.')</script>";
                }
                else
                {
                  echo "<script>alert(' not inserted.')</script>";
                }
           }
           else
           {
            echo "you cant upload this file";
           }
      }
      else
      {
        echo "<h2>error in loading image</h2>";
      }
    }
    else{
      echo "image not loaded";
    }

  }

  if(isset($_POST['submit3'])){
    $project=$_POST['projectname'];
    $domain=$_POST['domain'];
    $project_description=$_POST['description_project'];
    $project_sdate=$_POST['start_date_project'];
    $project_edate=$_POST['end_date_project'];

    $sql="insert into userprojects values('$user','$project','$domain','$project_description','$project_sdate','$project_edate','$dt')";

    $result=mysqli_query($mysqli,$sql);
    if($result){
        echo "<script>alert('inserted.')</script>";
                }
                else
                {
                  echo "<script>alert(' not inserted.')</script>";
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
    <title>add-credits</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css">


    <style type="text/css">
      body{
        background-image: url("images/a.jpg");
        background-repeat: no-repeat;
        background-size: cover;

      }
      .box1{
        width: 70%;
        margin-left: 14%;
      }

       #a{
  transition: 0.2s;
}
#a:hover{
transform: scale(1.05);

}

.box1{
   
    text-align: center;

  padding-top: 10px;

    background-color:white;

     padding: 20px ;
     border-radius: 30px;
     border-width: 5px;
     border: black solid;
      box-shadow:    0 0 20px rgba(0, 0, 0, 0.651);
      margin-top: 150px;
}

input{
  margin-bottom: 15px;
  border: none;
  border-bottom: 1px solid black;
  outline: none;
    text-decoration: none;
    text-decoration: underline none;
    margin-left: 20px;
}
label{
  margin-right: 50px;
}


.panel-heading{
  transition: width 0.5s;
  transition-timing-function: ease-in-out;
}

.panel-heading:hover{
  width: auto;
}

.btn{
  border-radius: 2em ;
}

.active1{
  background-color: ghostwhite;
  transform: scale(1.2);
  color: black;
}


    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="nav navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <h1 class="navbar-header heading" style=" color: ghostwhite ; text-transform: uppercase;">CV MAKER</h1>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navtoggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        </div>
         <div class="collapse navbar-collapse" id="navtoggle">
    <ul class="nav navbar-nav" style="margin-top: 20px">
      <li class=""><a href="dashboard.php" ><i class="glyphicon glyphicon-home"></i>     HOME</a></li>
       <li><a href="profile.php" >PROFILE</a></li>
       <li class="active"><a href="viewprogress.php" >AWARDS</a></li>
       <li><a href="edit_details.php">RESUME</a></li>
        

    </ul>


    

    <ul class="nav navbar-nav navbar-right" style="margin-top: 20px">
      <li><a href="#"><i class="glyphicon glyphicon-user"> <?php echo substr($user,0,8); ?></i></a></li>
      <li class=><a href="#">About Us</a></li>
       <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i></a></li>
      
    </ul>


      </div>

    </nav>
    <h1>Enter your latest achievement: <?php echo $user; ?></h1>
     
     <br>
     <br>
    <div >
      <button class="btn btn-primary col-lg-4 selector" id="course">COURSES</button>
      <button class="btn btn-primary col-lg-4 selector" id ="intern">INTERNSHIP</button>
      <button class="btn btn-primary col-lg-4 selector" id="project">PROJECTS</button>
    </div>
    <hr>

    <div id="courses" class="box1">
      <form method="POST" action="" enctype="multipart/form-data">
        <div id="a">
        <label>course name</label>
        <input type="text" name="coursename">
        </div>
        <div id="a">
        <label>institution</label>
        <input type="text" name="institution">
      </div>
      <div id="a">
        <label>description</label>
        <input type="text" name="description">
        </div>
        <div id="a">
        <label>start-date</label>
        <input type="date" name="start_date">
      </div>
      <div id="a">
        <label>comp-date</label>
        <input type="date" name="comp_date">
      </div>
      <div align="center">
        <input type="file" name="coursecertificate" class="btn btn-info">
      </div>
                    <br>
      <div id="a">

        <input type="submit" name="submit1" id="add3" value="Upload" class="btn btn-success">
      </div>
      </form>
    </div>


    <div id="interns" class="box1">
      <form method="POST" action="" enctype="multipart/form-data">
        <div id="a">
        <label>internship name</label>
        <input type="text" name="internname">
      </div>
      <div id="a">
        <label>institution</label>
        <input type="text" name="company">
      </div>
      <div id="a">
        <label>description</label>
        <input type="text" name="description_intern">
        </div>
        <div id="a">
        <label>start-date</label>
        <input type="date" name="start_date_intern">
      </div>
      <div id="a">
        <label>comp-date</label>
        <input type="date" name="end_date_intern">
      </div>
      <br>
       <div align="center">
        <input type="file" name="intern_certificate" class="btn btn-info">
      </div>
         <br>
       <div id="a">
        <input type="submit" name="submit2" id="add2" class="btn btn-success">
      </div>
      </form>
    </div>
    

   
   

    <div id="projects" class="box1">
      <form method="POST" action="">
        <div id="a">
        <label>project name</label>
        <input type="text" name="projectname">
      </div>
      <div id="a">
        <label>domain</label>
        <input type="text" name="domain">
      </div>
      <div id="a">
        <label>description</label>
        <input type="text" name="description_project">
      </div>
      <div id="a">
        <label>start-date</label>
        <input type="date" name="start_date_project">
      </div>
      <div id="a">
        <label>comp-date</label>
        <input type="date" name="end_date_project">
      </div>
        

        <input type="submit" name="submit3" id="add3" class="btn btn-success">
      </form>
    </div>
   


    <script type="text/javascript">
      $("#courses").hide();
      $("#interns").hide();
      $("#projects").hide();

        $("#course").click(function(){
          $("#courses").show();
          $("#interns").hide();
          $("#projects").hide();
          $("#course").addClass('active1');
          $('#intern').removeClass('active1');
          $('#project').removeClass('active1');
        });

        $("#intern").click(function(){
          $("#interns").show();
          $("#projects").hide();
          $("#courses").hide();
          $("#intern").addClass('active1');
          $('#course').removeClass('active1');
          $('#project').removeClass('active1');
        });

        $("#project").click(function(){
          $("#projects").show();
          $("#interns").hide();
          $("#courses").hide();
          $("#project").addClass('active1');
          $('#intern').removeClass('active1');
          $('#course').removeClass('active1');
        });

        
      </script>

    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
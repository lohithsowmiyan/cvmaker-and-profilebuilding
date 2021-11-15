
<?php

    session_start();
   include 'config.php';
   include 'security.php';

   $user=$_SESSION['username'];

   $user_det=check_login($mysqli);

   $sql="SELECT * from cvdetails WHERE username='$user'";

   $result= $mysqli->query($sql);

   $cv_data=$result ->fetch_assoc();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit-Resume</title>

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
      <li class=""><a href="#" ><i class="glyphicon glyphicon-home"></i>     HOME</a></li>
       <li><a href="profile.php" >PROFILE</a></li>
       <li><a href="viewprogress.php" >AWARDS</a></li>
       <li class="active"><a href="#">RESUME</a></li>
        

    </ul>


    

    <ul class="nav navbar-nav navbar-right" style="margin-top: 20px">
      <li><a href="#"><i class="glyphicon glyphicon-user"> <?php echo substr($user,0,8); ?></i></a></li>
      <li class=><a href="#">About Us</a></li>
       <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i></a></li>
      
    </ul>


      </div>

    </nav>
    <h1>EDIT YOUR RESUME</h1>

    <div>
      <p>ACADEMICS:</p>
      <table class="table table-striped table-hovered">
        <tr>
          <th>SECTION</th>
          <th>VALUE</th>
          <th>EDIT/DELETE</th>
        </tr>
        <tr>
          <td>10TH SCHOOL</td>
          <td> <?php echo $cv_data['tenname']; ?> </td>
          <td>
            <a href="edit_fields.php?field=<?php echo 'tenname'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a>  
          </td>
        </tr>
         <tr>
          <td>10TH MARKS</td>
          <td><?php echo $cv_data['tenmarks']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'tenmarks'; ?>"class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         <tr>
          <td>10TH GRADUATION YEAR</td>
          <td><?php echo $cv_data['tendate']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'tendate'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         <tr>
          <td>12TH SCHOOL</td>
          <td> <?php echo $cv_data['twelvename']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'twelvename'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         <tr>
          <td>12TH MARKS</td>
          <td><?php echo $cv_data['twelvemarks']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'twelvemarks'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         <tr>
          <td>12TH GRADUATION YEAR</td>
          <td><?php echo $cv_data['twelvedate']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'twelvedate'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>

         <tr>
          <td>COLLEGE UG</td>
          <td> <?php echo $cv_data['ugname']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'ugname'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         <tr>
          <td>COLLEGE CGPA</td>
          <td> <?php echo $cv_data['ugmarks']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'ugmarks'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         <tr>
          <td>UG GRADUATION</td>
          <td> <?php echo $cv_data['ugdate']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'ugmarks'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>

      </table>
    </div>

    <br>
    <br>

    <div>
      <p>AWARDS AND ACHIEVEMENTS:</p>
      <table class="table table-striped table-hovered">
        <tr>
          <th>SECTION</th>
          <th>VALUE</th>
          <th>EDIT/DELETE</th>
        </tr>
        <tr>
          <td>COURSE</td>
          <td> <?php echo $cv_data['course1']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'course1'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         
         <tr>
          <td>INTERNSHIPS</td>
          <td> <?php echo $cv_data['intern1']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'intern1'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         <tr>
          <td>PROJECT</td>
          <td> <?php echo $cv_data['project']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'project'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         

      </table>
    </div>
   <br>
   <br>
    <div>
      <p>OTHERS:</p>
      <table class="table table-striped table-hovered">
        <tr>
          <th>SECTION</th>
          <th>VALUE</th>
          <th>EDIT/DELETE</th>
        </tr>
        <tr>
          <td>EXTRA-CURRICULAR ACTIVITIES</td>
          <td> <?php echo $cv_data['extcur']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'extcur'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
        <tr>
          <td>CO-CURRICULAR ACTIVITIES</td>
          <td><?php echo $cv_data['cocur']; ?></td>
          <td><a href="edit_fields.php?field=<?php echo 'cocur'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         
         <tr>
          <td>HOBBY'S</td>
          <td> <?php echo $cv_data['hobby']; ?></td>
          <td> <a href="edit_fields.php?field=<?php echo 'hobby'; ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> EDIT</a> </td>
        </tr>
         

      </table>
    </div>
   <div align="center">
    <a href="generate.php" class="btn btn-success btn-lg" target="generate.php"> GENERATE RESUME </a>
  </div>
  <br>
  <br>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
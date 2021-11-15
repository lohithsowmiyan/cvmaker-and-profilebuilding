<?php

  include 'config.php';
  include 'security.php';
 session_start();
  $user=$_SESSION['username'];

  $sql1="SELECT * FROM userinfo WHERE UserName='$user';";

  $result1=$mysqli->query($sql1);

  $row1=$result1->fetch_assoc();

  $sql2="SELECT * FROM profile WHERE username='$user';";

  $result2=$mysqli->query($sql2);

  $row2=$result2->fetch_assoc();



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style type="text/css"> 
        img{
          width: 150px;
          border-radius: 5em;
          margin-left: 35%;
          margin-bottom: 30px;
        }
        p{
          font-family: 'Source Sans Pro',sans-serif;
          margin-left: 50px;
        }
      </style>
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
       <li class="active"><a href="profile.php" >PROFILE</a></li>
       <li><a href="viewprogress.php" >AWARDS</a></li>
       <li><a href="edit_details.php">RESUME</a></li>
        

    </ul>


    

    <ul class="nav navbar-nav navbar-right" style="margin-top: 20px">
      <li><a href="#"><i class="glyphicon glyphicon-user"> <?php echo substr($user,0,8); ?></i></a></li>
      <li class=><a href="#">About Us</a></li>
       <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i></a></li>
      
    </ul>


      </div>

    </nav>
    <br>

    <div class="bg-primary title" align="center"><h3>My Profile</h3>
     </div>

    <div class="panel panel1 panel-default col-lg-6 col-md-6 col-sm-12">
          <div class="panel-heading" align="center">PERSONAL INFO:</div>
         <div class="panel-body">
          <div class="profile-pic">
           <?php echo '<img src="img/'.$row1['photo'].'" >'; ?>
          </div>
          <hr>
          <div class="bg-danger ">
          <h2 align="center">NAME: 
          <?php echo $row1['First Name']." ".$row1['Last Name']; ?></h2>
            
            <p>DATE OF BIRTH:</p>
            <p>    <?php echo "-------".$row1['DOB'];  ?></p>
            <p>EMAIL: </p>
            <p>    <?php echo "-------".$row1['email'];  ?></p>
            <p>MOBILE:</p> 
              <p>   <?php echo "-------".$row1['mobile'];  ?></p>
      
         <p>OCUPATION: </p>
         <p>   <?php echo "-------".$row1['Ocupation'];  ?></p> 
         <p>ADDRESS: </p>
         <p>   <?php echo "-------".$row1['Address'];  ?></p>
         <br>
       </div>
       </div>
      </div>


     <div class="panel panel-default col-lg-6 col-md-6 col-sm-12 panel2">
      <div class="panel-heading">ADDITIONAL DETAILS</div>
      <div class="panel-body bg-success">
         <p>ABOUT YOURSELF:</p>
         <p> <?php echo "    ".$row2['intro'];  ?></p> 
         <hr>
         <p>FIELD OF INTEREST: </p>
         <p><?php echo "-----".$row2['Field'];  ?> </p>
         <p>EXPERIENCE:</p>
         <p> <?php echo "-----".$row2['intro'];  ?></p>  
         </div>
     </div>
       
    
    
    


    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
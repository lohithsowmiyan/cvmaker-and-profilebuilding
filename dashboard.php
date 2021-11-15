<?php
  session_start();
  include 'config.php';
  include 'security.php';
  include 'checkcv.php';

  $user_details=check_login($mysqli);
  
  $user=$_SESSION['username'];
  $cv=check_cv($mysqli);
  //echo $cv;

  $sql4 =" SELECT COUNT(*) AS number,entry FROM usercourses WHERE username='$user'";

 $result4=$mysqli->query($sql4);

 $chart1="";

 $row4=$result4->fetch_assoc();
 
  $chart1.="{field:'courses', count:".$row4["number"]."}, ";
 

  //$chart1 = substr($chart1, 0, -2);
//second chart

  $sql5 =" SELECT COUNT(*) AS number,entry FROM userinterns WHERE username='$user'";

 $result5=$mysqli->query($sql5);

 

$row5=$result5->fetch_assoc();
 
  $chart1.="{field:'interns', count:".$row5["number"]."}, ";

 // $chart1 = substr($chart1, 0, -2);

//third chart
  $sql6 =" SELECT COUNT(*) AS number,entry FROM userprojects WHERE username='$user' ";

 $result6=$mysqli->query($sql6);



 $row6=$result6->fetch_assoc();
 
  $chart1.="{field:'project', count:".$row6["number"]."}, ";

  $chart1 = substr($chart1, 0, -2);
  //echo $chart1;
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">


   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
      <li class="active"><a href="#" ><i class="glyphicon glyphicon-home"></i>     HOME</a></li>
       <li><a href="profile.php" >PROFILE</a></li>
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

    
    <div class="entry1">
    <h1 align="center">WELCOME HOME!</h1>
    <br>
      <div class="entry2" align="center">
        <p style="font-size: 18px"><?php echo $user; ?></p>
        <br>
        <p>Use this tool to build your profile and create a resume out of it
        </p>
        <p>Check out for cool features</p>
        <p>Start out by adding your details down below</p>
        <br>
      </div>
  </div>
    
    <?php
    $link;
    $heading;
     if($cv==1)
     {
      $link="edit_details.php";
      $heading="EDIT RESUME";
     }

     else
     {
      $link="details.php";
      $heading="ADD CV DETAILS";
     }


    ?>
    <div class="tile1">
    <div class="col-lg-3 col-sm-6 col-xs-12">
    <a  id="linkto" href= <?php echo $link?>>
      <div class="dashboardbox">
        <p class="heading" align="center"> <?php echo $heading ?></p>
        <img src="images/pexels-lukas-590016 (1).jpg" width="247px">
        <hr>
      </div>
    </a>
     </div>

     <div class=" col-lg-3 col-sm-6 col-xs-12">
     <a href="credit.php" id="linkto">
      <div class="dashboardbox">
        <p class="heading" align="center">ADD ACCOMPLISHMENTS</p>
        <img src="images/pexels-kaboompics-com-6357.jpg" width="247px">
        <hr>
      </div>
    </a>
  </div>

     <div class="col-lg-3 col-sm-6 col-xs-12">
    <a href="viewprogress.php" id="linkto">
      <div class="dashboardbox">
        <p class="heading" align="center">VIEW ACCOMPLISHMENTS</p>
        <img src="images/pexels-picjumbocom-210661.jpg" width="247px">
        <hr>
      </div>
    </a>
  </div>
   
    <div class=" col-lg-3 col-sm-6 col-xs-12">
    <a href="generate.php" id="linkto">
      <div class="dashboardbox">
        <p  class="heading" align="center">GENERATE RESUME</p>
        <img src="images/pexels-pixabay-261510.jpg" width="247px">
        <hr>
      </div>
    </a>
  </div>

  <p class="content" align="center"><br><br>Open up new carear oppurturnities by <br>adding your awards</p>
</div>
  <br>
  <br>

   <h2 align="center">YOUR ACTIVITY</h2>
  <div class="tile2">
   
    <br>
    <div id="charthome"></div>
    
  </div>

  <div class="content col-sm-12 col-xs-12">
      <br>      <p class="chartinfo">All your activities are recoreded for proper maintainance of your profile.</p>
    </div>

  <script>
    Morris.Bar({
      element : 'charthome',
      data:[<?php echo $chart1; ?>],
      xkey:'field',
      ykeys:['count'],
      labels:['count'],
      hideHover:'auto',
      stacked:true
    });
  </script>


    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
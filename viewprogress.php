<?php 
 include 'config.php';
 include 'security.php';
 
 session_start();
 
 $user=$_SESSION['username'];
 $user_data=check_login($mysqli);

 $sql1="SELECT * from usercourses WHERE username='$user';";

 $result1=$mysqli->query($sql1);


 $sql2="SELECT * from userinterns WHERE username='$user';";

 $result2=$mysqli->query($sql2);

 $sql3="SELECT * from userprojects WHERE username='$user';";

 $result3=$mysqli->query($sql3);

 //first chart

 $sql4 =" SELECT COUNT(*) AS number,entry FROM usercourses WHERE username='$user' GROUP BY entry;";

 $result4=$mysqli->query($sql4);

 $chart1="";

 while($row4=$result4->fetch_assoc())
 {
  $chart1.="{date:'".$row4["entry"]."', count:".$row4["number"]."}, ";
 }

  $chart1 = substr($chart1, 0, -2);
//second chart

  $sql5 =" SELECT COUNT(*) AS number,entry FROM userinterns WHERE username='$user' GROUP BY entry;";

 $result5=$mysqli->query($sql5);

 $chart2="";

 while($row5=$result5->fetch_assoc())
 {
  $chart2.="{date:'".$row5["entry"]."', count:".$row5["number"]."}, ";
 }

  $chart2 = substr($chart2, 0, -2);

//third chart
  $sql6 =" SELECT COUNT(*) AS number,entry FROM userprojects WHERE username='$user' GROUP BY entry;";

 $result6=$mysqli->query($sql6);

 $chart3="";

 while($row6=$result6->fetch_assoc())
 {
  $chart3.="{date:'".$row6["entry"]."', count:".$row6["number"]."}, ";
 }

  $chart3 = substr($chart3, 0, -2);
  //echo $chart1;

 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>viewprogress</title>     

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!--  HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries   -->
    <!--  WARNING: Respond.js doesn't work if you view the page via file://  -->
    <!--  [if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif] -->

      <style type="text/css">
        img {
          width: 200px;
        }
        .btn{
          border-radius: 2em;
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

    <h1>YOUR PROGRESS</h1>
      
    <div >
      <button class="btn btn-secondary col-lg-4 selector" id="course">COURSES</button>
      <button class="btn btn-secondary col-lg-4 selector" id ="intern">INTERNSHIP</button>
      <button class="btn btn-secondary col-lg-4 selector" id="project">PROJECTS</button>
    </div>
    <br>
    <br>
    <br>

    <div id="courses" align="center">
      
       <?php  
              while($row = $result1 -> fetch_assoc())
              {
                  echo '<div class="info">';

                  //echo "<br> <hr>";

                  echo "<h3> COURSE IN : ".$row['coursename']." BY : ".$row['institution']."</h3>";
                  echo "<br>";

                  echo "<div class='col-lg-6 col-md-6 col-sm-12 col-xm-12'>";

                  echo "<p> TIMING FROM : ".$row['start-date']." TO ".$row['comp-date']." </p>";

                  echo "<br>";

                  echo "<p> DESCRIPTION: </p>";

                  // echo "<br>";

                   echo "<p> ".$row['description']."</p>";

                   echo "</div>";

                   echo "<div class='col-lg-6 col-md-6 col-sm-12 col-xm-12'>";

                   echo "<img src='img/".$row['certificate']."' >";

                   echo "</div>";

                   //echo "<hr>";

                   echo "</div>";

                   echo "<br>";
              }
       ?>

  

    <div id="chart1"></div></div>

    <div id="interns" align="center">
      
       <?php  
              while($row = $result2 -> fetch_assoc())
              {
                  echo "<br> <hr>";

                  echo "<h3> INTERNSHIP WITH : ".$row['company']."</h3>";
                  echo "<br>";

                 echo "<div class='col-lg-6 col-md-6 col-sm-12 col-xm-12'>";

                  echo "<p>  FROM : ".$row['start-date']." TO ".$row['end-date']." </p>";

                  echo "<br>";

                  echo "<p> DESCRIPTION: </p>";

                   

                   echo "<p> ".$row['description']."</p>";

                   echo "</div>";

                  echo "<div class='col-lg-6 col-md-6 col-sm-12 col-xm-12'>";

                   echo "<img src='img/".$row['certificate']."' >";
                   echo "</div>";

                   echo "<br><br>";

                   echo "<hr>";
                   

                   
              }
       ?>

    
    <div id="chart2"></div></div>

    <div id="projects" align="center">
      
       <?php  
              while($row = $result3 -> fetch_assoc())
              {
                  echo "<br> <hr>";

                  echo "<h3> PROJECT NAME : ".$row['project']." ON : ".$row['domain']."</h3>";
                  echo "<br>";

                  echo "<p>  FROM : ".$row['start-date']." TO ".$row['end-date']." </p>";

                  echo "<p> DESCRIPTION: </p>";

                   

                   echo "<p> ".$row['description']."</p>";

                   echo "<hr>";
              }
       ?>

   <div id="chart3"></div> 
   </div>
    

    <script>
Morris.Line({
 element : 'chart1',
 data:[<?php echo $chart1; ?>],
 xkey:'date',
 ykeys:['count'],
 labels:['count'],
 hideHover:'auto',
 stacked:true
});
</script>

<script>
Morris.Line({
 element : 'chart2',
 data:[<?php echo $chart2; ?>],
 xkey:'date',
 ykeys:['count'],
 labels:['count'],
 hideHover:'auto',
 stacked:true
});
</script>


<script>
Morris.Line({
 element : 'chart3',
 data:[<?php echo $chart3; ?>],
 xkey:'date',
 ykeys:['count'],
 labels:['count'],
 hideHover:'auto',
 stacked:true
});
</script>

<script type="text/javascript">
      $("#courses").show();
      $("#interns").hide();
      $("#projects").hide();

        $("#course").click(function(){
          $("#courses").show();
          $("#interns").hide();
          $("#projects").hide();
        });

        $("#intern").click(function(){
          $("#interns").show();
          $("#projects").hide();
          $("#courses").hide();
        });

        $("#project").click(function(){
          $("#projects").show();
          $("#interns").hide();
          $("#courses").hide();
        });

        
      </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
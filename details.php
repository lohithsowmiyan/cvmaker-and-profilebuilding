<?php
  session_start();
 include 'config.php';
 include 'security.php';

 $user_details=check_login($mysqli);

 $user=$_SESSION['username'];

 if(isset($_POST['submit']))
 {
  $tenname=$_POST['tenname'];
  $tenmarks=$_POST['tenmarks'];
  $tendate=$_POST['tendate'];
  $twelvename=$_POST['twelvename'];
  $twelvemarks=$_POST['twelvemarks'];
  $twelvedate=$_POST['twelvedate'];
  $ugname=$_POST['ugname'];
  $uspec=$_POST['ugspec'];
  $ugmarks=$_POST['ugmarks'];
  $ugdate=$_POST['ugdate'];
  $course1=$_POST['course1'];
  $intern1=$_POST['intern1'];
  $project=$_POST['project'];
  $extcur=$_POST['extcur'];
  $cocur=$_POST['cocur'];
  $hobby=$_POST['hobby'];

  $sql1="insert into cvdetails values('$tenname',$tenmarks,'$tendate','$twelvename',$twelvemarks,'$twelvedate','$ugname','$ugspec',$ugmarks,'$ugdate','$course1','$intern1','$project','$extcur','$cocur','$hobby','$user')";

  echo $sql1;

  $result=mysqli_query($mysqli,$sql1);
  if($result){
    
    
    echo "<script>alert('inserted.')</script>";
    header("Location:dashboard.php");
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
    <title>cvdetails</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <style type="text/css">
      body{
        background-image: url("images/pexels-jess-bailey-designs-743986.jpg");
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
       <li><a href="viewprogress.php" >AWARDS</a></li>
       <li class="active"><a href="edit_details.php">RESUME</a></li>
        

    </ul>


    

    <ul class="nav navbar-nav navbar-right" style="margin-top: 20px">
      <li><a href="#"><i class="glyphicon glyphicon-user"> <?php echo substr($user,0,8); ?></i></a></li>
      <li class=><a href="#">About Us</a></li>
       <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i></a></li>
      
    </ul>


      </div>

    </nav>
    <br>

   
    <div class="box1">
    	<form method="POST" action="" id="register_form">
        <ul class="nav nav-tabs">
          <li class="nav-items  active"><a href="#academics" class="nav-link active-tab1 active" id="li_academics">ACADEMICS</a></li>
          <li class="nav-items"><a href="#awards" class="nav-link inactive-tab1" id="li_awards">AWARDS AND ACHIEVEMNETS</a></li>
          <li class="nav-items"><a href="#extra" class="nav-link inactive-tab1" id="li_extra">ACTIVITIES AND SKILLS</a></li>
        </ul>
      <div class="tab-content">
    	<div class="tab-pane active" id="academics">
      <div class="panel panel-default">
        <div class="panel-heading">ACADEMICS</div>
        <div class="panel-body">
      <div class="form-group"  id="a">
    		<label>CLASS 10 School Name</label>
    		<input type="text" name="tenname"  id="tenname">
        <span id="error_tenname" class="text-danger"></span>
    	</div>
    	<div class="form-group" id="a">
    		<label>CLASS 10 School marks</label>
    		<input type="number" name="tenmarks"  id="tenmarks">
        <span id="error_tenmarks" class="text-danger"></span>
    	</div>
    	<div class="form-group" id="a">
    		<label>CLASS 10 year of passing out</label>
    		<input type="text" name="tendate" id="tendate">
        <span id="error_tendate" class="text-danger"></span>
    	</div>
      <hr>

      
      <div class="form-group" id="a">
        <label>CLASS 12 School Name</label>
        <input type="text" name="twelvename" id="twelvename">
        <span id="error_twelvename" class="text-danger"></span>
      </div>
      <div class="form-group" id="a">
        <label>CLASS 12 School marks</label>
        <input type="number" name="twelvemarks" id="twelvemarks">
        <span id="error_twelvemarks" class="text-danger"></span>
      </div>
      <div class="form-group" id="a">
        <label>CLASS 12 year of passing out</label>
        <input type="text" name="twelvedate" id="twelvedate">
        <span id="error_twelvedate" class="text-danger"></span>
      </div>
      <hr>

      <div class="form-group" id="a">
        <label>College Name(UG)</label>
        <input type="text" name="ugname" id="ugname">
        <span id="error_ugname" class="text-danger"></span>
      </div>
       <div class="form-group" id="a">
        <label>College Specialization</label>
        <input type="text" name="ugspec" id="ugspec">
        <span id="error_ugspec" class="text-danger"></span>
      </div>
      <div class="form-group" id="a">
        <label>College CGPA</label>
        <input type="text" name="ugmarks" id="ugmarks">
        <span id="error_ugmarks" class="text-danger"></span>
      </div>
      <div class="form-group" id="a">
        <label> year of UG graduation</label>
        <input type="text" name="ugdate" id="ugdate">
        <span id="error_ugdate" class="text-danger"></span>
      </div>
     <div align="center">
         <button type="button" name="btn_academic_details" id="btn_academic_details" class="btn btn-info btn-lg">Next</button>
        </div>

   </div>
 </div>
</div>
      
   
   <div class="tab-pane fade" id="awards">
      <div class="panel panel-default">
        <div class="panel-heading">AWARDS AND ACHIEVEMENTS</div>
    <div class="panel-body">
    	<div class="form-group" id="a">
    		<label>Course</label>
    		<input type="text" name="course1" id="course1">
        <span id="error_course1" class="text-danger"></span>
    	</div>
      <div class="form-group" id="a">
        <label>Internship</label>
        <input type="text" name="intern1" id="intern1">
        <span id="error_intern1" class="text-danger"></span>
      </div>
      <div class="form-group" id="a">
        <label>Project</label>
        <input type="text" name="project" id="project">
        <span id="error_project" class="text-danger"></span>
      </div>
      <div align="center">
         <button type="button" name="previous_btn_award_details" id="previous_btn_award_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_award_details" id="btn_award_details" class="btn btn-info btn-lg">Next</button>
        </div>
       </div>
     </div>
   </div>


      <div class="tab-pane fade" id="extra" >
        <div class="panel panel-default">
          <div class="panel-heading">SKILLS AND ACTIVITIES</div>
          <div class="panel-body">
       <div class="form-group">
      <label>Extra curricular</label>
       <input type="text" name="extcur" id="extcur">
       <span id="error_extcur" class="text-danger"></span>
       </div>
       <hr>

       <div class="form-group">
      <label>Co-curricular</label>
       <input type="text" name="cocur" id="cocur">
       <span id="error_cocur" class="text-danger"></span>
       </div>
       <hr>
       <div class="form-group">
      <label>hobby</label>
       <input type="text" name="hobby" id="hobby">
       <span id="error_hobby" class="text-danger"></span>
       </div> 
       <div align="center">
         <button type="button" name="previous_btn_extra_details" id="previous_btn_extra_details" class="btn btn-default btn-lg">Previous</button>
         <input type="submit" name="submit" class="btn btn-success btn-lg">
       </div>
     </div>
   </div>
 </div>
</div>
      
        </form>
        
    </div>

    <script>
      $(document).ready(function(){
         $('#btn_academic_details').click(function(){
          var e_tenname="";
          var e_tenmarks="";
          var e_tendate="";
          var e_twelvename="";
          var e_twelvemarks="";
          var e_twelvedate="";
          var e_ugname="";
          var e_ugmarks="";
          var e_ugdate="";
          var e_ugspec="";
          var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

          if($.trim($('#tenname').val()).length == 0)
          {
            e_tenname="Enter School name of Class 10";
            $('#error_tenname').text(e_tenname);
            $('#tenname'),addClass('has-error');
          }
         
         if($.trim($('#tenmarks').val()).length == 0)
         {
            e_tenmarks="Enter marks of Class 10";
            $('#error_tenmarks').text(e_tenmarks);
            $('#tenmarks'),addClass('has-error');
          }
         

        if($.trim($('#tendate').val()).length == 0)
        {
            e_tendate="Enter passed out year of Class 10";
            $('#error_tendate').text(e_tendate);
            $('#tendate'),addClass('has-error');
          }
         

        if($.trim($('#twelvename').val()).length == 0)
        {
            e_twelvename="Enter School name of Class 12";
            $('#error_twelvename').text(e_twelvename);
            $('#twelvename'),addClass('has-error');
          }
         

        if($.trim($('#twelvemarks').val()).length == 0)
        {
            e_twelvemarks="Enter marks of Class 12";
            $('#error_twelvemarks').text(e_twelvemarks);
            $('#twelvemarks'),addClass('has-error');
          }
         

        if($.trim($('#twelvedate').val()).length == 0)
        {
            e_twelvedate="Enter passed out year of Class 12";
            $('#error_twelvedate').text(e_twelvedate);
            $('#twelvedate'),addClass('has-error');
          }
         

        if($.trim($('#ugname').val()).length == 0)
        {
            e_ugname="Enter institution name of UG";
            $('#error_ugname').text(e_ugname);
            $('#ugname'),addClass('has-error');
          }
         

        if($.trim($('#ugspec').val()).length == 0){
            e_ugspec="Enter your scpecialization in of UG";
            $('#error_ugspec').text(e_ugspec);
            $('#ugspec'),addClass('has-error');
          }
         

        if($.trim($('#ugdate').val()).length == 0){
            e_ugdate="Enter graduation year of UG";
            $('#error_ugdate').text(e_ugdate);
            $('#ugdate'),addClass('has-error');
          }

        if(e_tenname=="" && e_tenmarks=="" && e_tendate=="" && e_twelvename=="" && e_twelvemarks=="" && e_twelvedate=="" && e_ugname=="" && e_ugspec=="" && e_ugdate=="")
        {
              $('#li_academics').removeClass('active active_tab1');
              $('#li_academics').removeAttr('href data-toggle');
              $('#academics').removeClass('active');
              $('#li_academics').addClass('inactive_tab1');
              $('#li_awards').removeClass('inactive_tab1');
              $('#li_awards').addClass('active_tab1 active');
              $('#li_awards').attr('href','#awards');
              $('#li_awards').attr('data-toggle', 'tab');
              $('#awards').addClass('active in');  
        }

         });

         $('#previous_btn_award_details').click(function(){
  $('#li_awards').removeClass('active active_tab1');
  $('#li_awards').removeAttr('href data-toggle');
  $('#awards').removeClass('active in');
  $('#li_awards').addClass('inactive_tab1');
  $('#li_academics').removeClass('inactive_tab1');
  $('#li_academics').addClass('active_tab1 active');
  $('#li_academics').attr('href', '#academics');
  $('#li_academics').attr('data-toggle', 'tab');
  $('#academics').addClass('active in');
 });

         $('#btn_award_details').click(function(){
          var e_course1="";
          var e_intern1="";
          var e_project="";

          if($.trim($('#course1').val()).length==0)
          {
            e_course1="Enter the name of the course";
            $('#error_course1').text(e_course1);
            $('#error_course1').addClass('has-error');
          }

          if($.trim($('#intern1').val()).length==0)
          {
            e_intern1="Enter the name of the course";
            $('#error_intern1').text(e_intern1);
            $('#error_intern1').addClass('has-error');
          }

          if($.trim($('#project').val()).length==0)
          {
            e_project="Enter the name of the course";
            $('#error_project').text(e_project);
            $('#error_project').addClass('has-error');
          }

          if(e_course1=="" && e_intern1=="" && e_project=="")
          {
            $('#list_award_details').removeClass('active active_tab1');
            $('#list_award_details').removeAttr('href data-toggle');
            $('#awards').removeClass('active');
            $('#list_award_details').addClass('inactive_tab1');
            $('#list_extra_details').removeClass('inactive_tab1');
            $('#list_extra_details').addClass('active_tab1 active');
            $('#list_extra_details').attr('href', '#extra');
            $('#list_extra_details').attr('data-toggle', 'tab');
            $('#extra').addClass('active in');
          }

         });

          $('#previous_btn_extra_details').click(function(){
         $('#li_extra').removeClass('active active_tab1');
        $('#li_extra').removeAttr('href data-toggle');
        $('#extra').removeClass('active in');
        $('#li_extra').addClass('inactive_tab1');
        $('#li_extra').removeClass('inactive_tab1');
        $('#li_extra').addClass('active_tab1 active');
        $('#li_extra').attr('href', '#academics');
        $('#li_extra').attr('data-toggle', 'tab');
        $('#awards').addClass('active in');

      });

          $('#submit_btn').click(function(){
             
          var e_hobby="";


          if($.trim($('#hobby').val()).length==0)
          {
            e_hobby="Enter your hobby";
            $('#error_hobby').text(e_hobby);
            $('#error_hobby').addClass('has-error');
          }

          if(e_course1=="" && e_intern1=="" && e_project=="")
          {

            $('#submit_btn').attr("disabled", "disabled");
            $(document).css('cursor', 'prgress');
            $("#register_form").submit();

            }


          });

     });
    </script>

    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
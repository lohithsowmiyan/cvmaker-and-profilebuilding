
<?php
 session_start();
 include 'config.php';
 include 'security.php';

 $user=$_SESSION['username'];
 //$user_details=check_login($mysqli);

 if(isset($_GET['field']))
 {
  $field=$_GET['field'];
 }


 $sql1="Select * from cvdetails where username='$user';";
 $result=$mysqli->query($sql1);
 $cv_data=$result->fetch_assoc();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>edit_fields</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="lohit.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="div" class="column justify-items-center">
      <div class="inner">
    <h1 class="display-1" align="center">EDIT</h1>
    <br>
    <br>
    <div>
      <?php echo "<p>Enter new value for $field</p>"; ?>
      <label>OLD VALUE : <?php echo $cv_data[$field]; ?></label>
      
      <br>
      <form method="POST" action=" ">
        <label>NEW VALUE:</label>
        <input type="text" name="new-value" >
      </div>
      <div align="center">
        <br>
        
        <button type="submit"  name="submit" class="btn btn-info btn-lg" >EDIT</button>
      </div>
        </form>
      </div>

        <?php  

         if(isset($_POST['submit']))
         {
            $new=$_POST['new-value'];
            $sql2="UPDATE cvdetails SET $field= '$new' WHERE username='$user'";
            $result2=$mysqli->query($sql2);

            if($mysqli -> affected_rows>-1){
              echo " field edited successfully";
              header("Location:edit_details.php");
            }
            else
            {
              echo "Not able to edit";
            }
         }

        ?>
    </div>
    
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
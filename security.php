<?php
    
function check_login($mysqli)
{
	if(isset($_SESSION['username']))
	{
		$username=$_SESSION['username'];
		$querry="SELECT * from userinfo where UserName='$username'";
    
        $result=$mysqli -> query($querry);
   
        if($mysqli -> affected_rows>-1)
        {
           $user_data=$result -> fetch_assoc();
           return $user_data;
        }
 

	}
	echo "<script>alert('invalid: login again.')</script>";
	header("Location:login.php");
	die;
}




?>
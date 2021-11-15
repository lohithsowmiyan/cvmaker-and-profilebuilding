<?php
   
   function check_cv($mysqli)
{
	if(isset($_SESSION['username']))
	{
		$username=$_SESSION['username'];
		$querry="SELECT * from cvdetails where username='$username'";
    
        $result=$mysqli -> query($querry);
   
        if($mysqli -> affected_rows>0)
        {
           
           return true;
        }
        else
        {
        	return false;
        }
 

	}
	
	return false;
	die;
}

?>
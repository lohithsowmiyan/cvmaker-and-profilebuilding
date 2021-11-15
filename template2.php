<?php
   include 'config.php';
   include 'security.php';

   session_start();
   $user=$_SESSION['username'];

   $user_data=check_login($mysqli);

   $sq1="SELECT * FROM userinfo WHERE UserName='$user';";

   $result1=$mysqli->query($sq1);

   $row1=$result1 -> fetch_assoc();

    $sq2="SELECT * FROM cvdetails WHERE username='$user';";

   $result2=$mysqli->query($sq2);

   $row2=$result2 -> fetch_assoc();

    $sq3="SELECT * FROM cvdetails A,usercourses B WHERE A.username='$user' AND A.course1=B.coursename";

   $result3=$mysqli->query($sq3);

   $row3=$result3 -> fetch_assoc();


   $sq4="SELECT * FROM cvdetails A,userinterns B WHERE A.username='$user' AND A.intern1=B.company";

   $result4=$mysqli->query($sq4);

   $row4=$result4 -> fetch_assoc();


   $sq5="SELECT * FROM cvdetails A,userprojects B WHERE A.username='$user' AND A.project=B.project";

   $result5=$mysqli->query($sq5);

   $row5=$result5 -> fetch_assoc();

   $sql6="SELECT * FROM profile WHERE username='$user';";

   $result6=$mysqli->query($sql6);

   $row6=$result6 -> fetch_assoc();
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;


$dompdf=new Dompdf();
$html='

<html>
<style>


 




</style>


<body>
   <h3>'.$row1['First Name'].' '.$row1['Last Name'].'</h3>
  <h5>'.$row1['Ocupation'].'</h5>
  <div class="container">
     <div class="left">
        <p>Phone : '.$row1['mobile'].'</p>
        <p>E-mail: '.$row1['email'].'</p>
     </div>
     <div class="right" >
        <p>LinkedIn : '.$row6['Linkedin'].'</p>
        
     </div>
     <div><p>'.$row6['intro'].'</p></div>
  </div>

  <div>
    <h5>EXPERIENCE</h5>
    <hr>
    <div><p>'.$row6['experience'].'</p></div>
    <div class="container">
        <div class="left"><p>'.$row4['start-date'].':'.$row4['end-date'].'--Internship with :'.$row4['company'].'</p></div>
        <div class="right">
            
            <p>DESCRIPTION:'.$row4['description'].'</p>
         </div>
     </div>
   </div>

    <div>
    <h5>PROJECTS</h5>
    <hr>
    <div class="container">
        <div class="left"><p>'.$row4['start-date'].':'.$row4['end-date'].'</p></div>
        <div class="right">
            <p>PROJECT NAME: '.$row5['project'].'</p>
            <p>PROJECT DOMAIN: '.$row5['domain'].'</p>
            <p>DESCRIPTION: '.$row4['description'].'</p>
         </div>
     </div>
   </div>

    <div>
    <h5>EDUCATION</h5>
    <hr>
    <div class="container">
    <div class="right">
        <div><h3>'.$row2['tendate'].'</h3></div>
        <div>
            <p>Graduated from '.$row2['tenname'].' with a mark/CGPA: '.$row2['tenmarks'].' </p>
         </div>
     </div>
     <div>
        <div><h3>'.$row2['twelvedate'].'</h3></div>
        <div>
            <p>Graduated from '.$row2['twelvename'].' with a mark/CGPA: '.$row2['twelvemarks'].' </p>
         </div>
     </div>
     <div>
        <div><h3>'.$row2['ugdate'].'</h3></div>
        <div>
            <p>Graduated from '.$row2['ugname'].' in '.$row2['ugspec'].' with a mark/CGPA: '.$row2['ugmarks'].' </p>
         </div>
     </div>
     </div>
     
   </div>


  <div>
    <h5>SKILLS</h5>
    <hr>
    <div>
        <div>
            <p>Paricipated in'.$row2['extcur'].'<p>
            <p>Participated'.$row2['cocur'].'</p>
            <p>HOBBY: '.$row2['hobby'].'</p>
         </div>
     </div>
   </div>
   
   

</body>
</html>';




$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Resume",array('Attachment' => 0));
?>



























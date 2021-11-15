<?php

 include 'config.php';
 include 'security.php';
 session_start();
 $user=$_SESSION['username'];

 $sql1="SELECT * FROM userinfo WHERE UserName='$user';";

 $result1=$mysqli->query($sql1);

 $row1=$result1->fetch_assoc();

 $sql2="SELECT * FROM cvdetails WHERE username='$user';";

 $result2=$mysqli->query($sql2);

 $row2=$result2->fetch_assoc();

 $sql3="SELECT * FROM profile WHERE username='$user';";

 $result3=$mysqli->query($sql3);

 $row3=$result3->fetch_assoc();

 $sql4="SELECT * FROM cvdetails A,usercourses B WHERE A.username='$user' AND A.course1=B.coursename";

   $result4=$mysqli->query($sql4);

   $row4=$result4 -> fetch_assoc();

$sql5="SELECT * FROM cvdetails A,userinterns B WHERE A.username='$user' AND A.intern1=B.company";

   $result5=$mysqli->query($sql5);

   $row5=$result5 -> fetch_assoc();

  $sql6="SELECT * FROM cvdetails A,userprojects B WHERE A.username='$user' AND A.project=B.project";

   $result6=$mysqli->query($sql6);

   $row6=$result6 -> fetch_assoc();

require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();


$html='

<style>
 .table {
width: 100%;
margin-bottom: 1rem;
color: #212529;
}

.table th,
.table td {
padding: 0.75rem;
vertical-align: top;
border-top: 1px solid #dee2e6;
}

.table thead th {
vertical-align: bottom;
border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
border-top: 2px solid #dee2e6;
}

.table-sm th,
.table-sm td {
padding: 0.3rem;
}

.table-bordered {
border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
border-bottom-width: 2px;
}

.table-borderless th,
.table-borderless td,
.table-borderless thead th,
.table-borderless tbody + tbody {
border: 0;
}

.table-striped tbody tr:nth-of-type(odd) {
background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
color: #212529;
background-color: rgba(0, 0, 0, 0.075);
}

.table-primary,
.table-primary > th,
.table-primary > td {
background-color: #b8daff;
}

.table-primary th,
.table-primary td,
.table-primary thead th,
.table-primary tbody + tbody {
border-color: #7abaff;
}

.table-hover .table-primary:hover {
background-color: #9fcdff;
}

.table-hover .table-primary:hover > td,
.table-hover .table-primary:hover > th {
background-color: #9fcdff;
}

.table-secondary,
.table-secondary > th,
.table-secondary > td {
background-color: #d6d8db;
}

.table-secondary th,
.table-secondary td,
.table-secondary thead th,
.table-secondary tbody + tbody {
border-color: #b3b7bb;
}

.table-hover .table-secondary:hover {
background-color: #c8cbcf;
}

.table-hover .table-secondary:hover > td,
.table-hover .table-secondary:hover > th {
background-color: #c8cbcf;
}

.table-success,
.table-success > th,
.table-success > td {
background-color: #c3e6cb;
}

.table-success th,
.table-success td,
.table-success thead th,
.table-success tbody + tbody {
border-color: #8fd19e;
}

.table-hover .table-success:hover {
background-color: #b1dfbb;
}

.table-hover .table-success:hover > td,
.table-hover .table-success:hover > th {
background-color: #b1dfbb;
}

.table-info,
.table-info > th,
.table-info > td {
background-color: #bee5eb;
}

.table-info th,
.table-info td,
.table-info thead th,
.table-info tbody + tbody {
border-color: #86cfda;
}

.table-hover .table-info:hover {
background-color: #abdde5;
}

.table-hover .table-info:hover > td,
.table-hover .table-info:hover > th {
background-color: #abdde5;
}

.table-warning,
.table-warning > th,
.table-warning > td {
background-color: #ffeeba;
}

.table-warning th,
.table-warning td,
.table-warning thead th,
.table-warning tbody + tbody {
border-color: #ffdf7e;
}

.table-hover .table-warning:hover {
background-color: #ffe8a1;
}

.table-hover .table-warning:hover > td,
.table-hover .table-warning:hover > th {
background-color: #ffe8a1;
}

.table-danger,
.table-danger > th,
.table-danger > td {
background-color: #f5c6cb;
}

.table-danger th,
.table-danger td,
.table-danger thead th,
.table-danger tbody + tbody {
border-color: #ed969e;
}

.table-hover .table-danger:hover {
background-color: #f1b0b7;
}

.table-hover .table-danger:hover > td,
.table-hover .table-danger:hover > th {
background-color: #f1b0b7;
}

.table-light,
.table-light > th,
.table-light > td {
background-color: #fdfdfe;
}

.table-light th,
.table-light td,
.table-light thead th,
.table-light tbody + tbody {
border-color: #fbfcfc;
}

.table-hover .table-light:hover {
background-color: #ececf6;
}

.table-hover .table-light:hover > td,
.table-hover .table-light:hover > th {
background-color: #ececf6;
}

.table-dark,
.table-dark > th,
.table-dark > td {
background-color: #c6c8ca;
}

.table-dark th,
.table-dark td,
.table-dark thead th,
.table-dark tbody + tbody {
border-color: #95999c;
}

.table-hover .table-dark:hover {
background-color: #b9bbbe;
}

.table-hover .table-dark:hover > td,
.table-hover .table-dark:hover > th {
background-color: #b9bbbe;
}

.table-active,
.table-active > th,
.table-active > td {
background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover {
background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover > td,
.table-hover .table-active:hover > th {
background-color: rgba(0, 0, 0, 0.075);
}

.table .thead-dark th {
color: #fff;
background-color: #343a40;
border-color: #454d55;
}

.table .thead-light th {
color: #495057;
background-color: #e9ecef;
border-color: #dee2e6;
}

.table-dark {
color: #fff;
background-color: #343a40;
}

.table-dark th,
.table-dark td,
.table-dark thead th {
border-color: #454d55;
}

.table-dark.table-bordered {
border: 0;
}

.table-dark.table-striped tbody tr:nth-of-type(odd) {
background-color: rgba(255, 255, 255, 0.05);
}

.table-dark.table-hover tbody tr:hover {
color: #fff;
background-color: rgba(255, 255, 255, 0.075);
}

@media (max-width: 575.98px) {
.table-responsive-sm {
display: block;
width: 100%;
overflow-x: auto;
-webkit-overflow-scrolling: touch;
}
.table-responsive-sm > .table-bordered {
border: 0;
}
}

@media (max-width: 767.98px) {
.table-responsive-md {
display: block;
width: 100%;
overflow-x: auto;
-webkit-overflow-scrolling: touch;
}
.table-responsive-md > .table-bordered {
border: 0;
}
}

@media (max-width: 991.98px) {
.table-responsive-lg {
display: block;
width: 100%;
overflow-x: auto;
-webkit-overflow-scrolling: touch;
}
.table-responsive-lg > .table-bordered {
border: 0;
}
}

@media (max-width: 1199.98px) {
.table-responsive-xl {
display: block;
width: 100%;
overflow-x: auto;
-webkit-overflow-scrolling: touch;
}
.table-responsive-xl > .table-bordered {
border: 0;
}
}

.table-responsive {
display: block;
width: 100%;
overflow-x: auto;
-webkit-overflow-scrolling: touch;
}

.table-responsive > .table-bordered {
border: 0;
}

.table-responsive {
display: block;
width: 100%;
overflow-x: auto;
-webkit-overflow-scrolling: touch;
}

.table-responsive > .table-bordered {
border: 0;
}
</style>
    <div>
      <div >
        <h3>'.$row1['First Name'].'    '.$row1['Last Name'].'</h3>
        <p> '.$row1['Address'].'</p>
        <p> EMAIL:'.$row1['email'].'</p>
        <p> PHONE: '.$row1['mobile'].'</p>
        <p> LINKED IN:'.$row3['Linkedin'].'</p>        
        <br>
      </div>

      <div >
        <h4>EDUCATIONAL DETAILS</h4>
        <table class="table table-striped">
          <tr>
            <th>Degree</th>
            <th>Institution</th>
            <th>Marks/CGPA</th>
            <th>Year of Graduation</th>
          </tr>
          <tr>
            <td>'.$row1['Ocupation'].'</td>
            <td>'.$row2['ugname'].'</td>
            <td>'.$row2['ugmarks'].'</td>
            <td>'.$row2['ugdate'].'</td>
          </tr>

          <tr>
            <td>CLass 12</td>
            <td>'.$row2['twelvename'].'</td>
            <td>'.$row2['twelvemarks'].'</td>
            <td>'.$row2['twelvedate'].'</td>
          </tr>

          <tr>
            <td>Class 10</td>
            <td>'.$row2['tenname'].'</td>
             <td>'.$row2['tenmarks'].'</td>
            <td>'.$row2['tendate'].'</td>
          </tr>
        </table>
        
      </div>
       <p>*as of '.date("d-m-Y").'</p>

      <div >
        <h4>COURSES AND CERTIFICATIONS</h4>
        
          <h4>'.$row2['course1'].':</h4>
          <p>----'.$row4['description'].'</p>
         
          
      
        <h4>'.$row2['intern1'].':</h4>
          
          <p>----'.$row5['description'].'</p>
          

        <h4>'.$row2['project'].':</h4>

        <p>----'.$row6['description'].'</p>
          
          
          <br>

      
      </div>

      <div >
        
          <p>EXTRA CURRICULAR ACTIVITIES:</p>
          
          <p>'.$row2['extcur'].'</p>
          
          <p>CO-CURRICULAR ACTIVITIES:<p>
          
          <p>'.$row2['cocur'].'</p>
          
          <p>HOBBYS:<p>
          
          <p>'.$row2['hobby'].'</p>
          
     
      </div>
    </div>
 ';



$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Resume",array('Attachment' => 0));


?>
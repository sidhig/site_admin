<?php
error_reporting(0);
session_start();
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else
{
	$user= $_SESSION['admin'];
}
if($_GET['redirect']=="true")
{
  $main_query= $conn->query("Select tbl_employee.id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name,tbl_site_attendace.induction_no,tbl_site_attendace.trade,tbl_site_attendace.id as attendance_id,tbl_site_attendace.employees_location,tbl_site_attendace.no_of_worker,tbl_site_attendace.today_date,tbl_site_attendace.project_id,tbl_site_attendace.today_date FROM tbl_employee JOIN tbl_site_attendace ON tbl_employee.id = tbl_site_attendace.induction_no JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid where tbl_employer.company_name='".$_GET['e']."' AND today_date='".$_GET['d']."' AND tbl_site_attendace.project_id='".$_SESSION['admin']."'  ORDER BY today_date DESC");
}
else{
$main_query= $conn->query("Select tbl_employee.id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name,tbl_site_attendace.induction_no,tbl_site_attendace.project_id,tbl_site_attendace.trade,tbl_site_attendace.id as attendance_id,tbl_site_attendace.employees_location,tbl_site_attendace.no_of_worker,tbl_site_attendace.today_date FROM tbl_employee JOIN tbl_site_attendace ON tbl_employee.id = tbl_site_attendace.induction_no JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid where tbl_site_attendace.project_id='".$_SESSION['admin']."' ORDER BY today_date DESC");



}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>



<head>
<header>
 <? include('header.php'); ?>
 <? include('test_side2.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
<!--     <script src="js/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>

<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">


	<div id="container">
	
       <div class="wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: 30vh 0 0 -200px;*/
    top: 24vh;
    left: 22vw;
    width: 65%">

    		<div class="Form_name" style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#6495ED	 ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2; background-color: #696969">APPROVED SITE ATTENDANCE 
			</div>
			
			 <table  class="table table-hover" style= "border: 1px solid rgba(128, 128, 128, 0.57);"">
        <tr style="background-color: #696969; color: white">
            <th>Induction Number</th>
            <th>Employer/Business Name</th>
            <th>Created Date</th>
            <th style="text-align: left;">Review</th>

        </tr>

         <tbody style="" id='user'>
              <?

              while($row=$main_query->fetch_object())
                {?>
              
              <tr style="background-color: #F0FFFF; font-size: 15px"> 
              
                <td><? $value= str_pad($row->induction_no, 4, '0', STR_PAD_LEFT); echo $value; ?></td>
                <td><? echo $row->company_name?></td>
                <td><? echo $row->today_date?></td>
                <td>
                  <form id="site_attendance_form<?=$row->attendacne_id?>" method="post" action="site_attendance_approved_form.php" >
                  <input type="hidden"  name="attendance_form" value="<?=$row->attendance_id?>" />
                  <input type="submit" class="btn btn-primary" class="button edit_click1" value="Review Form" style="cursor:pointer; width:80%" /> 
                </form>  
                </td>
               
              </tr>

             <? } ?>
          </tbody> 
      </table>

   

      </div> <!-- wrapper close -->
     
        

</div><!--container close-->
	


</body>
<footer>
  <? include("footer.php"); ?>
<footer>
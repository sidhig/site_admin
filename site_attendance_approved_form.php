<?php

session_start();
error_reporting(0);
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else

{
	$user= $_SESSION['admin'];
}

if(isset($_REQUEST['set']))
{
	header("location:approved_forms.php");
}
 
 $id= $_POST['attendance_form'];
 $get_query=$conn->query("Select tbl_employee.id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name,tbl_site_attendace.induction_no,tbl_site_attendace.trade,tbl_site_attendace.id as attendance_id,tbl_site_attendace.employees_location,tbl_site_attendace.no_of_worker,tbl_site_attendace.today_date FROM tbl_employee JOIN tbl_site_attendace ON tbl_employee.id = tbl_site_attendace.induction_no JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid AND tbl_site_attendace.id='".$id."' ORDER BY today_date DESC")->fetch_object();


if(isset($_POST['back'])== true)
{
	?>
	<script>
		window.location.href="site_attendance_approved.php"
	</script>
	<?
}






?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<head>
<header>
 <? include('header.php'); ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">



</header>


<div class="Main_Form" style="float: left; background-color: white; width: auto; border: solid 1px black; border-radius: 10px; margin-left: 12%;">
	
 <center>

<div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>APPROVED SITE ATTENDANCE FORM</legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Induction No.</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
  <input  name="first_name" placeholder="Induction Number" class="form-control"  type="text" value="<? $value= str_pad($get_query->induction_no, 4, '0', STR_PAD_LEFT); echo $value; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Employer/Business Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $get_query->company_name; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Subcontractor Name</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="email" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? echo $get_query->given_name." ".$get_query->name; ?>" readonly>
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Mobile No. #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="<? echo $get_query->contact_phone; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Trade</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
  <input name="address" placeholder="Address" class="form-control" type="text" value="<? echo $get_query->trade ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">Email Address</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="city" placeholder="Enail Address" class="form-control"  type="text" value="<? echo $get_query->email_add?>" readonly>
    </div>
  </div>
</div>

<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Date</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      
  <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo $get_query->today_date; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Number of Workers on Site</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
  <input name="zip" placeholder="No. of Workers" class="form-control"  type="text" value="<? echo $get_query->no_of_worker ?>" readonly>
    </div>
</div>
</div>

<!-- Text input-->
<!-- <div class="form-group">
  <label class="col-md-4 control-label">Location and Activities per Worker </label>  
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  <input name="website" placeholder="Website or domain name" class="form-control" type="text">
    </div>
  </div>
</div> -->

<!-- radio checks -->


<!-- Text area -->
  
<div class="form-group">
  <label class="col-md-4 control-label">Location and Activities per Worker</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        	<textarea class="form-control" name="comment" placeholder="Project Description" style="height: 100px;width: 400px" readonly><? echo $get_query->company_name ?>&nbsphas:&nbsp<?echo $get_query->no_of_worker?>&nbspMen Onsite<? echo "\r\n" ?><? echo $get_query->trade ?> </textarea>
  </div>
  </div>
</div>

<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="submit" class="btn btn-warning" value="Back to Site Attendance Forms" name="back"> <span class="glyphicon glyphicon-share-alt"></span></input>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->



</center>        
</div> 
 
  <style> 
 input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input[type="number"] {
    -moz-appearance: textfield;
}

input[type="date"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    margin: 0;
}


</style>

<footer>
  <? include("footer.php"); ?>
<footer>

	    				
          
					
							
						        
					



	    						
	    			
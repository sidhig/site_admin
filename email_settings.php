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
$get_email= $conn->query("Select * from tbl_setting")->fetch_object();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
 <script type="text/javascript" src=js/validation_site_induction.js></script>




<head>
<header>
 <? include('header.php'); ?>
 <? include('test_side.php'); ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>
</head>

<body>
	<div class="container">
			 <div class="wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: -220px 0 0 -200px;*/
    margin-top: -25vh;
    top: 52vh;
    left:30vw;
    width: 60%;background-color: #AEB6BF   ;border-radius: 4px">

    		<div class="row">
    
    		<h1 class="text-center"> <span class="label label-default">Email Settings</span></h1>
    
  			</div>
  			<form>
  			<div class="row">
    		<div class="col-sm-8 form-group" style="margin:10px" >
								<h4><span class="label label-info">Email ID Registered</span></h4>
								<script>
								$( document ).ready(function() {
								    if($('#email2').val()=="")
								    {
								    	  $("#email2").val("No Email Registered");
								    }
								    
								});
								</script>
								<input type="text" id="email2" placeholder="Enter First Name Here.." class="form-control" value="<? echo $get_email->induction_mail ?>" readonly>
								
							</div>
    
  			</div>
  			<div class="row">
    
    		<h1 class="text-center"><a href="#myModal" role="button" class="btn btn-success btn-md" data-toggle="modal">Register New Email ID</a></h1>
    
  			</div>
  			</form>


</div> <!-- Wrapper Close -->
</div>  <!-- Conatiner Close -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">We'd Love to Register New Email ID</h3>
      </div>
      <div class="modal-body" style="height: 80px">
        <form class="form-horizontal col-sm-12" method="POST">
        
         
          <div class="form-group"><label>E-Mail</label><input id="email" class="form-control email" placeholder="email@you.com (so that we can register you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text"></div>
      
          <div class="form-group"><input type= "button"  value="Register!" onclick = "email_validate()" class="btn btn-success pull-right" > <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
        </form>
      </div>
      <div class="modal-footer">
        <button id= "cancel" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
    </div>
  </div>
</div>


</body>


 <script>
 	function email_validate()
 	 {

    var x = document.getElementById('email').value;
    var dataString = 'name1='+ x;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert ("Not a valid e-mail address");
       
    }
    else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "ajax_new_email.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
window.location.href='email_settings.php';
}
});
}

}
 </script>
    
  
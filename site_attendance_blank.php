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



 $get_query=$conn->query("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE inducted_by IS NOT NULL AND inducted_by != '' order by tbl_induction_register.id desc");

if(isset($_POST['insert']))
{

  $insert_query= $conn->query("insert into tbl_site_attendace set 
                    induction_no = '".trim($_POST['induction_no'])."',
                    trade= '".$_POST['trade']."',
                    project_id='".$_SESSION['admin']."',
                    employees_location= '".$_POST['comment']."',
                    no_of_worker= '".$_POST['no_worker']."',
                    today_date= CURDATE(),
                    created=now(),
                    updated=now()");
      if($insert_query)
      {
        ?>
        <script>
         alert("You Have Successfully Submitted Attendance");
                  window.location.href='site_attendance_approved.php';
        </script>
        <?
      }
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
<script>
  $(document).ready(function(){
     $(".details").hide();
     }); 

</script>

    <form class="well form-horizontal" action="" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>BLANK SITE ATTENDANCE FORM</legend>

<!-- Text input-->

<div class="form-group">
   <label class="col-md-4 control-label">Induction No.</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="state" class="form-control selectpicker" onchange="select_induction()" id="induction">
      <option value=" " >Please Select Induction Number</option>
     <? while($row= $get_query->fetch_object()){ ?>
     <option value="<? echo $row->id?>"> <? $value= str_pad($row->id, 4, '0', STR_PAD_LEFT); echo $value; ?></option>
     <?} ?>
    </select>
    <script>
     function select_induction() {
                    $(".details").hide();
                    $("#verify_btn").show();
                    $("#pin_div").show();
                    $("#pin_enter").val("");
                    
                   var e = document.getElementById("induction");
                   var strUser2 = e.options[e.selectedIndex].value;
                  // alert(strUser2);
                  $.ajax({
                      type: "POST",
                      url: "ajax_attendance_pin.php",
                      data: {
                          value_ajax: strUser2
                      },

                      success: function(data) {
                        // document.write(data);
                        var val_b = data.split(",");
                        var pin_db= val_b[6];
                        var employer = val_b[62];
                        var given_name = val_b[15];
                        var mobile_no = val_b[17];
                        var trade = val_b[19];
                        var email = val_b[20];
                       
                        $('#pin_db').val(pin_db);
                        $('#employer_name').val(employer);
                        $('#subcontractor_name').val(given_name);
                        $('#phone').val(mobile_no);
                        $('#trade').val(trade);
                        $('#email').val(email);
                        $('#induction_no').val(strUser2);
                        

                      

                        
                     }     
                  });


                 }
            </script>
  </div>
</div>
  <div id="pin_div">
<label class="col-sm-3 control-label" style="text-align: left; width: 70px">PIN</label>  
  <div class="col-md-3 inputGroupContainer" style="">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
  <input  name="first_name" placeholder="Enter a Valid Pin" class="form-control" id="pin_enter" type="password" value="">
  <input type="hidden" name="" value="" id="pin_db">
   <input type="hidden" name="induction_no" value="" id="induction_no">
    </div>
  </div>
</div>
</div>
<script>
function check_pin()
{
  
  
  $pin_entered= document.getElementById('pin_enter').value;
  $pin_db_return= document.getElementById('pin_db').value;
  if($pin_entered=="")
  {
    alert ("Please Fill the password");
  }
  else
  {
  if($pin_entered == $pin_db_return)
  {
    $(".details").show(); 
     $("#verify_btn").hide();
     $("#pin_div").hide();
     $('#no_worker').focus();
  }
  else
  {
   $(".details").hide();
   alert("Not a valid Induction OR Password");  
  }

}
}
</script>


<!-- Verify Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="Button" class="btn btn-danger" value="Verify" id="verify_btn"  onclick="check_pin()"></input>
  </div>
</div>
<!-- Text input-->
<div class="details">

<div class="form-group">
  <label class="col-md-4 control-label">Employer/Business Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control" id="employer_name" type="text" value="" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Subcontractor Name</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="email" placeholder="Subcontractor Name" class="form-control"  type="text" id="subcontractor_name" value="" readonly>
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Mobile No. #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="" id="phone" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Trade</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
  <input  placeholder="Address" class="form-control" name="trade" id="trade" type="text" value="" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">Email Address</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="city" placeholder="Enail Address" class="form-control" name="name" id="email"  type="text" value="" readonly>
    </div>
  </div>
</div>

<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Date</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      
  <input  id="date_show" placeholder="Date" class="form-control" name="date_today"  type="text" value="<? echo date("d/m/y"); ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Number of Workers on Site</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
  <input placeholder="No. of Workers" class="form-control" id="no_worker" name="no_worker"  type="text" value="" required>
    </div>
    <script>
  $(document).ready(function(){

    $('#show_men').hide();
   $('#no_worker').keyup(function() {
      if ($(this).val().length > 0) 
{       var emp = $('#employer_name').val();
   
         $('#show_men').slideDown('fast');
         $('#show_men').html(emp+" "+"has"+" "+$(this).val()+" "+"Men Onsite");
       }
      else 
         $('#show_men').hide();
   });
});




    </script>

</div>
</div>
<label name="" id="show_men" style="display: hidden"> </label>


<!-- Text area -->
  
<div class="form-group">
  <label class="col-md-4 control-label">Location and Activities per Worker</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        	<textarea class="form-control" name="comment" placeholder="3 men working in the main warehouse pouring slab 27
3 men digging the stormwater trench to main carpark 
2 men installing bollards to doorways D38 & D36" style="height: 100px;width: 400px" required></textarea>
  </div>
  </div>
</div>

<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="submit" class="btn btn-success" value="Submit The Attendance" name="insert"> <span class="glyphicon glyphicon-share-alt"></span></input>
  </div>
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

	    				
          
					
							
						        
					



	    						
	    			
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

// if(isset($_POST['selected_week_btn']) == true)
// {
//   $start_date= $_POST['start_date'];
//   $end_date=$_POST['end_date'];
// }

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
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 
<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>
</head>

<body  onload="select_week()">
  <!-- <script> body.onload = function() {select_week()};</script> -->
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
    
    		<h1 class="text-center"> <span class="label label-default">Site Attendance Register (Weekly)</span></h1>
    
  			</div>
  			<form  method="POST" action="site_attendance_comments.php">
        <input type="hidden"  name="start_date_week" id="form_start_date" value="" />
        <input type="hidden"  name="end_date_week" id="form_end_date" value="" />
  			<div class="row">
    		<div class="col-sm-4 form-group" style="margin:10px" >
                <?
                $ddate = date("Y-m-d");
                $date = new DateTime($ddate);
                $week = $date->format("W");
                
                ?>
								<h4><span class="label label-info">Please Select The Week</span></h4>
						  
								<select class="form-control" style="width: 80px" id="week_number" onchange="select_week()">
             
                <? 
                    for($i=1;$i<=$week;$i++)
                    {
                    ?>
                    <option value="<? echo $i ?>"> <? $month=str_pad($i, 2, '0', STR_PAD_LEFT); echo $month ?></option>
                    <?
                    }

                ?>
                        
                </select>
                <script>
               
                  function select_week() {
                   var e = document.getElementById("week_number");
                   var strUser = e.options[e.selectedIndex].value;
                    $.ajax({
                      type: "POST",
                      url: "ajax_getdate_week_attendance.php",
                      data: {text1: strUser},

                      success: function(data) {
                         
                         var res = data.split(",");
                         document.getElementById("start_date").value = res[0];
                         document.getElementById("form_start_date").value = res[0];
                         document.getElementById("form_end_date").value = res[1];
                         document.getElementById("end_date").value = res[1];
                         
                     }
                  });
                  }
                
                  </script>
                 

            </div>
								<div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Week Start Date:</span></h4>
                  <input type="text" id="start_date" placeholder="Week Start Date" name="start_date_week" class="form-control" value="" readonly>

							</div>
                <div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Week End Date:</span></h4>
                  <input type="text" id="end_date" placeholder="Week End Date" name="end_date_week" class="form-control" value="" readonly>

              </div>
              
               
                  <h5 class="text-center"><input type="submit" name="selected_week_btn" value="View Report" class="btn btn-primary btn-danger" style="border-radius: 10px"></h5>
          </div>
        </form >
          <div class="h-divider">
          </div>
         <form method="POST" action="site_attendance_comments.php">
         <input type="hidden"  name="start_date_week" id="form_start_date_current" value="" />
        <input type="hidden"  name="end_date_week" id="form_end_date_current" value="" />
          <div class="row" align="center">
            <div class="col-sm-12 form-group" style="margin:10px" >
                              <h4><span class="label label-warning">Current Week:</span></h4>
                              <input type="text" id="current_week" style="width: 430px"  class="form-control" value="" readonly>

            </div>
    <?        
    $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
    $friday = date( 'Y-m-d', strtotime( 'sunday this week' ) );
    ?>
    <script>
      document.getElementById("form_start_date_current").value = "<? echo $monday ?>";
      document.getElementById("form_end_date_current").value = "<? echo $friday ?>";
      document.getElementById("current_week").value = "<? echo $monday ?>"+" ---TO--- "+"<? echo $friday ?>";
      var div= document.getElementById("current_week");
       div.style.textAlign = "center";
       div.style.fontWeight = "bolder";
    </script>
            </div>
             <h5 class="text-center"><input type="submit" name="generate" value="View Report" class="btn btn-primary btn-danger" style="border-radius: 10px"></h5>
    
  			
        
  		
  			</form>


</div> <!-- Wrapper Close -->
</div>  <!-- Conatiner Close -->



</body>


 
 <style>
   
   @import url("http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css");

   .h-divider{
 margin-top:5px;
 margin-bottom:5px;
 height:1px;
 width:100%;
 border-top:1px solid gray;
}
 </style>   
  
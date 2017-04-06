<?php

session_start();
error_reporting(0);
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
// else if(!isset($_SESSION['login_user_induction']))
// {
// 	header("location:login_site_induction_form.php");
// }
else
{
	$user= $_SESSION['admin'];
}

$obj=$conn->query("Select * FROM tbl_project WHERE id ='".$_SESSION['admin']."'")->fetch_object();
$obj2=$conn->query("Select MAX(id)+1 AS 'id' FROM tbl_induction_register")->fetch_object();
$obj3=$conn->query("select tbl_access.id,name from tbl_project_register left join tbl_access on tbl_project_register.access_id = tbl_access.id where tbl_project_register.project_id = '".$_SESSION['admin']."' group by access_id");
$obj4=$conn->query("Select * FROM tbl_employer");
$obj6=$conn->query("Select tbl_employee.id,concat(tbl_employee.given_name ,' ',tbl_employee.surname) as name,tbl_employer.company_name FROM tbl_employee left join tbl_employer on  tbl_employee.employer_id = tbl_employer.id where tbl_employer.id is not null");

if(isset($_POST['set']) && !empty($_POST['set']) )
{

		// Insert Table Employee Details
		if(!empty($_POST['medical_check']))
		{
			$medical_check= 1;
			$medical_details= $_POST['medical_detail'];
		}
		else
		{
			$medical_check= 0;
			$medical_details= "";
		}
		if(!empty($_POST['check_gcic']))
		{
			$gcic_check= 1;
		}
		else
		{
			$gcic_check= 0;
		}
$induction_id = $_POST['induction_number'];
	// $induction_id = '786';	
$empe_name= $_POST['empe_name'];
$empe_surname= $_POST['empe_surname'];
$empe_add=$_POST['empe_add'];
$empe_dob=$_POST['empe_dob'];
$empe_contact=$_POST['empe_contact'];
$empe_occupation=$_POST['empe_occupation'];
$empe_position=$_POST['empe_position'];
$empe_email=$_POST['empe_email'];
$empe_emrg_name=$_POST['empe_emrg_name'];
$employer_name= $_POST['select_employer'];
//get employer_id by name
$get_emp_name=  $conn->query("Select id from tbl_employer where company_name='".$employer_name."'")->fetch_object();
$employer_id= $get_emp_name->id;
$empe_emrg_number=$_POST['empe_emrg_number'];
$empe_emrg_relation=$_POST['empe_emrg_relation'];
$qry_employee = $conn->query("insert into tbl_employee set 
                    given_name = '".trim(mysqli_real_escape_string($conn,$empe_name))."',
                    surname = '".trim(mysqli_real_escape_string($conn,$empe_surname))."',
                    address = '".trim(mysqli_real_escape_string($conn,$empe_add))."',
                    DOB = '".trim($empe_dob)."',
                    contact_phone = '".trim($empe_contact)."',
                    occupation = '".trim($empe_occupation)."',
                    job_title = '".trim($empe_position)."',
                    emrg_contact_name = '".trim($empe_emrg_name)."',
                    emrg_contact_phone  = '".trim($empe_emrg_number)."',
                    emrg_contact_relation = '".trim($empe_emrg_relation)."',
                    employer_id = '".trim($employer_id)."',
                    medical_condition = '".trim($medical_check)."',
                    medical_condition_desc = '".trim($medical_details)."',
                    id='".$induction_id."',
                    pin=  '".$_POST['pin_value']."',
                    gcic_issue_date= '".$_POST['gcic_issue']."',
                    is_gcic= '".$gcic_check."',
                    itp_name= '".$_POST['provider_name']."',
                    inductioncard= '".$_POST['card_number']."',
                   	created_date=now(),
                    modified_date=now(),
                    email_add = '".trim($empe_email)."'");
                     $err1 = "Employee ".$empe_name." Created.";

   

  //Insert Site Induction Register

   
$qry_induction_register = $conn->query("insert into tbl_induction_register set 
                    id = '".$induction_id."',
                    project_id = '".$_SESSION['admin']."',
                    induction_date= date(now()),
                    empid='".$employer_id."',
                    induction_card_no= '".$_POST['card_number']."',
                    pincode='1234',
                    created_date=now(),
                    modified_date=now(),
                    signature=   '".$_POST['sign_div_hidden']."'");


                    
// Insert Attachments Details-- Images

$val = '';
foreach ($_FILES['photo']['name'] as $key=>$value ) {

	
	if($value!="")
	{
		//$val= $key;
		$val.=$key.",";

	}
	
}
//echo $val;
// echo substr($val,0,strlen($val)-1);
$val2= substr($val,0,strlen($val)-1);
$array=explode(",",$val2);
// print_r($array);


	$image_path= 'API/Uploads/';  
  $building_images_0  = $_FILES['photo']['name'][0];
  $building_images_1  = $_FILES['photo']['name'][1];
  $building_images_2  = $_FILES['photo']['name'][2];
  $building_images_3  = $_FILES['photo']['name'][3];
  $building_images_4  = $_FILES['photo']['name'][4];
  $building_images_5  = $_FILES['photo']['name'][5];
  $building_images_6  = $_FILES['photo']['name'][6]; 
  $building_images_7  = $_FILES['photo']['name'][7]; 
  $building_images_8  = $_FILES['photo']['name'][8]; 
  $building_images_9  = $_FILES['photo']['name'][9]; 
  $building_images_10  = $_FILES['photo']['name'][10];
  $building_images_11  = $_FILES['photo']['name'][11];   
  $building_images_12  = $_FILES['photo']['name'][12]; 
  $building_images_13  = $_FILES['photo']['name'][13];  
  $target0 = $image_path . $building_images_0;
  $target1 = $image_path . $building_images_1;
  $target2 = $image_path . $building_images_2;
  $target3 = $image_path . $building_images_3;
  $target4 = $image_path . $building_images_4;
  $target5 = $image_path . $building_images_5;
  $target6 = $image_path . $building_images_6;
  $target7 = $image_path . $building_images_7;
  $target8 = $image_path . $building_images_8;
  $target9 = $image_path . $building_images_9;
  $target10 = $image_path . $building_images_10;
  $target11 = $image_path . $building_images_11;
  $target12 = $image_path . $building_images_12;
  $target13 = $image_path . $building_images_13;
  move_uploaded_file($_FILES['photo']['tmp_name'][0], $target0);
  move_uploaded_file($_FILES['photo']['tmp_name'][1], $target1);
  move_uploaded_file($_FILES['photo']['tmp_name'][2], $target2);
  move_uploaded_file($_FILES['photo']['tmp_name'][3], $target3);
  move_uploaded_file($_FILES['photo']['tmp_name'][4], $target4);
  move_uploaded_file($_FILES['photo']['tmp_name'][5], $target5);
  move_uploaded_file($_FILES['photo']['tmp_name'][6], $target6);
  move_uploaded_file($_FILES['photo']['tmp_name'][7], $target7);
  move_uploaded_file($_FILES['photo']['tmp_name'][8], $target8);
  move_uploaded_file($_FILES['photo']['tmp_name'][9], $target9);
  move_uploaded_file($_FILES['photo']['tmp_name'][10], $target10);
  move_uploaded_file($_FILES['photo']['tmp_name'][11], $target11);
  move_uploaded_file($_FILES['photo']['tmp_name'][12], $target12);
  move_uploaded_file($_FILES['photo']['tmp_name'][13], $target13);

  foreach($array as $i)
	
{
	$new_target= ${"target" . $i};

	$new_target2= substr($new_target,12);


	
  $qry_attachment = $conn->query("insert into tbl_site_upload_attachment set 
                    induction_id= '".$induction_id."',
                    image_url= '".$new_target2."',
                   
                    image_id = '".$i."'");
                     
} 

 
 

//Insert Induction topics Details--

$checked_val = $_POST['check_test'];
$x="";
$p= "'1'".","; $z=""; 
foreach ($checked_val as $selected) {
$y="`induction_topic_".$selected."`,";
$x=$x.$y;

$p;
$z=$z.$p;

}
$column= substr($x,0,strlen($x)-1);
$column2= $column;
// echo $column2;

$value = substr($z,0,strlen($z)-1);
// echo $value;

$test= "insert into tbl_site_induction_topics(`id`,".$column2.",`induction_topic_edit_text_34`) VALUES ('".$induction_id."',".$value.",'".$_POST['topic_34_text']."')";
// echo $test;
$qry_topic = $conn->query($test);

// Insert Declaration Details---

$qry_declaration = $conn->query("insert into tbl_site_induction_declaration set 
                    id = '".$induction_id."',
                    edit_certifiy = '".$_POST['declaration_name']."',
                    your_signature = '".$_POST['sign_div_hidden'].".jpg',
                    todays_date = CURDATE()");



}

if($qry_declaration && $qry_topic && $qry_attachment && $qry_employee && $qry_induction_register)
{
	$induction_id = $_POST['induction_number'];
	$get_email= $conn->query("Select * from tbl_setting")->fetch_object();
	$email= $get_email->induction_mail;
	$s         = ltrim($induction_id, '0');
	?>
		 <script>
		 			
		              alert("You Have Successfully Submitted Details");
		              window.location.href='header.php';
		  </script>
 		<?

 		$query  = "select concat(given_name,' ',surname) as name,induction_date,concat(project_name) as project from tbl_induction_register left join tbl_employee on tbl_induction_register.id = tbl_employee.id left join tbl_project on tbl_induction_register.project_id = tbl_project.id where tbl_employee.id = ".$s;

      $new_id_result  = $conn->query($query)->fetch_object();
      $project  = $new_id_result->project;
      $name   = $new_id_result->name;
      $date  = $new_id_result->induction_date;
      $source = $date;
	  $date = new DateTime($source);
      

      

      $Sub = $project ."-".$date->format('ymd')."-Site Induction Number ".$induction;
      $msg = "<html> 
			  <body>
			  Hello HSR / SM, <br/><br/>

			Site Induction form ".$induction." is ready to be reviewed.<br/><br/>


			  <a href ='http://checklist.aviktechnosoft.com/site_induction_form_unapproved.php?unapproved_form=".$s."'><input type=\"button\" value=\"Review\"> </a><br/><br/>



			Thanks <br/>
			Team CIP <br/>
			Send from Mobile app <br/>   </body> 
			</html>";


  $headers = 'From: donotreply@cip.com' . "\r\n".
   "Content-type: text/html\r\n" .
   'Reply-To: ='.$email . "\r\n" .
   'X-Mailer: PHP/' . phpversion();

				echo mail($email,$Sub,$msg,$headers);

	
}
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
 <? include('test_side2.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>



<div class="Main_Form" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: -220px 0 0 -200px;*/
    margin-top: -25vh;
    top: 52vh;
    left:23vw;
    width: 70vw;background-color: #AEB6BF   ;border-radius: 4px">
	
 <center>
 <!-- <form method="POST"> <input type="submit"  name="logout_induction" value="LogOut-induction" class="btn_logout_induction"> </form> -->
 <table style='width: 70%;border: 1px solid rgba(128, 128, 128, 0.57);'>
          <center><div class="Form_name"> <span style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#FF5733 ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2;">NEW SITE INDUCTION FORM </span>
			</div>
			</center>

	<div class="col-lg-12 well">
	
	<div class="row">
				<form  name="site_form" id="myform"  method="POST" enctype="multipart/form-data">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>NAME OF PROJECT/SITE</label>
								<input type="text" placeholder="Enter First Name Here.." class="form-control" value="<? echo $obj ->project_name; ?>" readonly>
								
							</div>
							<div class="col-sm-4 form-group">
								<label>PROJECT NUMBER</label>
								<input type="text" placeholder="Enter Project Number Here.." class="form-control" value="<? echo $obj ->number; ?>" readonly>
							</div>
							<div class="col-sm-4 form-group">
								<label>DATE</label>
								<input type="text" class="form-control" value="<? echo date("d/m/y"); ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Induction Number</label>
								<input type="text" name="induction_number" class="form-control" value="" id="ind_no" placeholder= "Please Select Employer for the Induction Number"readonly>
									
							</div>
							<div class="col-sm-6 form-group">
								<label>Access Authority Issued</label>
								
								<select style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;" id="access" onchange="select1()" required>
								 <option id="default" value="">Select Employer/Business</option>
								 <? while($row= $obj3->fetch_object()) {?>
								 <option id="default" value="<? echo $row->id ?>"><? echo $row->name ?></option>
								 <?}?>
								 </select>
								 <script>
								 function select1() {
								  	$('#select').find('option').not(':first').remove();
								  	 		$('#ph').val("");
									        $('#emp_contact').val("");
									        $('#email').val("");
									        $('#address').val("");
									        $('#emp_trade').val("");
									        $('#ind_no').val("");

    								var e = document.getElementById("access");
								   var strUser = e.options[e.selectedIndex].value;
									// alert(strUser);
									$.ajax({
									    type: "POST",
									    url: "ajax_access_authority.php",
									    data: {text1: strUser},

									    success: function(data) {
									  
									    		var json = JSON.parse(data);
									    		var id=json[0]["name"];
									    		for(i=0;i<json.length;i++)
									    		{
									    		 $("#select")
											    .append("<option value='"+json[i]["name"]+"'>"+json[i]["name"]+'</option>')
											    }
												
									    }
									});
									
									}
								 </script>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>EMPLOYER DETAILS</u></p>
								
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Employer/Business Name</label>
								<p>
								
								<select style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;" id="select" onchange ="select2()" name="select_employer" required>
								 <option id="default" value="">Please Select Access Authority first</option>
							<script>
							function select2() {
								  	
								   var e = document.getElementById("select");
								   var strUser = e.options[e.selectedIndex].value;
									// alert(strUser);
									$.ajax({
									    type: "POST",
									    url: "ajax.php",
									    data: {text1: strUser},

									    success: function(data) {
									       
									        
									    	 // alert(data);
									        var val_a= data.split("$");
									        
									        $('#ph').val(val_a[4]);
									        $('#emp_contact').val(val_a[2]);
									        $('#email').val(val_a[5]);
									        $('#address').val(val_a[6]);
									        $('#emp_trade').val(val_a[3]);
									        $('#ind_no').val(val_a[12]);

									        





									    }
									});
									}
								 </script>
														  
								</select>
								
								
								</p>
							<!-- <div>
								<label> Please Select</label>
							</div> -->	
								
							</div>
							
							
							
								
							
							<div class="col-sm-6 form-group">
								<label>Phone Number</label>
								<input type="text" id="ph" name ="ph" class="form-control" 
								value="" readonly>
							
							</div>
							
						</div>

							<div class="row">
							<div class="col-sm-6 form-group">
								<label>Employer Contact Person</label>
								<input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control"  value="<?php echo $_POST['x'] ?>" readonly>
							</div>
							<div class="col-sm-6 form-group">
								<label>Email Address</label>
								<input type="Email" id="email" placeholder="Email Address.." class="form-control" readonly>
							</div>
							</div>
							<div class="form-group">
							<label>Address  Of Your Employer/ Business </label>
							<textarea id="address" placeholder="Address..." rows="3" class="form-control" readonly></textarea>

							</div>

						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>PERSON INDUCTED DETAILS</u></p>
								
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your First Name</label>
								<input type="text" placeholder="Enter First Name Here.." id= "f_name_emp" class="form-control" name="empe_name" onchange="dec_name_get()" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Your Surname</label>
								<input type="text" placeholder="Enter Surname Here.." class="form-control" name="empe_surname" id="s_name_emp" required>
							</div>
						</div>
						<div class="form-group">
							<label>Your Address </label>
							<textarea placeholder="Enter Address Here.." rows="2" class="form-control" name="empe_add" id="person_address"  required></textarea>
								<div id="error_address" style="display: none;margin-top: 3px;font-size: 12px;color:#E74C3C">
									<label><i>The Address Must conatin atleast a number</i></label>

								</div>
							
						</div>

						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your Date of Birth</label>
								<input type="Date" placeholder="Enter Date Of Birth Here.." class="form-control" name="empe_dob" id= "dob" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Your Contact Number</label>
								<input type="Number" placeholder="Enter Contact Number Here.." class="form-control" name="empe_contact" required>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Trade</label>
								<input type="text" class="form-control" name="empe_occupation" id="emp_trade" readonly>
							</div>
							<div class="col-sm-6 form-group">
								<label>Employee Position</label>
								<select id="position" style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;" name="empe_position" required>
									<option value=""> Select your position </option>
									<option value="Project Manager"> Project Manager </option>
									<option value="Site Manager"> Site Manager </option>
									<option value="Site Foreman"> Site Foreman </option>
									<option value="Worker"> Worker </option>
									<option id="other_value" value="1"> Other</option>

									<script>
										$(document).ready(function(){
										    $('#position').on('change', function() {
										      if ( this.value == '1')
										      //.....................^.......
										      {
										         $("#position_other").show();
										         $("#position-other_text").focus();
										         $("#position-other_text").prop('required',true);
										 
										          

										         
										        }
										        
										        else
										        	$("#position_other").hide();
										
											});

										    });
										
										

																			
									</script>



								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your Email Address</label>
								<input type="Email" placeholder="Enter Email Address Here.." class="form-control"  name="empe_email" required>
							</div>
							<div class="col-sm-6 form-group" id= "position_other" hidden>
								<label>Enter Position</label>
								<input type="text" placeholder="Enter Position.." class="form-control" id= "position-other_text" name=""  onchange="other_val()">
								<script>
									function other_val()
									{
									var other_position= document.getElementById('position-other_text').value;
									
									document.getElementById("other_value").value = other_position;
								}
								</script>
							</div>
						
						</div>
						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>EMERGENCY CONTACT PERSON</u></p>
								
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Contact Persons Name</label>
								<input type="text" placeholder="Enter Contact Person Name Here.." class="form-control" name="empe_emrg_name" required>
							</div>
							<div class="col-sm-4 form-group">
								<label>Their Contact Number</label>
								<input type="Number" placeholder="Enter Contact Number Here.." class="form-control" name="empe_emrg_number" required>
							</div>
							<div class="col-sm-4 form-group">
								<label>Relationship To You</label>
								<input type="text" placeholder="Enter Relationship Here.." class="form-control" name="empe_emrg_relation" required>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>MEDICAL CONDITIONS</u></p>
								
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-sm-10 form-group">
								<p class="text" style="text-align: left;"> Do you have a medical condition that poses a health or safety risk to you or others on site? e.g. Diabetes, Deafness, Heart/Lung Condition, Allergy etc.)</p>
								
							</div>

							
						    <div class="col-md-2 col-sm-2">
						              
						        <label class="checkbox-inline">
						      
							    <input name="medical_check"  id="medical" type="checkbox" onclick="uncheck(1);"><strong>Yes</strong>
							   	&nbsp;
							    <label class="checkbox-inline">
						      	<input name="medical_check_no"   id="medical_no" type="checkbox" onclick="uncheck(2);" checked><strong>No</strong>
					           	
					          
					            <script>
								function uncheck(check) {
								    var prim = document.getElementById("medical");
								    var secn = document.getElementById("medical_no");
								    if (prim.checked == true && secn.checked == true) {
								        if (check == 1) {
								            secn.checked = false;
								            document.getElementById("txt_1").readOnly = false;
								            document.getElementById("txt_1").focus();
								            document.getElementById("txt_1").value="";

								        } else if (check == 2) {
								            prim.checked = false;
								            document.getElementById("txt_1").readOnly = true;
								            document.getElementById("txt_1").value="";



								        }
								    }
								    if (prim.checked == false && secn.checked == false) {

								        secn.checked = true;
								        document.getElementById("txt_1").readOnly = true;

								    }

								}		
								</script>
					          	</label>
					          	
	          				</div>
						</div>

						<div class="form-group">
						<textarea name="medical_detail"  id="txt_1" rows="2" class="form-control" readonly="readonly" required></textarea>
						<div style="display: none;">
						<label id="err2"> Please Fill The Medical Description </label>
						</div>
						</div>

						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>COMPETENCY CERTIFICATES / PROOF OF IDENTITY</u></p>
								
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5 form-group">
								<p class="text" style="text-align: left;">Have you completed a 'General Construction Induction Card'?</p>
								
							</div>

							
						    <!-- <div class="col-md-2 col-sm-2">
						              
						        <label class="checkbox-inline">
							   
					            <input type="checkbox" Id="#" name="check_gcic"><strong>Yes</strong>

					            </label>
					          	
	          				</div> -->
	          				<div class="col-sm-5 form-group">
								<label class="inline">Date Issued</label>
								<input  class="inline" type="Date" name="gcic_issue"  class="form-control" style=" border-radius: 4px" min="1997-01-01" required>
							</div>


						</div>

						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Name Of Induction Training Provider</label>
								<input type="text" name="provider_name" class="form-control" required> 
							</div>
							<div class="col-sm-6 form-group">
								<label>General Construction Induction Card</label>
								<input  type="text" name="card_number" class="form-control" id= "pin_insert"  onchange="pin_generate()" minlength="4" required>
								

								<input type="hidden" name="pin_value" id= "pin_generation" hidden>
								<script>
									
								function pin_generate()
								{
									
									
									var fianl_val= document.getElementById('pin_insert').value;
									var lastFour = fianl_val.substr(fianl_val.length - 4); 
									document.getElementById('pin_generation').value = lastFour;
									
									
								
								}
								</script>
							</div>
					
						</div>

						<div class="row">
    					<div class="col-sm-12 form-group">
        				<p class="text" style="text-align: left; font-size: 15px">Upload General Construction Induction Card, Driver's License,Trade Certificates, Prescribe Occupations, Licenses, First Aid Certificate, etc. related to your work on this site e.g. Electrician, Plant Operator, Crane, Rigger, First Aider, Demolitionetc.<strong>Upload Licenses
        				</strong>
        				</p>

   						</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> General Construction Induction Card Front:</label>
      						<input type="file" name="photo[]" id="imgInp1" required>
      						<img class="preview1" id="preview1" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label>General Construction Induction Card Back:</label>
      						<input type="file" name="photo[]" id="imgInp2">
      						<img class="preview2" id="preview2" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>

						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Driver License Front:</label>
      						<input type="file" name="photo[]" id="imgInp3" required>
      						<img class="preview3" id="preview3" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Driver License Back:</label>
      						<input type="file" name="photo[]" id="imgInp4">
      						<img class="preview4" id="preview4" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp5">
      						<img class="preview5" id="preview5" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp6">
      						<img class="preview6" id="preview6" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    						<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp7">
      						<img class="preview7" id="preview7" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp8">
      						<img class="preview8" id="preview8" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp9">
      						<img class="preview9" id="preview9" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    						<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp10">
      						<img class="preview10" id="preview10" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp11">
      						<img class="preview11" id="preview11" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp12">
      						<img class="preview12" id="preview12" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp13">
      						<img class="preview13" id="preview13" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp14">
      						<img class="preview14" id="preview14" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<script>
							


						</script>
						<div class="row">
							<div class="col-sm-9 form-group">
								<p class="h4" style="text-align: left;"><u>INDUCTION TOPICS</u></p>
								<h5 align="left"> <b> Note:-</b> &nbsp Please select all to confirm you understand all of the below induction topics discussed at the induction.</h4>
								
							</div>
							<div class="col-md-3 form-group">
						              
						        <label class="checkbox-inline">
							        
					            <input type="checkbox" id="select_all"><strong>Select All</strong>

					            </label>
					          	
	          				</div>

						</div>
						
						
						<div class="row">
								<div class="col-md-1">
								<p>1</p>
								</div>
								<div class="col-md-3">
								<p style="text-align: left;">Additional Inductions i.e. Visitor, Ceiling, Client. </p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="1" class="checkbox">

					            </label>
								</div>
								<div class="col-md-1">
								<p>27</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Minimum PPE - <ul>
												<li>Hard Hats, Steel Capped Boots.</li>
												<li>Protective Clothing Short Sleeve Shirt & Work Shorts are the Minimum Requirement.</li>
												<li>High Visibility Vests.</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="27" class="checkbox">

					            </label>
								</div>
						</div>

						<div class="row">
								<div class="col-md-1">
								<p>2</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>What We are Building- <ul>
												<li>Description.</li>
												<li>Expected Duration & Completion Date.</li>
												<li>Site Ph. No. etc.</li>
												<li>Sites Hours.
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value= "2" class="checkbox">

					            </label>
								</div>

								<div class="col-md-1">
								<p>28</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Safety Signs & Barricades
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="28" class="checkbox">

					            </label>
								</div>
		
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>3</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Management Team - <ul>
												<li>Project Director and Site Manager.</li>
												<li>Foremen.</li>
												<li>Site Ph. No. etc.</li>
												<li>Site Safety Advisor (SSA).</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="3" class="checkbox">

					            </label>
								</div>
								<div class="col-md-1">
								<p>29</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Emergency Procedures -<ul>
												<li>Evacuation Procedures.</li>
												<li>Emergency Contact Details.</li>
												<li>Fire Fighting Equipment, etc.</li>
								
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="29" class="checkbox">

					            </label>
								</div>
		
						</div>

						<div class="row">
								<div class="col-md-1">
								<p>4</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Layout - <ul>
												<li>Offices, Amenities, First Aid, Parking, etc.</li>
												<li>Deliveries To Site</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="4" class="checkbox">

					            </label>
								</div>
								<div class="col-md-1">
								<p>30</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Incident Reporting Requirements -<ul>
												<li>Accidents</li>
												<li>Dangerous Events.</li>
												<li>Near Misses</li>
												<li>Hazard</li>
								
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="30" class="checkbox">

					            </label>
								</div>
		
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>5</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Policies - <ul>
												<li>WHS, Quality, Environment.</li>
												<li>Outline of CMP.</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="5" class="checkbox">

					            </label>
								</div>

								<div class="col-md-1">
								<p>31</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>First Aid Facility
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="31" class="checkbox">

					            </label>
								</div>
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>6</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Essential Health & Safety Requirements for site.
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="6" class="checkbox">

					            </label>
								</div>

								<div class="col-md-1">
								<p>32</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Amenities, Toilets & Drink Stations
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="32" class="checkbox">

					            </label>
								</div>
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>7</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Access & Security 
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="7" class="checkbox">

					            </label>
								</div>

								<div class="col-md-1">
								<p>33</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>General Site Requirements
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="33" class="checkbox">

					            </label>
								</div>

						</div>
						<div class="row">
								<div class="col-md-1">
								<p>8</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Rules -e.g. Civil  Language & Behaviour
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="8" class="checkbox">

					            </label>
								</div>
								<div class="col-md-1"><br><br>
								<p>34</p>
								</div>
								<div class="col-md-3" style="text-align: left;"><br><br>
								<p>Environmental Compliance
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="Environmental_select" name="check_test[]" value="34" class="checkbox" style="margin-top: 37px">

					            </label>
								</div>
								    <script>
									$(document).ready(function(){

  										 $("#Environmental_select").click(function(){
								      

								       var SelectVal = $(this).val();

									     if(SelectVal == "1"){
									         $("#Environmental_text").attr("readonly", true);
									         $("#Environmental_text").attr("required", false);  
									         $(this).val("0");
									     }	
									      else{
									         $("#Environmental_text").attr("readonly", false);
									         $("#Environmental_text").attr("required", true); 
									         $("#Environmental_text").focus();

									         $(this).val("1");
									     }
								     });
									});
									$(document).ready(function(){

  										 $("#select_all").click(function(){
								      

								       var SelectVal_all = $(this).val();

									     if(SelectVal_all == "1"){
									         $("#Environmental_text").attr("readonly", true);     
									         $(this).val("0");
									     }	
									      else{
									         $("#Environmental_text").attr("readonly", false);
									         $("#Environmental_text").focus();

									         $(this).val("1");
									     }
								     });
									});
									</script>
								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>9</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Disciplinary Procedures - 
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="9" class="checkbox">

					            </label>
								</div>
								<!-- <div class="col-md-1"><br><br>
								<p>**</p>
								</div>
								<div class="col-md-2" style="text-align: left;"><br><br>
								<p>Information provided under Item 1. Addition Inductions
								</p>
								</div>
								<div class="col-sm-2 form-group"><br><br>
								
							        
					            <input type="text" Id="Environmental_text" name="topic_34_text" class="form-group" readonly required>

					        
								</div>
 -->
								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>10</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Drugs and Alcohol -
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="10" class="checkbox">

					            </label>
								</div>

								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>11</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Smoking Policy, Designated Smoking Area's
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="11" class="checkbox">

					            </label>
								</div>

								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>12</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Project Consultation & Communication
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="12" class="checkbox">

					            </label>
								</div>

								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>13</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Specific Hazards
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="13" class="checkbox">

					            </label>
								</div>
						</div>
							<div class="row">
								<div class="col-md-1">
								<p>14</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Work Method Statement Requirements
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="14"  class="checkbox">

					            </label>
								</div>

						</div>
					
							<div class="row">
								<div class="col-md-1">
								<p>15</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Permits
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1"name="check_test[]" value="15" class="checkbox">

					            </label>
								</div>

						</div>
						
							<div class="row">
								<div class="col-md-1">
								<p>16</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Live Services
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="16" class="checkbox">

					            </label>
								</div>

						</div>
					
							<div class="row">
								<div class="col-md-1">
								<p>17</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Underground Services
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="17" class="checkbox">

					            </label>
								</div>

						</div>
				
							<div class="row">
								<div class="col-md-1">
								<p>18</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Mobile Plant 
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="18" class="checkbox">

					            </label>
								</div>

						</div>
							<div class="row">
								<div class="col-md-1">
								<p>19</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Working at Heights
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="19" class="checkbox">

					            </label>
								</div>

						</div>
					
							<div class="row">
								<div class="col-md-1">
								<p>20</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Safety Harnesses.
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="20" class="checkbox">

					            </label>
								</div>

						</div>
					
							<div class="row">
								<div class="col-md-1">
								<p>21</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Ladders
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="21" class="checkbox">

					            </label>
								</div>

						</div>
				
							<div class="row">
								<div class="col-md-1">
								<p>22</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Mobile and Fixed Scaffold.
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="22" class="checkbox">

					            </label>
								</div>

						</div>
						<div class="row">
								<div class="col-md-1">
								<p>23</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Electrical -<ul>
												<li>Portable equip/tools tested and tagged.</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="23" class="checkbox">

					            </label>
								</div>
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>24</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Fire Prevention
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="24" class="checkbox">

					            </label>
								</div>

						</div>	
						<div class="row">
								<div class="col-md-1">
								<p>25</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Hazardous Substances & MSDS
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="25" class="checkbox">

					            </label>
								</div>

						</div>
						<div class="row">
								<div class="col-md-1">
								<p>26</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Manual Handling
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="26" class="checkbox">

					            </label>
								</div>

						</div>
						<script>
										$(document).ready(function(){
												    $('#select_all').on('click',function(){
												        if(this.checked){
												            $('.checkbox').each(function(){
												                this.checked = true;
												            });
												        }else{
												             $('.checkbox').each(function(){
												                this.checked = false;
												            });
												        }
												    });
												    
												    $('.checkbox').on('click',function(){
												        if($('.checkbox:checked').length == $('.checkbox').length){
												            $('#select_all').prop('checked',true);
												        }else{
												            $('#select_all').prop('checked',false);
												        }
												    });
												});
										$(document).ready(function(){

											$(".checkbox").prop('required',true);
										});
						</script>	
						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>PRIVACY NOTIFICATION:</u></p>
								
							</div>
							
						</div>	
						<div class="row" style="border: 1px solid black">
							<div class="col-sm-12 form-group">
								<p style="text-shadow:1px 1px 1px rgba(135,135,135,1);font-weight:normal;color:#000000;letter-spacing:1pt;word-spacing:2pt;font-size:14px;text-align:justify;font-family:tahoma, verdana, arial, sans-serif;line-height:1; padding-top: 5px">The personal information you have provided may be used for the purpose of contacting the person you have nominated in the event of an emergency. From time to time the information may be supplied to others such (as medical officers, ambulance officers) involved with the outcome of an emergency or medical situation. All disclosures will be subject to the provisions imposed by the Privacy Act 1988.</p>
								
							</div>
							
						</div>	<br><br>
						<div class="row" style="border-bottom: 1px solid black">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;">INDUCTION DECLARATION</p>
								
							</div>
							
						</div>
						<div class="row" style="border: 1px solid black">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;">I <input type="text" id="declaration_name" name="declaration_name" style="border: 0;border-bottom: 0.5px solid red;outline: 0;"readonly>&nbsp certify the following: </p>
								<ul style="text-align: left;">
									<li>All information givenby me verbally during the induction and written by me on this form is true and correct.</li>
									<li>I understand my Work Health and Safety, Quality and Environmental obligations and responsibilities on this project as explained to me during the Site Specific Induction and as ticked by meabove.</li>
									<li>I have all the relevant licences, experience, trainings, qualifications,knowledge and skills to do the tasksallocated to me on this project competently and in a safe way.</li>
									<li>I am medically fit to perform the respective tasks I am required to undertake while on site.</li>

								</ul>
								
							</div>
							<script>
								$('#f_name_emp,#s_name_emp').bind('keypress keyup blur', function() {
    							$('#declaration_name').val($('#f_name_emp').val() + ' ' + $('#s_name_emp').val());
								});
		
							</script>
							<script>
							function dec_name_get(){
								var name= document.getElementById("f_name_emp").value;
								// alert(name);
								var today = new Date();

								var time = today.getHours()+ "" + today.getMinutes() + "" + today.getSeconds();
								$.ajax({
									    type: "POST",
									    url: "ajax_decalaration.php",
									    data: "name="+name+"&time="+time,

									    success: function(data) {
									    	var string = "API/Uploads/"+time+".jpg";
									    	document.getElementById("sign_div").style.backgroundImage = "url('" + string + "')";
                      						document.getElementById("sign_div").style.backgroundRepeat= "no-repeat";
                      						document.getElementById("sign_div_hidden").value= time;


	
									    }
									});
							}
							</script>
						</div>	
						<div class="row" style="border-bottom: 1px solid black">
							<div class="col-sm-3 form-group">
								<p class="h5" style="text-align: left;">Your Signature</p>
		
							</div>
							<div class="col-sm-3 form-group">
								<div id="sign_div" style="-webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3); height:180px; width:180px;background-repeat: no-repeat;margin-top:20px" readonly>
								</div>
								<!-- <input type="text" name="sign_div" id= "sign_div" style="border: 0;border-bottom: 0.5px solid red;outline: 0;padding-top: 5px;" readonly> -->
								<input type="text" name="sign_div_hidden" id="sign_div_hidden" style="display: none;">

		
							</div>
							<div class="col-sm-3 form-group">
								<p class="h5" style="text-align: left;">Today's Date</p>
		
							</div>
							<div class="col-sm-3 form-group">
								<input type="text" style="border: 0;border-bottom: 0.5px solid red;outline: 0; padding-top: 10px;" value="<? echo date("d/m/y"); ?>" readonly>
							
							</div>
							
						</div><br><br>	
						
							<div class="col-sm-6 form-group">
						
								
								
								<input type="submit"  class="btn btn-info" id= "submit" value="Submit"  name="set"  data-complete-text="Loading Completed" autocomplete="off" style="width:20vw; height:4rem; color:black;margin-top:3rem;" />

								
							</div>
							
						</div>
						
			
				</form> 

			</div>
	</div>
</table> 


</center>        
</div> 
</body>
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

.btn_logout_induction {
  background: #dae1e6;
  background-image: -webkit-linear-gradient(top, #dae1e6, #f01818);
  background-image: -moz-linear-gradient(top, #dae1e6, #f01818);
  background-image: -ms-linear-gradient(top, #dae1e6, #f01818);
  background-image: -o-linear-gradient(top, #dae1e6, #f01818);
  background-image: linear-gradient(to bottom, #dae1e6, #f01818);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #2b172b;
  font-size: 18px;
/*  padding: 10px 20px 10px 20px;*/
  text-decoration: none;
}

.btn_logout_induction:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

</style>
<script>
	
</script>
  
<footer>
  <? include("footer.php"); ?>
<footer>
  



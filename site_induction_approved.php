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
 

$obj=$conn->query("Select * FROM tbl_project WHERE id ='".$_SESSION['admin']."'")->fetch_object();
$obj2=$conn->query("Select MAX(id)+1 AS 'id' FROM tbl_induction_register")->fetch_object();
 $obj6=$conn->query("Select tbl_employee.id,concat(tbl_employee.given_name ,' ',tbl_employee.surname) as name,tbl_employer.company_name FROM tbl_employee left join tbl_employer on  tbl_employee.employer_id = tbl_employer.id where tbl_employer.id is not null");
$test = $conn->query ("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE (inducted_by IS NOT NULL OR inducted_by = '' ) AND tbl_induction_register.id = '".$_REQUEST['approved_form']."'")->fetch_object();
$obj3=$conn->query("select tbl_access.id,name from tbl_project_register left join tbl_access on tbl_project_register.access_id = tbl_access.id where tbl_project_register.project_id = '".$_SESSION['admin']."' AND tbl_project_register.employer_id = '".$test->empid."' group by access_id")->fetch_object();
$employer_name = $conn->query("Select * from tbl_employer where id = '".$test->empid."'")->fetch_object();
// $test2 = "Select * from tbl_site_upload_attachment where induction_id = '".$test->id."' AND image_id = '0";



$image_0= $conn->query("Select * from tbl_site_upload_attachment where induction_id = '".$test->id."'");
$topic_check=$conn->query("Select * from tbl_site_induction_topics where id = '".$test->id."'")->fetch_object();
$declaration=$conn->query("Select * from tbl_site_induction_declaration where id = '".$test->id."'")->fetch_object();
$approval_select=$conn->query("select tbl_induction_register.id,given_name,surname,pin from tbl_employee left join tbl_induction_register on tbl_employee.id = tbl_induction_register.id where empid = 1 and tbl_induction_register.id = '".$test->inducted_by."'")->fetch_object();
//Update Button Clicked

 if(isset($_REQUEST['update']) == true) 
 { 
 $str = ltrim($_REQUEST['induction_number'], '0');

 	 $image_pre= $conn->query("Select * from tbl_site_upload_attachment where induction_id = '".$str."'");

 	 //Update Employee details
 	$update_employee = $conn->query("Update `tbl_employee` SET `given_name`='".$_REQUEST['empe_name']."',`surname`= '".$_REQUEST['empe_surname']."',`contact_phone`= '".$_REQUEST['empe_contact']."',`job_title`= '".$_REQUEST['empe_position']."',`occupation`='".$_REQUEST['empe_occupation']."',`email_add`='".$_REQUEST['empe_email']."',`emrg_contact_name`='".$_REQUEST['empe_emrg_name']."',`emrg_contact_phone`='".$_REQUEST['empe_emrg_number']."',`emrg_contact_relation`='".$_REQUEST['empe_emrg_relation']."',`address`='".$_REQUEST['empe_add']."',`DOB`='".$_REQUEST['empe_dob']."',`gcic_issue_date`='".$_REQUEST['gcic_date']."',`itp_name`='".$_REQUEST['itp_name']."' where `id`= '".$str."'");
 

 	

 	//Update Attachments Details-- Images


										// $val = '';



										// foreach ($_FILES['photo']['name'] as $key=>$value ) {
										 
											
										// 	if($value!="")
										// 	{
										// 		//$val= $key;
										// 		$val.=$key.",";


										// 	}
	

// echo $val;
// echo substr($val,0,strlen($val)-1);
$val2= substr($val,0,strlen($val)-1);
$array=explode(",",$val2);
 

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


	$arr2= array();
	$c= array();
	$arr3=array();
	$db_val_id=array();

	
while($row= mysqli_fetch_object($image_pre))
	{
	
		// print_r($row);
		// echo $str;

		
		$arr= explode(" ",$row->image_url);
		$arr2= explode(" ",$row->image_id);
		$c = array_combine($arr2, $arr);
		

			for($i=0;$i<=13;$i++)
			{
					if($_FILES['photo']['name'][$i] == "") 
					{
					$_FILES['photo']['name'][$i] = $c[$i];
					}


	
		
			}
array_push($db_val_id,$row->image_id);
}

// print_r($db_val_id); 




// print_r($_FILES['photo']['name']);


foreach ($_FILES['photo']['name'] as $key=>$value) {
	

		if(in_array($key, $db_val_id))
		{
			$update_attachment_1= $conn->query("update `tbl_site_upload_attachment` set 
                    
                  `image_url`= '".$value."',
                   
              `image_id` = '".$key."' where (`induction_id`='".$str."' AND `image_id`= '".$key."')");


		}
		else 
		{
					if($value != ""   && in_array($key, $db_val_id) == false)
					{
			        $update_attachment_2= $conn->query("insert into tbl_site_upload_attachment set 
					
                    induction_id= '".$str."',
                    image_url= '".$value."',
                   
                    image_id = '".$key."'");
                }
	
		}
}
		

		

}	
 	

if( $update_employee && ($update_attachment_1 || $update_attachment_2))
		{
			?>
		 <script>
		              alert("You Have Successfully Updated Details");
		              window.location.href='approved_forms.php';
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


<div class="Main_Form" style="float: left; background-color: white; width: 70%; border: solid 1px black; border-radius: 10px; margin-left: 18%;">
	
 <center>
 <table style='width: 70%;border: 1px solid rgba(128, 128, 128, 0.57);'>
          <center><div class="Form_name"> <span style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#FF5733 ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2;"> APPROVED SITE INDUCTION FORM </span>
			</div>
			</center>

	<div class="col-lg-12 well">
	<div class="row">
				<form  name="site_form" method="POST" enctype="multipart/form-data">
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
								<input type="text" class="form-control" value="<?echo $test->created_date;  ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Induction Number</label>
								<input type="text" name="induction_number" class="form-control" value="<? $value= str_pad($test->id, 4, '0', STR_PAD_LEFT); echo $value;
								?>" readonly>
							</div>
							<div class="col-sm-6 form-group">
								<label>Access Authority Issued</label>
								<input type="text" placeholder="Access Authority.." class="form-control" value="<? echo $obj3->name ?>" readonly>
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
								
								<input type="text" class="form-control" value="<? echo $employer_name->company_name ?>" readonly>
								</p>
								
								
							</div>
		
							
							<div class="col-sm-6 form-group">
								<label>Phone Number</label>
								<input type="text" id="ph" name ="ph" class="form-control" 
								value="<? echo $employer_name->phone_no ?>" readonly>
							
							</div>
							
						</div>

							<div class="row">
							<div class="col-sm-6 form-group">
								<label>Employer Contact Person</label>
								<input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control"  value="<?php echo $employer_name->contact_person ?>" readonly>
							</div>
							<div class="col-sm-6 form-group">
								<label>Email Address</label>
								<input type="Email" id="email"  class="form-control" value="<? echo $employer_name->email_add; ?>" readonly>
							</div>
							</div>
							<div class="form-group">
							<label>Address  Of Your Employer/ Business </label>
							<textarea id="address"  class="form-control" readonly> <? echo $employer_name->address ?></textarea>
							</div>

						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>PERSON INDUCTED DETAILS</u></p>
								
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your First Name</label>
								<input type="text"  class="form-control" name="empe_name" id="given_name" value="<? echo $test->given_name; ?>">
								<script>
									$( document ).ready(function() {
									    $("#given_name").focus();

									});

								</script>
							</div>
							<div class="col-sm-6 form-group">
								<label>Your Surname</label>
								<input type="text" class="form-control" name="empe_surname" id= "surname" value="<? echo $test->surname; ?>">
							</div>
						</div>
						<div class="form-group">
							<label>Your Address </label>
							<textarea  rows="2" class="form-control" name="empe_add"> <? echo $test->address; ?></textarea>
						</div>

						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your Date of Birth</label>
								<input type="date"  class="form-control" name="empe_dob"  value="<? echo $test->DOB; ?>" > 
							</div>
							<div class="col-sm-6 form-group">
								<label>Your Contact Number</label>
								<input type="text" class="form-control" name="empe_contact"  value="<? echo $test->contact_phone; ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your Occupation</label>
								<input type="text"  class="form-control" name="empe_occupation" value="<? echo $test->occupation; ?>">
							</div>
							<div class="col-sm-6 form-group">
								<label>Employee Position</label>
								<select id="position" name="empe_position" style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;" name="empe_position" >
								<option value="Project Manager" <?  if($test->job_title=="Project Manager"){ echo "selected";}?> > Project Manager </option>
									<option value="Site Manager" <?  if($test->job_title=="Site Manager"){ echo "selected";}?>> Site Manager </option>
									<option value="Site Foreman" <?  if($test->job_title=="Site Foreman") { echo "selected";}?> > Site Foreman </option>
									<option value="Worker" <?  if($test->job_title=="Worker") { echo "selected";}?> > Worker </option>

									<option id="other_value" value="1" <? if($test->job_title!="Site Manager" AND $test->job_title!="Project Manager" AND $test->job_title!="Site Foreman" AND  $test->job_title!="Worker" ){ echo "selected" ;}?> > Other </option>

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
								<input type="Email"  class="form-control"  name="empe_email" value="<? echo $test->email_add; ?>">
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
								<input type="text"  class="form-control" name="empe_emrg_name" value="<? echo $test->emrg_contact_name; ?>">
							</div>
							<div class="col-sm-4 form-group">
								<label>Their Contact Number</label>
								<input type="Number"  class="form-control" name="empe_emrg_number" value="<? echo $test->emrg_contact_phone; ?>">
							</div>
							<div class="col-sm-4 form-group">
								<label>Relationship To You</label>
								<input type="text"  class="form-control" name="empe_emrg_relation" value="<? echo $test->emrg_contact_relation; ?>">
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
						    
						        <script>
						        	
						        	$( document ).ready(function() {
						        		$('#medical').click(function() {
										return false;
										});
										$('#induction_card').click(function() {
										return false;
										});
										$('.checkbox').click(function() {
										return false;
										});
										$('.checkbox_all').click(function() {
										return false;
										});
										
										
						        	});
						        </script>
						        <? while($row= mysqli_fetch_object($image_0))
									{
										// echo $row->image_id;
										 
								?>
						        <script>
						        	$( document ).ready(function() {
						        		$("#preview"+"<? echo $row->image_id?>").css("background-image", "url(API/Uploads/<? echo $row->image_url?>)");
						        		

						        	});
						        	$( document ).ready(function() {
						        		$("#preview"+"<? echo $row->image_id?>").click(function() {
						        			  
						        			$('.imagepreview').attr("src","https://cipropertyapp.com/API/Uploads/"+"<? echo $row->image_url?>");

											$('#imagemodal').modal('show');  
						        		});
						        		

						        	});
 
						        </script>
						        <? }?>

						      <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>
						     
							    <input name="medical_check" id="medical" type="checkbox" checked> <label id="label_txt"> </label>
							       <input type="hidden" id= "yes_or_no" value="<?echo $test->medical_condition; ?>">
							       
							       	 <script>
							       	 

							       	 $(document).ready(function() {
							       	 	var val = $("#yes_or_no").val();
							       	 	if(val == 1)
							       	 		
 										$("#label_txt").text("Yes");

 										else
 										{
 											$("#label_txt").text("No");
 										}
 										});
							       	 </script>
					          	
	          				</div>
						</div>

						<div class="form-group">
						<textarea name="medical_detail"  id="txt_1" rows="2" class="form-control" readonly="readonly">
						<? if($test->medical_condition ==1) echo $test->medical_condition_desc;

						else echo "No Description Available";
						?>
						
						</textarea>
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

							
						    <div class="col-md-2 col-sm-2">
						              
						        <label class="checkbox-inline">
							   
					          <!--   <input type="checkbox" Id="induction_card" <?php echo ($test->is_gcic == 1 ? 'checked' : '');    ?> ><strong>Yes</strong> -->

					            </label>
					          	
	          				</div>
	          				<div class="col-sm-5 form-group">
								<label class="inline">Date Issued</label>
								<input type="date" min="1997-01-01" name= "gcic_date" class="form-control" value="<? echo $test->gcic_issue_date ?>" required>
							</div>


						</div>

						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Name Of Induction Training Provider</label>
								<input type="text" name= "itp_name"  class="form-control" value="<? echo $test->itp_name; ?>" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>General Construction Induction Card</label>
								<input type="text" name="pin" minlength="4"  class="form-control" value="<? echo $test->induction_card_no; ?>" readonly>
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
	    					<label> General Construction Induction Card Front:</label><br>
	    					<input type="file" name="photo[]" id="Img1" class="" value="ok"> <label for="Img1" class="btn btn-primary btn-sm">Upload New File</label> <br> 
	    				
	    					
      						
      						<img class="preview0" id="preview0" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label>General Construction Induction Card Back:</label><br>
	    					<input type="file" name="photo[]" id="Img2" value="photo[]"  class="hidden"> <label for="Img2" class="btn btn-primary btn-sm">Upload New File</label> <br>
      						
      						<img class="preview1" id="preview1" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>

						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Driver License Front:</label><br>
	    						<input type="file" name="photo[]" id="Img3" value="photo[]"  class="hidden"> <label for="Img3" class="btn btn-primary btn-sm">Upload New File</label> <br>
      						
      						<img class="preview3" id="preview2" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Driver License Back:</label><br>
	    						<input type="file" name="photo[]" id="Img4" value="photo[]"  class="hidden"> <label for="Img4" class="btn btn-primary btn-sm">Upload New File</label> <br>
      					
      						<img class="preview4" id="preview3" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img5" value="photo[]"  class="hidden"> <label for="Img5" class="btn btn-primary btn-sm">Upload New File</label> <br>
      						
      						<img class="preview5" id="preview4" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img6" value="photo[]"  class="hidden"> <label for="Img6" class="btn btn-primary btn-sm">Upload New File</label> <br>
      				
      						<img class="preview6" id="preview5" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    						<label> Competency/ Certificates:</label><br>
	    						<input type="file" name="photo[]" id="Img7" value="photo[]"  class="hidden"> <label for="Img7" class="btn btn-primary btn-sm">Upload New File</label> <br>
      				
      						<img class="preview7" id="preview6" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img8" value="photo[]"  class="hidden"> <label for="Img8" class="btn btn-primary btn-sm">Upload New File</label> <br>
      						
      						<img class="preview8" id="preview7" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img9" value="photo[]"  class="hidden"> <label for="Img9" class="btn btn-primary btn-sm">Upload New File</label> <br>
      					
      						<img class="preview9" id="preview8" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    						<label> Competency/ Certificates:</label><br>
	    						<input type="file" name="photo[]" id="Img10" value="photo[]"  class="hidden"> <label for="Img10" class="btn btn-primary btn-sm">Upload New File</label> <br>
      						
      						<img class="preview10" id="preview9" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img11" value="photo[]"  class="hidden"> <label for="Img11" class="btn btn-primary btn-sm">Upload New File</label> <br>
      						
      						<img class="preview11" id="preview10" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img12" value="photo[]"  class="hidden"> <label for="Img12" class="btn btn-primary btn-sm">Upload New File</label> <br>
      					
      						<img class="preview12" id="preview11" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img13" value="photo[]"  class="hidden"> <label for="Img13" class="btn btn-primary btn-sm">Upload New File</label> <br>
      					
      						<img class="preview13" id="preview12" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img14" value="photo[]"  class="hidden"> <label for="Img14" class="btn btn-primary btn-sm">Upload New File</label> <br>
      					
      						<img class="preview14" id="preview13" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<p class="h4" style="text-align: left;"><u>INDUCTION TOPICS</u></p>
								
							</div>
							<div class="col-md-6 form-group">
						              
						        <label class="checkbox-inline" class="checkbox_all_title">
			
					            <input type="checkbox" class="checkbox_all" id="select_all"><strong>Selected All</strong>

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
							        
					            <input type="checkbox" id="topic_id" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_1 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox"  name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_27 == 1 ? 'checked' : ''); ?> >

					            </label>
								</div>
						</div>

						<div class="row">
								<div class="col-md-1">
								<p>2</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>What We are Building - <ul>
												<li>Description.</li>
												<li>Expected Duration & Completion Date.</li>
												<li>Site Ph. No. etc.</li>
												<li>Site's Hours.
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_2 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_28 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_3 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_29 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_4 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_30 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox"  <? echo ($topic_check->induction_topic_5 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_31 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox"  <? echo ($topic_check->induction_topic_6 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_32 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox"  <? echo ($topic_check->induction_topic_7 == 1 ? 'checked' : ''); ?> >

					            </label>
								</div>

								<div class="col-md-1">
								<p>34</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Environmental Compliance
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_34 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_8 == 1 ? 'checked' : ''); ?> > 

					            </label>
								</div>
								<div class="col-md-1"><br><br>
								<p>**</p>
								</div>
								<div class="col-md-2" style="text-align: left;"><br><br>
								<p>Information provided under Item 1. Addition Inductions
								</p>
								</div>
								<div class="col-sm-2 form-group"><br><br>
								
							        
					            <!-- <input type="text" Id=""  class="form-group" value="<? echo $topic_check->induction_topic_edit_text_34 ?>" readonly>
 -->
					        
								</div>

								
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
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_9 == 1 ? 'checked' : ''); ?> >

					            </label>
								</div>

								
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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_10 == 1 ? 'checked' : ''); ?>>

					            </label>
								</div>

								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>11</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Smoking Policy, Designated Smoking Area’s
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_11 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_12 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_13 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"   class="checkbox" <? echo ($topic_check->induction_topic_14 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1"name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_15 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_16 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_17 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_18 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_19 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_20 == 1 ? 'checked' : ''); ?>>

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_21 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_22 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_23 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_24 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_25 == 1 ? 'checked' : ''); ?> >

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
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_26 == 1 ? 'checked' : ''); ?> >

					            </label>
								</div>

						</div>

							<script>
						        	$( document ).ready(function() {
						        		if($(".checkbox").prop("checked") )
						        		{ 
						        			$(".checkbox_all").prop("checked",true);
						        		}
						        		 
						        	else{
						        		
						        		 $(".checkbox_all").prop("checked",false);
						        		 

						        	}

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
								<p class="h4" style="text-align: left;">I <input type="text" style="border: 0;border-bottom: 0.5px solid red;outline: 0;" value="<? echo $declaration->edit_certifiy ?>" readonly>&nbsp certify the following: </p>
								<ul style="text-align: left;">
									<li>All information givenby me verbally during the induction and written by me on this form is true and correct.</li>
									<li>I understand my Work Health and Safety, Quality and Environmental obligations and responsibilities on this project as explained to me during the Site Specific Induction and as ticked by meabove.</li>
									<li>I have all the relevant licences, experience, trainings, qualifications,knowledge and skills to do the tasksallocated to me on this project competently and in a safe way.</li>
									<li>I am medically fit to perform the respective tasks I am required to undertake while on site.</li>

								</ul>
								
							</div>
							
						</div>	
						<div class="row" style="border-bottom: 1px solid black">
							<div class="col-sm-3 form-group">
								<p class="h5" style="text-align: left;">Your Signature</p>
		
							</div>
							<div class="col-sm-3 form-group">
								<div style="-webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3); height:180px; width:180px;margin-top:20px" readonly>
									<img src="API/Uploads/<?echo $declaration->your_signature ?>" height = "180px"; width= "180px">
								</div>
							</div>
							<div class="col-sm-3 form-group">
								<p class="h5" style="text-align: left;">Declaration Date</p>
		
							</div>
							<div class="col-sm-3 form-group">
								<input type="text" style="border: 0;border-bottom: 0.5px solid red;outline: 0; padding-top: 10px;" value="<? echo $declaration->todays_date?>" readonly>
							
							</div>
							
						</div><br><br>	
						<div class="row">
							<p class="h4" style="text-align: left;"><u>PERSON CARRYING OUT INDUCTION</u></p>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								
								<label>Induction Number</label>
								<input type="text" id= "induction_id"  class="form-control" value="<? $value= str_pad($test->inducted_by, 4, '0', STR_PAD_LEFT); echo $value; ?>" readonly>

						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
						
								<label>Name</label>
								<input type="text" id= "name_induction" class="form-control" readonly value=" <?echo $approval_select->given_name." ".$approval_select->surname ?>">
								
							</div>
							
					
							
						</div>
						<div class="row">
							
							<div class="col-sm-6 form-group">
						
								
								<input type="submit" class="btn btn-primary" id= "submit_back" value="Back To Approved Forms"  name="set" style="width:20vw; height:4rem; color:black;margin-top:3rem; font-size: 15px; font-weight: bold"    />

								
								
							</div>

							<div class="col-sm-6 form-group">
						
								
								<input type="submit" class="btn btn-info" id= "submit" value="Update Changes"  name="update"  data-complete-text="Loading Completed" autocomplete="off" style="width:20vw; height:4rem; color:black;margin-top:3rem; font-size: 15px; font-weight: bold"    />
								<script type="text/javascript">  
$(document).ready(function(){ 
    $("#submit").click(function(){
        $(this).button('loading').delay(1000).queue(function() {
            $(this).button('complete');
            $(this).dequeue();
        });        
    });
});   
</script>
								
								
							</div>
							
						</div>
						
			
				</form> 

			</div>
	</div>
</table> 


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

<script>
	    					$(function() {

						    $("#Img1").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview0").css("background-image", "url(" + this.result + ")");
						                    
						                }
						            }

							});
						});
	    					$(function() {

						    $("#Img2").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview1").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    					$(function() {

						    $("#Img3").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview2").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img4").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview3").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img5").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview4").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img6").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview5").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img7").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview6").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img8").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview7").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img9").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview8").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img10").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview9").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img11").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview10").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img12").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview11").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img13").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview12").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});
	    						$(function() {

						    $("#Img14").on("change", function() {
 
        var files = !! this.files ? this.files : [];
						            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

						            if (/^image/.test(files[0].type)) { // only image file
						                var reader = new FileReader(); // instance of the FileReader
						                reader.readAsDataURL(files[0]); // read the local file

						                reader.onloadend = function() { // set image data as background of div
						                    $("#preview13").css("background-image", "url(" + this.result + ")");
						                }
						            }

							});
						});

	    				

						    
					
							
						        
					



	    						
	    					</script>
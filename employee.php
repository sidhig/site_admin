<?php
error_reporting(0);
session_start();
include_once('connect.php');
//print_r($_POST);

if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}

if($_POST['del_tech']!=''){
   $data = $conn->query("delete from tbl_employee where id = '".$_POST['del_id']."'"); 
   //$data = $conn->query("delete from tbl_event where category = '".$_POST['del_tech']."'"); 
}

// if(isset($_POST['review']))
// {
//   $id= $_POST['edit_form'];
//   $check = $conn->query("select * 
// FROM tbl_induction_register
// LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
// WHERE inducted_by IS NOT NULL AND inducted_by != '' AND tbl_induction_register.id= '".$id."' order by tbl_induction_register.id desc");
//   $rows = $check->num_rows;
// if ($rows == 1) {
//   header("location: http://cipropertyapp.com/site_induction_approved.php?approved_form=$id");

// }

// else
// {
// 
// }
// }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<header>
    <? include_once('header.php') ?>

</test_nav>

  <script>
/*  $("#add_catgry").click(function(){
   alert('test');
});*/
  function catadd()
{
  //alert('test');
  window.location.href='add_employee.php';
}
  </script>
 <link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/jquery.dataTables.min.js"></script>
 
</head>

<body>


<div id="container">
  <div id="container">
<? include('test_side.php');?>
       
        <div class= "main_div" style="float: left; margin-top: 1vh ; margin-left: 45vh; ">
        <div>
        <center>
    <div style="height:auto; border: 1px solid rgba(128, 128, 128, 0.57); width:auto; background-color:white;border-radius: 10px;">
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
      <center>
    <h2>Site Induction Register</h2>
      </center>
      </div>
    <div class="row">
     <div class="col-sm-1" style="margin-top: 2vh">
    <strong>Note:</strong>
     </div>
    <div class="col-sm-6" style="margin-top: 2vh;margin-bottom: 2vh ">
      <img src="image/red.png" height="10px" width="12px">
     <span style="color: red">Resubmitted Inductions</span>
     <img src="image/green.png" height="10px" width="12px" style="margin-left: 1vw">
    <span style="color: green">Approved Inductions</span>
    <img src="image/blue.png" height="10px" width="12px" style="margin-left: 1vw">
      <span style="color: blue">Unapproved Inductions</span><br>
    
    </div>
    </div>


   </div>
     <table class="display nowrap" id="scrolling" cellspacing="0" width="100%">
            <thead class="cf">

              <tr>
                <th class="numeric">Induction No.</th>

                <th class="">Induction Date</th>
                <th class="">Employer/ Business Name</th>
                <th class="">Trade</th>
                <th class="">Job Title</th>
                <th class="">Given Name</th>
                <th class="">Surname</th>
                <th class="numeric">Contact Number</th>
                <th class="">Email Address</th>
                <th class="numeric">Induction Card Number</th>
                <th class="">Pin Code</th>
               <!--  <th class="" >Review/ Edit</th> -->
                <!-- <th class="">Delete</th> -->
              </tr>
            </thead>
            <tbody>
            <?
             $result = $conn->query("select *,tbl_induction_register.id as in_id,tbl_employee.email_add as emp_email 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id LEFT JOIN tbl_employer ON tbl_induction_register.empid=tbl_employer.id
order by tbl_induction_register.id desc");

        
           
               
              
              while($row=$result->fetch_object())
                {?>
              <tr>
              <? if($row->inducted_by!='' AND $row->isapproved=='0') { ?>
                <td>
                
                <a style="color: green" href="site_induction_approved.php?approved_form=<?=$row->in_id?>"> <?$value= str_pad($row->in_id, 4, '0', STR_PAD_LEFT); echo $value;?></a> </td>
                  
              <? }?>
              <? if($row->inducted_by!='' AND $row->isapproved=='1') {  ?>

                <td>
                
                  <a style="color: red" href="site_induction_resubmitted.php?resubmitted_form=<?=$row->in_id?>"> <?$value= str_pad($row->in_id, 4, '0', STR_PAD_LEFT); echo $value;?></a> </td>
                  
              <? }?>
              <?if ($row->inducted_by=='') {  ?>

                <td>
             
                  <a style="color: blue" href="site_induction_form_unapproved.php?unapproved_form=<?=$row->in_id?>"> <?$value= str_pad($row->in_id, 4, '0', STR_PAD_LEFT); echo $value;?></a> </td>
                  
              <? }?>
            

               
                <td><?=$row->induction_date?></td>
                <td><?=$row->company_name?></td>
                <td ><?=$row->Tread?></td>
                <td ><?=$row->job_title?></td>
                <td ><?=$row->given_name?></td>
                <td ><?=$row->surname?></td>
                <td ><?=$row->contact_phone?></td>
                 <td ><?=$row->emp_email?></td>
                  <td ><?=$row->inductioncard?></td>
                  <td ><?=$row->pincode?></td>
            
                  <? } ?>
              </tr>
              <!-- <tr>
                <td data-title="Code">AGO</td>
                <td data-title="Company">ATLAS IRON LIMITED</td>
                <td data-title="Price" class="numeric">$3.17</td>
                <td data-title="Change" class="numeric">-0.02</td>
                <td data-title="Change %" class="numeric">-0.47%</td>
                <td data-title="Open" class="numeric">$3.11</td>
                <td data-title="High" class="numeric">$3.22</td>
                <td data-title="Low" class="numeric">$3.10</td>
                <td data-title="Volume" class="numeric">5,416,303</td>
              </tr> -->
            </tbody>
          </table>

    </div>
    
    </center>

  </div><!---wraper close-->

        </div>

</div><!--container close-->

</body>
</html>
<script>


/*function catadd()
{
  alert('test');
 // window.location.href='add_category.php';
}*/
/*function filter(text_data, jo_object) {
  alert(jo_object);
        jo = jo_object.find('tr');

        var data4 = capitalize(text_data.trim());
        var data5 = text_data.toLowerCase().trim();
        var data6 = text_data.toUpperCase().trim();
        var data7 = text_data.trim();

        jo.hide();
        jo.filter(function(i, v) {
            var $t = $(this);

            if (($t.is(":contains('" + data4 + "')")) || ($t.is(":contains('" + data5 + "')")) || ($t.is(":contains('" + data6 + "')")) || ($t.is(":contains('" + data7 + "')"))) {
                return true;
            }

            return false;
        }).show();
    }*/

// function del(id){
// ysorn = confirm("Are you want to delete Employee ?");
// if(ysorn)
// $('#del'+id).submit();
// }
$(document).ready(function() {
    $('#scrolling').DataTable( {
  "scrollY": 400,
        "scrollX": true
    


    } );

} );

</script>
<style>
  div.dataTables_wrapper {
        width: 1100px;
        margin: 0 auto;

        
    }
</style>
 

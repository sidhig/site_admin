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
      <div style="margin:2%;">
        <input type='button' class="btn btn-primary" value='Add New' id='add_catgry' onclick="catadd();" style="margin-top: 20px"><br><br>
            <!-- </strong>Search:</strong>  -->
            <!-- <input id='filter_rep' type="text" list='desc_list' style="width: 16vw; height:3vh;" oninput="filter(this.value,$('#user'))"> -->
      </div><h2>Site Locations</h2>
      </center>
      </div>
   
     <table class="display nowrap" id="scrolling" cellspacing="0" width="100%">
            <thead class="cf">
              <tr>
                <th class="numeric">Permit No.</th>
                <th class="">Date Issue</th>
                <th class="">Date Expiry</th>
                <th class="numeric">Induction No.</th>
                <th class="">Employer/ Business Name</th>
                <th class="">Permit Recipients Name</th>
                <th class="">Task/ Activity</th>
                <th class="numeric">Location of Work</th>
                <th class="">Permit Issuers Name</th>
                <th class="numeric">Status</th>
                <!-- <th class="">Pin Code</th>
                <th class="" >Review/ Edit</th> -->
                <!-- <th class="">Delete</th> -->
              </tr>
            </thead>
            <tbody>
            <?
             $result = $conn->query("select *, date(issue_date) as issue, date(expiry_date) as expiry from tbl_permit_excave_register LEFT JOIN tbl_employer ON tbl_permit_excave_register.employer_id=tbl_employer.id");
              
              while($row=$result->fetch_object())
                {?>
              <tr>
                <td><?echo $row->permit_no;?></td>
                <td><?=$row->issue?></td>
                <td><?=$row->expiry?></td>
                <td ><?=$row->induction_no?></td>
                <td ><?=$row->company_name?></td>
                <td ><?=$row->permit_recipients_name?></td>
                <td ><?=$row->task?></td>
                <td ><?=$row->work_location?></td>
                 <td ><?=$row->permit_issuers_name?></td>
                  <td ><?$date1 = date_create($row->issue);$date2 = date_create($row->expiry);$diff = date_diff($date1,$date2); 
                 
                $dif=$diff->format("%a");
$status = ($dif >= 15) ? "CLOSED" : "OPEN"; echo $status;?></td>
                <!-- <td>
                  <form id="edit_form<?=$row->id?>" method="post" action="edit_employee.php" >
                  <input type="hidden"  name="edit_form" value="<?=$row->id_employee?>" />
                  <input type="submit" class="btn btn-primary" class="button edit_click1" value="Review Form/ Edit" style="cursor:pointer; width:100%" /> 
                  </form>  
                </td> -->
               <!--  <td>
                <form id="del<?=$row->id?>" method="post" action="employee.php" >
                     <input type="hidden" name="del_tech" value="<?=$row->given_name?>" />
                     <input type="hidden" name="del_id" value="<?=$row->id_employee?>" />
                      <input type="button" class="btn btn-primary" class="button" value="X" style="cursor:pointer; width:100%;font-weight:bolder " onclick='del(<?=$row->id?>)'/>
                  </form>
                
                </td> -->
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
 

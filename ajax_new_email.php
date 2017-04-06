<?php
include_once('connect.php');
 





$name2 = $_POST['name1'];

if (isset($_POST['name1'])) {
	$count= mysqli_query($conn,"Select * from tbl_setting");
$num_rows = mysqli_num_rows($count);

if($num_rows<= 0)
{
$query = mysqli_query($conn,"insert into tbl_setting set 
                    induction_mail  = '".$name2."',
                    id='1'");
echo "Email ID Registered Successfully";
}
else
{
	$query = mysqli_query($conn,"update `tbl_setting` set 
                    `induction_mail`  = '".$name2."' where id='1'");
echo "Email ID Registered Successfully";
}
}








?>
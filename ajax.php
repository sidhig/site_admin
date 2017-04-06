
<?php
include_once('connect.php');
 
$text1 = $_POST['text1'];





$result=$conn->query("Select * FROM tbl_employer WHERE  company_name='".$text1."'");
$arr=mysqli_fetch_row($result);

print_r(implode("$",$arr));

if($text1=='Commercial and Industrial Property')
{
	$cip_id=$conn->query("select max(id)+1 as id FROM tbl_induction_register WHERE id <= 20")->fetch_object();
	$cip = '$'.$cip_id->id;
	echo $cip;


}

else if($text1== "")
{
	echo "";
}

else
{
	$obj2=$conn->query("select MAX(id)+1 AS id FROM tbl_induction_register")->fetch_object();
	$other_id = '$'.$obj2->id;
	echo $other_id;
}




?>
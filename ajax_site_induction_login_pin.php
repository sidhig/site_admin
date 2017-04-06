<?php
include_once('connect.php');

$text2=$_POST['value_ajax'];



$approval=$conn->query("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE inducted_by IS NOT NULL AND inducted_by != '' AND tbl_induction_register.id= '".$text2."' order by tbl_induction_register.id desc");


 

$arr=mysqli_fetch_row($approval);
print_r (implode(",",$arr));

?>
<?php
include_once('connect.php');

$text2=$_POST['value_ajax'];



$approval=$conn->query("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE inducted_by IS NOT NULL AND inducted_by != '' AND tbl_induction_register.id= '".$text2."' order by tbl_induction_register.id desc");

$approval2= $conn->query("select * from tbl_employee INNER JOIN tbl_employer ON tbl_employee.employer_id=tbl_employer.id where tbl_employee.id = '".$text2."'")->fetch_row();
 

$arr=mysqli_fetch_row($approval);
print_r (implode(",",$arr));

print_r(implode(",",$approval2));




?>
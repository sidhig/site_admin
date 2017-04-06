<?php
include_once('connect.php');

$text2=$_POST['value_ajax'];



$approval=$conn->query("select tbl_induction_register.id,given_name,surname,pin from tbl_employee left join tbl_induction_register on tbl_employee.id = tbl_induction_register.id where empid = 1 and tbl_induction_register.id = '".$text2."' ");
 

$arr=mysqli_fetch_row($approval);
print_r (implode(",",$arr));




?>
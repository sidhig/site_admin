<?php
include_once('connect.php');
 
$text1 = $_POST['text1'];
$text2 = $_POST['text2'];



// $result=$conn->query("select * 
// FROM tbl_induction_register
// LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
// WHERE inducted_by IS NOT NULL AND inducted_by != '' AND  tbl_induction_register.id='".$text1."' AND pin ='".$text2."' order by tbl_induction_register.id desc");
session_start(); 
$_SESSION['pin']= $text1;
$_SESSION['induction']= $text2;
echo $_SESSION['induction'];
echo $_SESSION['pin'];



?>
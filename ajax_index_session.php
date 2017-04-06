<?php
include_once('connect.php');
 
$text1 = $_POST['text1'];
$text2 = $_POST['text2'];
$text3 = $_POST['text3'];





session_start();
$_SESSION['admin'] = $text3;
$_SESSION['induction'] = $text1;
$_SESSION['pin'] = $text2;
	
	$str= $text3.",".$text1.",".$text2;
	
	echo $str;






?>
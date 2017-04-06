<?
session_start();
unset($_SESSION["admin2"]);
unset($_SESSION["induction2"]);
unset($_SESSION["pin2"]);
header("location:index.php");
?>
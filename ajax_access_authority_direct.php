
<?php
include_once('connect.php');
 
$text1 = $_POST['text1'];


session_start();



$result=$conn->query("select company_name from tbl_project_register left join tbl_employer on tbl_project_register.employer_id = tbl_employer.id where tbl_project_register.project_id = '".$_SESSION['admin2']."' and tbl_project_register.access_id = '".$text1."'  group by employer_id");
$arr2= [];
while($arr= mysqli_fetch_assoc($result))
{

	 array_push($arr2, [
      'name' => $arr['company_name']
      
    ]);
  }

  // Convert the Array to a JSON String and echo it
  $someJSON = json_encode($arr2);
  echo $someJSON;






?>
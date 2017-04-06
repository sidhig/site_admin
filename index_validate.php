<?php
include_once('connect.php');
$someArray = [];
$text1 = $_POST['text1'];
$text2 = $_POST['text2'];
$project = substr($text1, 0, 3);

$result=$conn->query("select * from tbl_project where project_name LIKE '".$project."%'");
 if($result->num_rows<=0)
 {
  $someJSON = json_encode($someArray);
  echo $someJSON;
 }

else
{
  $str2 = substr($text1, 3);
  $row= $result->fetch_object(); 
  $get_details= $conn->query("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE inducted_by IS NOT NULL AND inducted_by != '' AND  tbl_induction_register.id=".$str2." AND tbl_induction_register.pincode='".$text2."' AND empid ='1'  order by tbl_induction_register.id desc
");
$result2=$conn->query("select * from tbl_project where project_name LIKE '".$project."%'")->fetch_object();

      if($get_details->num_rows>0)
      {
        while ($row = mysqli_fetch_assoc($get_details)) {
        array_push($someArray, [
      'number'   => $row['id'],
      'pin' => $row['pin'],
      'project_id'=> $result2->id
    ]);
         $someJSON = json_encode($someArray);
          echo $someJSON;
           }
      }
      else{
         $someJSON = json_encode($someArray);
          echo $someJSON;

      }
}






?>
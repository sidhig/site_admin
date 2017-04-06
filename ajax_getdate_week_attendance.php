<?
include_once('connect.php');
$week_number_selected= $_POST['text1'];
// print_r($week_number_selected);
$current_year= date('Y');

function getWeek($week, $year) {
  $dto = new DateTime();
  $result['start'] = $dto->setISODate($year, $week, 1)->format('Y-m-d');
  $result['end'] = $dto->setISODate($year, $week, 7)->format('Y-m-d');
  return $result;
}

                    $result = getWeek($week_number_selected,$current_year);
                   print_r(implode(",", $result));

?>
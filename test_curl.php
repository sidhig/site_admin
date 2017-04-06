<?
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
if(isset($_POST['btn']) == true)
{

$datastring=$_POST['search'];
$curl = curl_init();
$default = ini_get('max_execution_time');
set_time_limit($default);
echo '<div class="container">';
for($i=1;$i<=3;$i++)
{
$url = 'http://www.amazon.in/s/&page='.$i.'&keywords='.$datastring;
// echo $url;
// exit();
// http://www.amazon.in/s/&page=4&keywords=phones
// $url2= 'http://www.amazon.in/s/page=2&keywords='.$datastring;
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


$result = curl_exec($curl);
$reg = "!http://ecx.images-amazon.com/images/I/[^\s]*?._AC_US218_.jpg!";

preg_match_all($reg,$result,$matches);
// http://ecx.images-amazon.com/images/I/51iwW7wZjlL._AC_US160_.jpg

// print_r($matches[0]);


$images =array_unique($matches[0]);


foreach($images as $curimg){

// echo "<img src='" . $curimg . "' alt='error'>";
 echo '<div class="fake_img" style="background-image: url('.$curimg.');"></div>';
}
}
echo '</div>';
curl_close($curl);


}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Grab From Amazon</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
</head>
<body>
<!-- <div class="container2"> </div> -->
<form method="POST" style="margin: 10px" class="form"> 
<H2> Image Grabber From Amazon </H2>
	<input type="text" name="search">
	<input type="submit" name="btn" value="SEARCH">

	<!-- <div class="container">

    <div class="fake_img"></div>
    <div class="fake_img">=P</div>
    <div class="fake_img">B(</div>
     <div class="fake_img">B(</div>
      <div class="fake_img">B(</div>
      <div class="fake_img">B(</div>
      <div class="fake_img">B(</div>
      <div class="fake_img">B(</div>
      <div class="fake_img">B(</div>
</div> -->
</form>

</body>
</html>

<style>
	.container{
    text-align:center;
    
    border:1px solid #666;
    overflow-y:scroll;
   height: 400px;
}
.container2{
    text-align:center;
    
    border:1px solid #666;
    
   height: 400px;
}

.fake_img{
    display:inline-block;
    margin:5px 20px;
    padding:5px;
    height: 200px;
    width: 200px;
    border:1px solid #CCC;
}
.form
{
	text-align: center;
}

</style>
<!-- <script >document.body.style.overflow = 'hidden';</script> -->
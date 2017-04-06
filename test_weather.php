<?php
error_reporting(0);
 //Two digit country code
$city= $_POST['input_city'];
$country=$_POST['input_country'];
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=7e2bc2a7709c85e289c34963359ab7fb";
$json=file_get_contents($url);
$data=json_decode($json,true);
//Get current Temperature in Celsius
$lon=$data['coord']['lon'];

$lat= $data['coord']['lat'];
$temp= $data['main']['temp'];
$humid= $data['main']['humidity'];
//Get weather condition
$weather_main= $data['weather'][0]['main'];
$weather=$data['weather'][0]['description'];
//Get cloud percentage

//Get wind speed
$wind=$data['wind']['speed'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Weather Information</title>
</head>
<body>
<H1> Weather Information</H1>
<form method="POST">
Please Enter City Name:	<input type="text" name="input_city">
Please Enter Country Name:	<input type="text" name="input_country">

<input type="submit" name="set" value="Get Information">

<div class="Information">
<h5> City: </h5> <? echo $city ?> 
<h5> Country: </h5> <? echo $country ?>  
<h5> Longitude: </h5> <? echo $lon ?> 
<h5> Latitude: </h5> <? echo $lat ?> 
<h5> Temperature: </h5> <? echo $temp ?> 
<h5> Humidity: </h5> <? echo $humid ?> 
<h5> Weather Description: </h5> <? echo $weather ?> 
<h5> Wind Speed:</h5> <? echo $wind ?> 
</div>

</form>
<style>
	.Information
	{
		display: inline;
	}
</style>
</body>
</html>
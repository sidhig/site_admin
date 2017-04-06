
<!DOCTYPE html>
<html>
<head>
	<title>dgsdg</title>
</head>
<body>
<h2 style="text-align: center;"> Chess Board </h2>
<table cellpadding="0" cellspacing="0" border="1" align="center">
	<?
	echo "<tr>";
	for ($rows=0; $rows < 8; $rows++) { 
		for($column=0;$column<8;$column++)
		{
			$total=$rows+$column;
			if($total%2==0)
			{
				echo "<td height=40; width=40; bgcolor=#FDFEFE>";
			}
			else
			{
				echo "<td height=40; width=40; bgcolor=#00000>";
			}
			
		}
		echo "<tr>";
		}	
echo "<tr>";
	?>


</table>
</body>
</html>


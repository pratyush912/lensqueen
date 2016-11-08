<html> <body>
<table border = "1" width="100%">
<tr>
<?php
		include("myconnect.php");
		$sql = "SELECT * FROM photo";
		$query = mysqli_query($conn,$sql);
		$ct=0;
		if($query){
			while($row = mysqli_fetch_array($query)){
				if (($ct%4)==0) 
				{ 
					echo "</tr>";
					echo "<tr>";
				}
				echo "<td>";
				//header("content-type: text/plain");
				
				//echo "</br>";
				//header("Content-type: image/JPG");
			echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']). ' " width="260" />';
			echo "</br>";
			echo "ID: {$row['photo_id']}";
				
				echo "</td>";
				$ct=$ct+1;
			}
		}
		else
		{
			echo mysql_error();
		}
	?>
	</tr>
	</table>
	</body>
	</html>

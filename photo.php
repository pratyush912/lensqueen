<?php

	include 'myconnect.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$imagename = $_FILES["myimage"]["name"];
		$desc=mysql_real_escape_string($_POST['desc']);

		$imagetmp = addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

		$sql="insert into photo values('','$imagename','A','$imagetmp','0','$desc')";
		$s=mysqli_query($conn,$sql);

		if($s)
		{
			echo "<script language=javascript>alert('Data has been inserted successfully')</script>";
		}
		else
			echo "<script language=javascript>alert('!!!Unable to insert data')</script>";
	}
?>
<html>
<head><title>photo uploading</title>
<style>
</style>
</head>
<body background="1.jpg">

<h1 align="center">Photography Competition 2016</h1>
<h4 align="right"><a href=".\logout.php">Logout</a></h4>
<h6 align="right"><i>contact us: +91-801-101-2832 <i></h6><hr/>
<br/>
<form action = "#" method = "post" enctype="multipart/form-data">
<table border="0" align="center" style="height:300px;300px;">
	<tr>
	<td colspan="2" align="center"><b>Upload Here</b></td>
	</tr>

	<tr>
	<td>Select File to Upload:</td>
	</tr>
	<tr>
	<td><input type="file" name="myimage"  required></td>
	</tr>

	<tr>
	<td>A Brief Description of photo:</td>
	</tr>
	<tr>
	<td> <textarea rows="5" cols="35" name="desc" placeholder="Description" required> </textarea></td>
	</tr>

	<tr>
	<td ><input type="submit" name="submit"  value="Upload" ></td>
	<td><input type="reset" name="reset"  value="Cancel"></td>
	</tr>
</table>
</form><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<footer >
<summary><hr/></summary><footer>
</body>
</html>

<?php

	include 'myconnect.php';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//$photo_id=mysql_real_escape_string($_POST['photo_id']);
		//$name=mysql_real_escape_string($_POST['name']);
		//$status=mysql_real_escape_string($_POST['status']);	
		//$dt_upload=mysql_real_escape_string($_POST['dt_upload']);
		$imagename = $_FILES["myimage"]["name"];
		//$no_votes=mysql_real_escape_string($_POST['no_votes']);
		$desc=mysql_real_escape_string($_POST['desc']);
		
		$imagetemp = addslashes (file_get_contents($_FILES['myimage']'tmp_name']));
		
		$q = "SELECT photo_id FROM photo WHERE photo_id='$photo_id'";
		$cq = mysqli_query($conn,$q);
		$ret = mysqli_num_rows($cq);
	if($ret == true)
	{
		echo "<script language=javascript>alert('photo id already exist.!!')</script>";
	}
	else
	 {
		$sql='insert into photo values("","'.$imagename.'","0","'.$imagetemp.'","0","'.$desc.'")';
		$s=mysqli_query($conn,$sql);	
	
		if($s) 
		{
			echo "<script language=javascript>alert('Data has been inserted successfully')</script>";
		}
		else 
			echo "<script language=javascript>alert('!!!Unable to insert data')</script>";
	}
	}
?>
<html>
<head><title>photo uploading</title>
<style>
body
{
background-image:url('')
}
</style>
</head>
<body bgcolor="skyblue">

<h1 align="center">Photography Competition 2016</h1>
<h6 align="right"><i>contact us: +91-801-101-2832 <i></h6><hr/>
<br/>
<form action = "#" method = "post">
<table border="0" align="center" bgcolor="skyblue" style="height:300px;300px;">
	<tr>
	<td colspan="2" align="center"><b>upload Here</b></td>
	</tr>
	
	<!--tr>
	<td>photo_id :</td>
	<td><input type="text" size="40" style="30" name="photo_id" placeholder="Enter photo_id" required/></td>
	</tr>
	
	
	<tr>
		<td>Name :</td>
		<td><input type="text" size="40" style="30" name="name" placeholder="Enter the Name" required/></td>
	</tr>
	
	<tr>
	<td>Number of votes recieved::</td>
	<td><input type="number" name="phone" placeholder="Total no of votes recieved" pattern="[0-1]{10}" required/></td>
	</tr>
	
	<tr>
	<td>Status :</td>
	<td><input type="text" size="40" style="30" name="status" placeholder="Enter the Status" required/></td>
	</tr-->
	
	
	<tr>
	<td>File:</td>
	<td><input type="file" name="myimage"  required/></td>
	</tr>
	

	<tr>
	<td>A Brief Description of photo:</td>
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


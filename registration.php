<?php

	include 'myconnect.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name=mysql_real_escape_string($_POST['name']);
		$midname=mysql_real_escape_string($_POST['midname']);
		$lname=mysql_real_escape_string($_POST['lname']);
		$dob=mysql_real_escape_string($_POST['dob']);
		$email=mysql_real_escape_string($_POST['email']);
		$password=mysql_real_escape_string($_POST['password']);
		$address1=mysql_real_escape_string($_POST['address1']);
		$address2=mysql_real_escape_string($_POST['address2']);
		$city=mysql_real_escape_string($_POST['city']);
		$phone=mysql_real_escape_string($_POST['phone']);
		$pin_no=mysql_real_escape_string($_POST['pin_no']);
		$state=mysql_real_escape_string($_POST['state']);
		$experience=mysql_real_escape_string($_POST['exp']);

		if(!filter_var($email,FILTER_VALIDATE_EMAIL)==true){
			echo("Error");
		}else{
		$q = "SELECT email FROM registration WHERE email='$email'";
		$cq = mysqli_query($conn,$q);
		$ret = mysqli_num_rows($cq);
		if($ret == true){
			echo "<script language=javascript>alert('Email already exist.!!')</script>";
			}
			elseif(strlen($phone)<10 || strlen($phone)>10 )
			{
				echo "<script language=javascript>alert('Invalid Phone no!!')</script>";
			}
			else
			 {
				$sql='insert into registration values("","'.$name.'","'.$midname.'","'.$lname.'","'.$dob.'","'.$email.'","'.$password.'","'.$address1.'","'.$address2.'","'.$city.'","'.$phone.'","'.$pin_no.'","'.$state.'","'.$experience.'")';
				$s=mysqli_query($conn,$sql);

				if($s)
				{
					echo "<script language=javascript>alert('Data has been inserted successfully')</script>";
				}
				else
					echo "<script language=javascript>alert('!!!Unable to insert data')</script>";
			}
		}
	}
?>
<html>
<head><title>Registration</title>
<style>
</style>
</head>
<body background="1.jpg">

<h1 align="center">LensQueen</h1>

<form action = "#" method = "post">
<table border="0" align="center" style="height:300px;300px;">
	<tr>
	<td colspan="2" align="center"><h2>Registration</h2></td>
	</tr>

	<tr>
	<td>Name :</td><td><input type="text" size="40" style="30" name="name" placeholder="Enter the Name" required/></td>
	</tr>
	<br>

	<tr>
		<td>Middle Name :</td>
		<td><input type="text" size="40" style="30" name="midname" placeholder="Enter the middle Name"></td>
	</tr>
<br>
	<tr>
	<td>Last Name :</td>
	<td><input type="text" size="40" style="30" name="lname" placeholder="Enter the Last Last Name" required/></td>
	</tr>
<br>

	<tr>
	<td>Date of Birth:</td>
	<td><input type="date" name="dob"  required/></td>
	</tr>



	<tr>
	<td>Email:</td>
	<td><input type="email" name="email" placeholder="Enter the email Address" required/></td>
	</tr>


	<tr>
	<td>Password:</td>
	<td><input type="password" name="password" placeholder="Enter the Pasword" required/></td>
	</tr>


	<tr>
	<td>Address 1:</td>
	<td> <textarea rows="5" cols="35" name="address1" placeholder="Enter the Address1" required> </textarea></td>
	</tr>

	<tr>
	<td>Address 2:</td>
	<td><textarea rows="5" cols="35" name="address2" placeholder="Enter the Address2"> </textarea></td>
	</tr>

		<tr>
	<td>City:</td>
	<td><input type="tel" size="40" style="30" name="city" placeholder="Enter the City" required/></td>
	</tr>

	<tr>
	<td>Phone:</td>
	<td><input type="number" name="phone" placeholder="Enter the phone Number" pattern="[0-1]{10}" required/></td>
	</tr>

	<tr>
	<td>Pin No:</td>
	<td><input type="number" size="30" style="30" name="pin_no" placeholder="Enter the Pin No" required/></td>
	</tr>

	<tr>
	<td>State:</td>
	<td><input type="tel" size="40" style="30" name="state" placeholder="Enter the State" required/></td>
	</tr>
	<tr>
	<td>Experience:</td>
	<td><textarea rows="5" cols="35" name="exp" placeholder="Share your experience" required> </textarea></td>
	</tr>

	<tr>
	<td ><input type="submit" name="submit"  value="Register" ></td>
	<td> </td>
	<td><input type="reset" name="reset"  value="Cancel"></td>
	<tr>
	<td>
	<td><a href="login.php">Login Now</td>
  </td>
	</tr>
	</tr>
</table>
</form><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<footer >
<summary><hr/></summary><footer>
</body>
</html>

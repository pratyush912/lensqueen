<?php
		include("myconnect.php");

      //execute the SQL query and return records
      $result1 = 'SELECT * FROM registration ORDER BY ssn';
	  $myresult1 = mysqli_query($conn,$result1);
	  $count1 = mysqli_num_rows($myresult1);
?>

<html>
    <head>	<title>LensQueen Admin</title>
	<style>
	#sidenav1{
		float:left;
		width:500px;
		height:600px;
	}
	#sidenav2{
		float:right;
		width:500px;
		height:600px;
	}
	</style>
	</head>
 <body background="1.jpg">
	 	<h1 style = "text-align:center; height:50px; background-color:black; color:white;"><u>Welcome to LensQueen Admin Page</u></h1>

	<h4 style="text-align:right">
	<a href = "logout.php">[Sign Out]</a>
	</h4>


	<div id="sidenav1">
	<h3 style = "text-align:center">Registered Users</h3>
	<table  width="40%" border="1px" style= "background-color: lightgreen; color: black;" >
      <thead>
        <tr>
          <th>SSN</th>
          <th>Name</th>
		  <th>MiddleName</th>
		  <th>Last_Name</th>
          <th>DOB</th>
		  <th>Email</th>
		  <th>Password</th>
		   <th>Address1</th>
		     <th>Address2</th>
			 <th>City</th>
			 <th>Phone</th>
			 <th>Pin No</th>
			 <th>State</th>
			 <th>Experience</th>
        </tr>
      </thead>
      <tbody>
        <?php

		if($count1>0){
		  while($row = mysqli_fetch_assoc($myresult1)){
            echo
            "<tr>
              <td><pre>	{$row['ssn']}</pre></td>
              <td><pre>	{$row['name']}</pre></td>
			  <td><pre>	{$row['midname']}</pre></td>
			  <td><pre>	{$row['lname']}</pre></td>
			  <td><pre>	{$row['dob']}</pre></td>
			  <td><pre>	{$row['email']}</pre></td>
			  <td><pre>	{$row['password']}</pre></td>
			  <td><pre> {$row['address1']}</pre></td>
			  <td><pre> {$row['address2']}</pre></td>
			  <td><pre> {$row['city']}</pre></td>
			  <td><pre> {$row['phone']}</pre></td>
			  <td><pre> {$row['pin_no']}</pre></td>
			  <td><pre> {$row['state']}</pre></td>
			  <td><pre> {$row['exp']}</pre></td>
            </tr>\n";
          }
		}
		?>
	  </tbody>
    </table>
	</div>
</body>
</html>

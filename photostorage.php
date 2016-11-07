<?php
		include("myconnect.php");

      //execute the SQL query and return records
      $result1 = 'SELECT * FROM photo ORDER BY photo_id';
	  $myresult1 = mysqli_query($conn,$result1);
	  $count1 = mysqli_num_rows($myresult1);
?>

<html>
    <head>	<title>photo uploaded</title>
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
	<h1 style = "text-align:center; height:50px; background-color:black; color:white;"><u>Photography Admin Page</u></h1>

	<h4 style="text-align:right">
	<a href = "logout.php">[Sign Out]</a>
	</h4>


	<div id="sidenav1">
	<h3 style = "text-align:center">Photo uploaded by Registered Users</h3>
	<table  width="40%" border="1px" style= "background-color: lightgreen; color: black;" >
      <thead>
        <tr>
          <th>photo Id</th>
          <th>Name</th>
		  <th>status</th>
		  <th>Date of Uploading</th>
          <th>No of votes recieved</th>
		  <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <?php

		if($count1>0){
		  while($row = mysqli_fetch_assoc($myresult1)){
            echo
            "<tr>
              <td><pre>	{$row['photo_id']}</pre></td>
              <td><pre>	{$row['name']}</pre></td>
			  <td><pre>	{$row['status']}</pre></td>
			  <td><pre>	{$row['dt_upload']}</pre></td>
			  <td><pre>	{$row['no_votes']}</pre></td>
			  <td><pre>	{$row['desc']}</pre></td>
            </tr>\n";
          }
		}
		?>
	  </tbody>
    </table>
	</div>
</body>
</html>

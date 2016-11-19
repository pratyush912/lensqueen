<?php

	include 'myconnect.php';
  session_start("session2");

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
    $theme_id = $_POST["th_id"];
    if ($theme_id == -1) {
        echo "<script language=javascript>alert('Please select the theme')</script>";
    } else {
		$imagename = $_FILES["myimage"]["name"];
		$desc=mysql_real_escape_string($_POST['desc']);

		$imagetmp = addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

		$sql="insert into photo values('',$theme_id, '$imagename','A','$imagetmp','0','$desc')";
		$s=mysqli_query($conn,$sql);


		if($s)
		{
      $photo_id = mysqli_insert_id($conn);
      $sql = "select ssn from registration where email='".$_SESSION['login_user']."'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $sql="insert into upload_user_photo values (".$row['ssn'].",".$photo_id.")";
      $s=mysqli_query($conn,$sql);
      if($s) {
        echo "<script language=javascript>alert('Data has been inserted successfully')</script>";
      } else {
        echo "<script language=javascript>alert('!!!Unable to insert map')</script>";
      }
		}
		else
			echo "<script language=javascript>alert('!!!Unable to insert photo')</script>";
    }
  }
?>
<html>
<head><title>photo uploading</title>
<link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<script src="./jquery.min.js"></script>
<script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<style>
body {
  color: black;
}
</style>
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
  <tr><td><input id="theme_id" name="th_id" type="hidden" value="-1" /></td></tr>
  <tr>
  <td class="dropdown">
      <button class="btn btn-primary" id="selectButton" data-toggle="dropdown">
        Select Theme
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu scrollable-menu" id="themes">
        <script>
          $.ajax({
          type: "GET",
            url: './get_themes.php',
            dataType: 'json',
            success: function(json) {
              console.log(json);
              if (json) {
                for (var i in json) {
                  var title = json[i].title;
                  var id = json[i].id;
                  $("#themes").append(`<li><a href="#" data-pdsa-dropdown-val="${id}">${title}</a></li>`);
                } 
                $("#themes li a").on("click", function () {
                    // Get text from anchor tag
                    var id = $(this).data('pdsa-dropdown-val');
                    $("#theme_id").val(id);
                    // Add text and caret to the Select button
                    var text = $(this).text();
                    $("#selectButton").html(text + '&nbsp;<span class="caret"></span>');
                  });
              } 
            }
          });
        </script>
      </ul>
  </td>
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

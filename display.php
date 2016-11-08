<html> <body>
<table border = "1" width="100%">
<tr>
<?php
		include("myconnect.php");
    session_start("session2");
    if($_SERVER['QUERY_STRING']) {
      $str = $_SERVER['QUERY_STRING'];
      parse_str($str, $output);
      $photo_id = $output['photo_id'];
      $sql = "select ssn from registration where email='".$_SESSION['login_user']."'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      
      // validate if the user has uploaded the pic
      $sql = "select count(*) from upload_user_photo where photo_id=".$photo_id." and user_id=".$row['ssn'];
      echo $sql;
      $result = mysqli_query($conn,$sql);
      $count_row = mysqli_fetch_row($result);
      if ($count_row[0] != 0) {
        echo "<script language=javascript>alert('Na na na... Blowing your own trumphet? ^_o')</script>";
      } else {
        // Check if the user has already voted
        $sql = "select count(*) from vote_user_photo where photo_id=".$photo_id." and user_id=".$row['ssn'];
        $result = mysqli_query($conn,$sql);
        $count_row = mysqli_fetch_row($result);
        if ($count_row[0] != 0) {
          echo "<script language=javascript>alert('Na na na... Just once just once...')</script>";
        } else {
          $sql="insert into vote_user_photo values (".$row['ssn'].",".$photo_id.")";
          $s=mysqli_query($conn,$sql);
          if(!$s) {
            echo "<script language=javascript>alert('!!!Unable to insert upvote')</script>";
          }
        }
      }
    }
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
      $sql="select count(*) from vote_user_photo where photo_id=".$row['photo_id'];
      $like_result = mysqli_query($conn,$sql);
      $count_row = mysqli_fetch_row($like_result);
      echo "<div>Vote Count: {$count_row[0]}";
		  echo "<button><a href='display.php?photo_id={$row['photo_id']}'>Upvote</a></button>";
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

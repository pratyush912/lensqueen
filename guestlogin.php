<?php
  
?>

<html>
   <head>
      <title> </title>
   </head>
   <body bgcolor="white">
   <h1 style = "text-align:right"></h1>
      <div align = "right">
         <div style = "width:320px; border: solid 1px white; " align = "center">
            <div style = "background-color:white; color:black; padding:3px;"><b>Login as Guest</b></div>

            <div style = "margin:30px">
               <form action = "#" method = "post">
                  <pre> <label>Email-ID  :</label><input type = "text" name = "email" class = "box"/>
				  <input type = "submit" value = " Submit "/><br /><br /> </pre>
				</form>

			   <div style = "font-size:11px; color:#cc0000; margin-top:10px"> <?php if(!empty($error)) echo $error; ?> </div>

            </div>
         </div>
      </div>
	  
	<h1 align="center">Gallery</h1>
	<h4 style="text-align:right"> <a href = "logout.php">[Sign Out]</a> </h4>
	<hr/>

	<table  width="100%" align="center"> <!--background-color: #84ed86;color: #761a9b-->
      <tr>
        <?php
	include("myconnect.php");

		//execute the SQL query and return records
		$result = 'SELECT * FROM photo ORDER BY photo_id';


		$myresult = mysqli_query($conn,$result);
		//$count = mysqli_num_rows($myresult);
		$ct=0;

		if($myresult){
		  while($row = mysqli_fetch_assoc($myresult)){
			if (($ct%4)==0)
					{
						echo "</tr>";
						echo "<tr>";
					}
            echo "<td>";
			echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <img src="data:image/jpeg;base64,'.base64_encode($row['image']). ' " height="240px" width="260px" />';
			echo "</br>";
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PHOTO ID: {$row['photo_id']}";
			echo "</br>";
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp NO OF VOTES RECIEVED: {$row['no_votes']}";
			echo "</br>";
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp CAPTION: {$row['desc']}";
			echo "</br>";
      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='button' value='vote' name='Vote' align='center'>";
      echo "</br>";
      echo "&nbsp&nbsp";
			
			echo "</br>";
			echo "</td>";
			$ct=$ct+1;
          }
		}
		?>
      </tr>
    </table>
   </body>
</html>

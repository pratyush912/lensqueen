<?php
  session_start("session1");
  include("myconnect.php");

   $error = "";
   if(!empty($_POST['email']) && !empty($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

	   $myquery = 'select * from adminlogin where email = "'.$email.'" and password = "'.$password.'"';

	   $myresult = mysqli_query($conn,$myquery);
	   $count = mysqli_num_rows($myresult);

	   if($count == 1)
		{
			 $_SESSION['login_user'] = $email;
			 header("Location: adminpage.php");
		}
		else {
			 $error = "Invalid email or Password";
		}
   }
    else
	{
	   $error = "[Enter your Registered email and Password]";
   }
   session_write_close();


   session_start("session2");

    $error = "";
	if(!empty($_POST['email']) && !empty($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

	   $myquery = 'select * from registration where email = "'.$email.'" and password = "'.$password.'"';

	   $myresult = mysqli_query($conn,$myquery);
	   $count = mysqli_num_rows($myresult);

	   if($count == 1)
		{
			 $_SESSION['login_user'] = $email;
			 header("Location: public.html");
		}
		else {
			 $error = "Invalid email or Password";
		}
   }
    else
	{
	   $error = "Enter your Registered email and Password";
   }
   session_write_close();
?>

<html>
   <head>
      <title>Login Page</title>
   </head>
   <body bgcolor="skyblue">
   <h1 style = "text-align:center">Log In Here</h1>
      <div align = "center">
         <div style = "width:320px; border: solid 1px blue; " align = "center">
            <div style = "background-color:lightgreen; color:black; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">
               <form action = "#" method = "post">
                  <pre> <label>Email-ID  :</label><input type = "text" name = "email" class = "box"/><br /><br /> <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br /> <input type = "submit" value = " Submit "/><br /><br /> </pre>
				  <a href = "registration.php"> Register Here </a><br><br>
               </form>

			   <div style = "font-size:11px; color:#cc0000; margin-top:10px"> <?php if(!empty($error)) echo $error; ?> </div>

            </div>
         </div>
      </div>
   </body>
</html>

<?php
   session_start();
   include "myconnect.php";
   if(session_destroy()) {
      header("Location: index.html");
	  }
?>

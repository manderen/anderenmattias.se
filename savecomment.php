<?php

	$con = mysql_connect("localhost","root","manderen018");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("manderenData", $con);

	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$message = strip_tags($_POST['message']);	

	
	$sql=mysql_query("INSERT INTO comment (name, email, content) VALUES ('$name','$email','$message')");
  header("location: index.php");
mysql_close($con)

	
?>

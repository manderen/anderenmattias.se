<?php
//accessfile2warehouse
require_once('../includes/config.php');


//check if already logged in go 2 index
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../style/admin.normalize.css">
  <link rel="stylesheet" href="../style/admin.main.css">
</head>
<body>

<div id="login">

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']); //trim whitespaces
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} else {
			$message = '<p class="error">Felaktig info</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>
	<!-- Submitted user and pass departs to loggin method in class user -->
	<form action="" method="post">
	<p><label>Användare</label><input type="text" name="username" value=""  /></p>
	<p><label>Lösenord</label><input type="password" name="password" value=""  /></p>
	<p><label></label><input type="submit" name="submit" value="Login"  /></p>
	</form>

</div>
</body>
</html>

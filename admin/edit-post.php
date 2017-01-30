 <?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Redigera CV</title>
  <link rel="stylesheet" href="../style/admin.normalize.css">
  <link rel="stylesheet" href="../style/admin.main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>

	<h2>Redigera CV</h2>


	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postID ==''){
			$error[] = 'Saknar ID.';
		}

		if($postTitle ==''){
			$error[] = 'Ange titel.';
		}

		if($postContent ==''){
			$error[] = 'Ange innehåll.';
		}

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('UPDATE content SET postTitle = :postTitle, postContent = :postContent WHERE postID = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postContent' => $postContent,
					':postID' => $postID
				));

				//redirect to index page
				header('Location: index.php?action=uppdaterad');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT postID, postTitle, postContent FROM content WHERE postID = :postID') ;
			$stmt->execute(array(':postID' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>

		<p><label>Titel</label><br />
		<input type='text' name='postTitle' value='<?php echo $row['postTitle'];?>'></p>

		<p><label>Innehåll</label><br />
		<textarea name='postContent' cols='60' rows='10'><?php echo $row['postContent'];?></textarea></p>

		<p><input type='submit' name='submit' value='Skicka'></p>

	</form>

</div>

</body>
</html>	

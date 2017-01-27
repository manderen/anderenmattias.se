<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//Visa meddelande från raderafunktiuon
if(isset($_GET['delpost'])){ 

	$stmt = $db->prepare('DELETE FROM comment WHERE commentID = :commentID') ;
	$stmt->execute(array(':commentID' => $_GET['delpost']));

	header('Location: comments.php?action=raderat');
	exit;
} 

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Radera'" + title + "'"))
	  {
	  	window.location.href = 'comments.php?delpost=' + id;
	  }
  }
  </script>
</head>
<body>

	<div id="wrapper">

	<?php include('menu.php');?>

	<?php 
	//show message from add / edit page
	if(isset($_GET['action'])){ 
		echo '<h3>Meddelande '.$_GET['action'].'.</h3>'; 
	} 
	?>

	<table>
	<tr>
		<th>Namn</th>
		<th>Epost</th>
		<th>Meddelande</th>
		<th>Verktyg</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT commentID, name, email, content FROM comment ORDER BY commentID DESC');
			while($row = $stmt->fetch()){
				
				echo '<tr>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				echo '<td>'.$row['content'].'</td>';
			
				?>

				<td>
					<a href="javascript:delpost('<?php echo $row['commentID'];?>','<?php echo $row['name'];?>')">Radera</a>
				</td>
				
				<?php 
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

</div>

</body>
</html>

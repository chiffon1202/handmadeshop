<?php
	session_start();
	$id = $_GET['id'];
	if(($_SESSION['user'] == 'admin' or $_SESSION['user'] == 'editor') and is_numeric($id))
	{		
		include ('includes/db.php');
		$myquery = "DELETE FROM `gods` WHERE ID_gods = $id";
		$mq = mysql_query($myquery);
		if($_SESSION['user'] == 'editor')
		{
			header('Location: editor.php');
		}
		else
		{
		header('Location: admin.php');
		}
	}
?>
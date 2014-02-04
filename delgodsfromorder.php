<?php
	session_start();
	if($_SESSION['user'] == 'admin' or $_SESSION['user'] == 'manager')
	{		
		$id = $_GET['id'];
		include('includes/db.php');
		$myquery = "DELETE FROM `gods_in_order` WHERE ID_note = $id";		
		$mq = mysql_query($myquery);
		if($_SESSION['user'] == 'manager')
		{
			header('Location: manager.php');
		}
		if($_SESSION['user'] == 'admin')
		{
			header('Location: admin.php');
		}
	}
?>
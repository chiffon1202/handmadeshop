<?php
	session_start();
	$id = $_GET['id'];
	if(($_SESSION['user'] == 'admin' or $_SESSION['user'] == 'manager') and is_numeric($id))
	{		
		include ('includes/db.php');
		$myquery = "DELETE FROM `order` WHERE ID_order = $id";
		$mq = mysql_query($myquery);
		$myquery2 = "DELETE FROM `gods_in_order` WHERE ID_order = $id";
		$mq2 = mysql_query($myquery2);

		if($_SESSION['user'] == 'manager')
		{
			header('Location: manager.php');
		}
		else
		{
			header('Location: admin.php');
		}
	}
	else echo "You are not admin or manager";
?>
<?php
	session_start();
	//unset($_SESSION['cart']);
	$id = $_GET['iddel'];
	if($id == 0)
	{
	
	}
	else 
	{
		unset($_SESSION['cart'][$id]);
	}
	header('Location:add.php');
?>

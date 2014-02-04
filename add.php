<?php
		session_start();
			$id = $_GET['id'];
				if(is_numeric($id) and $id != "")
				{
					if(isset($_SESSION['cart'][$id]))
					{
						$_SESSION['cart'][$id]++;
					}
					else
					{
						$_SESSION['cart'][$id] = 1;
					}
				}
	header('Location:shoppingcart.php');
?>
<?php
	session_start();
	$mytitle = 'Handmade shop-order';
	$total = 0;
	include('_top.php')
	
?>	
	<div class='body'>
		<p class='location'>
			<a href='index.php'>Home</a>
			&nbsp;/&nbsp;<a href='gallery.php'>Gallery</a>&nbsp;/&nbsp;
			<span>Shopping cart</span>
		</p>
		<h3>Shopping Cart for Order</h3>
		<div class='shopping_cart'> 
		<br/>
		<?php
			include ('includes/db.php');
			if(isset($_SESSION['cart']))
			{
				$cart = $_SESSION['cart'];
				if((isset($_POST['refresh'])) && (count($_SESSION['cart']) != ""))
				{
					$number_gods = $_POST['number'];
					foreach($number_gods as $id => $num)
					{
						if($num == 0)
						{
							unset($_SESSION['cart'][$id]);
						}
						else if($num >0 && is_numeric($num))
						{
							$_SESSION['cart'][$id] = $num;
						}
						header("Location: shoppingcart.php");
					}
				}
				if(isset($_POST['add']))
				{
					header('Location: gallery.php');
				}
			}
			if(isset($_POST['add']))
			{
				header('Location: gallery.php');
			}
			if(isset($_POST['delcart']))
			{
				header('Location:delcart.php');
			}
			if(isset($_SESSION['cart'])&& isset($_POST['order']))
			{
				header('Location: Order.php');
			}
		?>
		<table class='cart'>
			<form action="shoppingcart.php" method="POST">
			<?php
				echo '<tr class="cart"><td class="cart">Name</td><td class="cart">Amount</td><td class="cart">Price</td><td class="cart">Result</td></tr>';
				if(isset($cart))
				{
					foreach($cart as $id => $numb)
					{
						$myquery = "SELECT * FROM gods WHERE ID_gods = '$id'";
					//$row = mysql_fetch_array(mysql_query("SELECT * FROM gods WHERE ID_gods in ('$id')"));
						$row = mysql_fetch_array(mysql_query($myquery));
						echo "<tr class='cart'>";
						echo "<td class='cart'>".$row[1]."</td>";
						echo '<td class="cart"><input type="text" value="'.$numb.'" name="number['.$id.']"/></td>';
						echo "<td class='cart'>".$row[2]."</td>";
						echo "<td class='cart'>".$row[2]*$numb." USD</td>";
						$total = $total + $row[2]*$numb;
			?>
			
						<td class='cart'><a href='delete.php?iddel=<?php echo $row[0];?>'>Delete</a></td>
			<?php		//echo "<td class='cart'><button class='delete' type='submit' value='Delete'/>";
						echo "</tr>";
					}
				}
			?>
			<tr><td colspan='3'>Total</td><td><?php echo $total; ?></td><td>USD</td></tr>
			<tr class='cart'>	
				<td><input type='submit' name='refresh' value='Refresh'/></td>
				<td><input type='submit' name='add' value='Add new goods'/></td>
				<td><input type='submit' name='order' value='Order'/></td>
				<td><input type='submit' name='delcart' value='Delete cart'/></td>
			</tr>
			</form>
		</table>
		<div class='info'>
		<?php
			//if(isset($_POST('order'))&&(count($_SESSION['cart'])!= ""))
			//	{
			//		echo "this";
			//	}
		?>
		</div>
		</div>	
		<div class='clear'></div>
	</div>
<?php
	include('_bottom.php');
?>	
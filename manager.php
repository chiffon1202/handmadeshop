<?php
	$mytitle ='Handmade shop-Manager';
	include ('_top.php');
	session_start();
	if(isset($_POST['log_out']))
	{
		$_SESSION['user'] = '';
		header('Location: login.php');
	}
?>
	<div class='body'>
	<?php
		if(isset($_SESSION['user']) and $_SESSION['user'] == 'manager')
		{
				echo "<form method='POST'>";
				echo "<input class='logout' type='submit' value='Log out' name='log_out'/>";
				echo "</form>";
				echo "<h2>Hello manager</h2>";
		}
		else echo "<h2>You are not manager !</h2>";
	?>
		<table class='editor'>
			<form method='POST'>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
			<?php
				if(isset($_SESSION['user']) and $_SESSION['user'] == 'manager')
				{
					echo "<tr><td class='editor'>Time</td><td class='editor'>Full name</td><td class='editor'>Email</td><td class='editor'>Telephone</td></tr>";
					include ('includes/db.php');
					$result = mysql_query("SELECT * FROM `order`");
					if(mysql_num_rows($result) > 0)
					{
						while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td class="editor">'.$row[1].'</td>';
							echo '<td class="editor">'.$row[2].'</td>';
							echo '<td class="editor">'.$row[3].'</td>';
							echo '<td class="editor">'.$row[4].'</td>';
						?>
							
							<td class="editor"><a href="delorder.php?id='<?php echo $row['ID_order'];?>'" onclick="return confirm('Do you want to delete item?')?true:false">Delete<a/></td>
						<?php	
							echo '<td class="editor"><a href="detailorder.php?id='.$row['ID_order'].'">Detail<a/></td>';
							echo "</tr>";
						}
					}	
				}
			?>
			</form>
			</table>
			<br/>
	<div class='clear'></div>
	</div>
<?php
	include('_bottom.php');
?>
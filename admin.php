<?php
	$mytitle ='Handmade shop-Admin';
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
		if(isset($_SESSION['user']) and $_SESSION['user'] == 'admin')
		{
				echo "<form method='POST'>";
				echo "<input class='logout' type='submit' value='Log out' name='log_out'/>";
				echo "</form>";
				echo "<h2>Hello administrator</h2>";
		}
		else echo "<h2>You are not administrator !</h2>";
	?>
	<?php
		if(isset($_SESSION['user']) and $_SESSION['user'] == 'admin') echo "<h3>List of gods</h3> ";
	?>
	<table class='editor'>
		<form action='' type='POST'>
		<?php
				if(isset($_SESSION['user']) and $_SESSION['user'] == 'admin')
				{
					echo '<tr class="editor"><td class="editor">Name</td><td class="editor">Price</td><td class="editor">Time</td><td class="editor">Note</td></tr>';
					include('includes/db.php');
					$result = mysql_query("SELECT*FROM Gods");
					if(mysql_num_rows($result) > 0)
					{
						while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td class="editor">'.$row[1].'</td>';
							echo '<td class="editor">'.$row[2].'</td>';
							echo '<td class="editor">'.$row[3].'</td>';							
							echo '<td class="out_note">'.$row[4].'</td>';
							echo '<td class="editor"><a href="edit.php?id='.$row['ID_gods'].'">Edit</a></td>';
							?>
							
						<td class="editor"><a href="delgods.php?id='<?php echo $row['ID_gods'];?>'" onclick="return confirm('Do you want to delete item?')?true:false">Delete<a/></td>
						<?php
							echo "</tr>";							
						}
						echo '<tr><td><a href="XMLgods.php" target="_blank">Creat XML file</a></td></tr>';
					}
				}		
		?>
		</form>
	</table>
	<?php
		if(isset($_SESSION['user']) and $_SESSION['user'] == 'admin') echo "<h3>List of order</h3> ";
	?>
			<table class='editor'>
			<form method='POST'>
			<?php
				if(isset($_SESSION['user']) and $_SESSION['user'] == 'admin')
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
						<?php	//echo '<td class="editor"><a href="delorder.php?id='.$row['ID_order'].'">Delete<a/></td>';
							echo '<td class="editor"><a href="detailorder.php?id='.$row['ID_order'].'">Detail<a/></td>';
							echo "</tr>";
						}
						echo '<tr><td><a href="XMLorders.php" target="_blank">Creat XML file</a></td></tr>';
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
<?php
	$mytitle ='Handmade shop-Editor';
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
			if(isset($_SESSION['user']) and ($_SESSION['user'] == 'editor'))
			{
				echo "<form method='POST'>";
				echo "<input class='logout' type='submit' value='Log out' name='log_out'/>";
				echo "</form>";
				echo "<h2>Hello editor</h2>";	
			}
			else echo "<h2>You are not editor !</h2>";
		?>	
			<table class='editor'>
				<form action='' type='POST'>
		<?php
				if(isset($_SESSION['user']) and $_SESSION['user'] == 'editor')
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
					}
				}	
		?>
				</form>
			</table>
	</div>
<?php
	include('_bottom.php');
?>
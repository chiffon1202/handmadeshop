<?php
	$mytitle ='Handmade shop-Editor';
	include ('_top.php');
	session_start();
	include ('includes/db.php');
	include ('AntiXSS.php');
?>
	<div class='body'>
		<?php
			if(isset($_POST['save']))
			{
				if(isset($_POST['name']) and isset($_POST['price']) and isset($_POST['time']) and isset($_POST['note']))
				{
					if(($_POST['name'] != "") and ($_POST['price'] != ""))
					{
						$id = AntiXSS::setFilter($_GET['id'],"whitelist","everything");
						$na = AntiXSS::setFilter($_POST['name'],"whitelist","everything");
						$pri = AntiXSS::setFilter($_POST['price'],"whitelist","everything");
						$tim = AntiXSS::setFilter($_POST['time'],"whitelist","everything");
						$not = AntiXSS::setFilter($_POST['note'],"whitelist","everything");
						//$not = str_replace("\r",' ',$not);
						//$not = str_replace("<",'&lt;',$not);
						//$not = str_replace(">",'&gt;',$not);
						//$not = str_replace("\n",'<br/>',$not);
						$myquery1 = "UPDATE `gods` SET `Name_gods`='$na',`Price`='$pri',`Time`='$tim',`Note`='$not' WHERE ID_gods = '$id'";
						$mq = mysql_query($myquery1);
						if($_SESSION['user'] == 'editor')
						{
							header('Location: editor.php');
						}
						else
						{
							header('Location: admin.php');
						}
					}
					else
					{
						echo "Set value Name and Price !";
					}
				}
			}
		?>
		<?php
			if($_SESSION['user'] == 'admin' or $_SESSION['user'] == 'editor')
			{
				echo "<p class='location'>";
				echo "<a href='javascript: history.go(-1)'>Back</a>";
				echo "&nbsp;/&nbsp;<span>Edit gods</span>";
				echo "</p>";
			}
		?>
		<table class='editor'>
		<form method='POST'>
			<?php
			if($_SESSION['user'] == 'admin' or $_SESSION['user'] == 'editor')
			{
				$id = $_GET['id'];
				if(is_numeric($id))
				{
					$myquery = "SELECT * FROM gods WHERE ID_gods = '$id'";
					$row = mysql_fetch_array(mysql_query($myquery));
			
					echo "<tr><td>Name<td/><input name='name' value=$row[1]></tr>";
					echo "<tr><td>Price<td/><input name='price' value=$row[2]></tr>";
					echo "<tr><td>Time<td/><input name='time' value=$row[3]></tr>";
					echo "<tr><td>Note<td/><textarea name='note'>$row[4]</textarea></tr>";
					echo "<tr><td><input type='submit' value='Save' name='save'></td></tr>";	
				}
			}
			else echo "<h2>You are not administrator or editor !</h2>";
			?>
		</form>
		</table>
	<div class='clear'></div>
	</div>
<?php
	include('_bottom.php');
?>
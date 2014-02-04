<?php
	$mytitle = "Handmade shop-Order's detail";
	include('_top.php');
	session_start();
?>
	<div class='body'>
	<?php
		if($_SESSION['user'] == 'admin' or $_SESSION['user'] == 'manager')
		{
			echo "<p class='location'>";
			echo "<a href='javascript: history.go(-1)'>Back</a>";
			echo "&nbsp;/&nbsp;<span>Oder's detail</span>";
			echo "</p>";
		}
	?>
	<table class='editor'>
		<form method='POST'>
	<?php
		if($_SESSION['user'] == 'admin' or $_SESSION['user'] == 'manager')
		{
			$total = 0;
			$id = $_GET['id'];
			echo "<tr><td class='editor'>God's name</td><td class='editor'>Amount</td><td class='editor'>Price</td><td class='editor'>Result</td></tr>";
					include ('includes/db.php');
					$result = mysql_query("SELECT * FROM `gods_in_order` tb1 join `gods` tb2 on tb1.ID_gods = tb2.ID_gods WHERE tb1.ID_order = $id");
					//echo $result;
					if(mysql_num_rows($result) > 0)
					{
						while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td class="editor">'.$row[5].'</td>';
							echo '<td class="editor">'.$row[3].'</td>';
							echo '<td class="editor">'.$row[6].'</td>';
							echo '<td class="editor">'.$row[3]*$row[6].'</td>';							
							//echo '<td class="editor"><a href="delgodsfromorder.php?id='.$row['ID_note'].'">Delete<a/></td>';
							echo "</tr>";
							$total = $total + $row[3]*$row[6];
						}
					}
		}
		else echo "<h2>You are not administrator or manager !</h2>";
	?>
	<tr><td class='editor' colspan='3'>Total</td><td class='editor'><?php echo $total;?></td></tr>
	</form></table>
	<div class='clear'></div>
	</div>
<?php
	include('_bottom.php');
?>
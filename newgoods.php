<?php
	$mytitle = 'Handmade Shop-New goods';
	include('_top.php');
?>
	<div class='body'>
		<p class='location'>
			<a href='index.php'>Home</a>
			&nbsp;/&nbsp;<a href='gallery.php'>Gallery</a>&nbsp;/&nbsp;
			<span>New goods</span>
		</p>
		<?php
			include('includes/db.php');
			//$current_time = date_default_timezone_get();
			$current_time = date('Y-m-d H:i:s',time());
			$result = mysql_query("SELECT*FROM Gods where time > date_sub(now(),interval '15' day)");
			if(mysql_num_rows($result) > 0)
			{
				while ($row = mysql_fetch_array($result))
				{
					echo "<div class='block_goods'>";
						$str=mysql_real_escape_string($row['Name_gods']);
						//$str2 = mysql_real_escape_string($row['Note']);
					echo "<img class='block_goods_img' alt='' src='img/$str.jpg'/>";
					echo "<div>$str</div><br/>";
					echo "<div class='note'>".$row['Note']."</div>";
						echo "<div class='price'>$".$row['Price'];
						echo "<a class='buy' href='add.php?id=".$row[0]."'>Buy</a>";
						echo "</div>";
					echo "</div>"; 
				}
			}
			mysql_close($con)
		?>
		<div class='clear'></div>
	</div>
<?php
	include('_bottom.php');
?>
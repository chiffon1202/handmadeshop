<?php
	$mytitle = 'Handmade shop-gallery';
	include('_top.php');
	session_start();
?>
	<div class='body'>
		<!--div id='list_goods_database'-->
		<p class='location'>
			<a href='index.php'>Home</a>
			&nbsp;/&nbsp;<span>Gallery</span><br/>
			Click <a id='here' href='newgoods.php'>here</a> to see the new goods.
		</p>
		<?php
			include('includes/db.php');
			$result = mysql_query("SELECT*FROM Gods");
			if(mysql_num_rows($result) > 0)
			{
				while($row = mysql_fetch_array($result))
				{
					echo "<div class='block_goods'>";
						$str=mysql_real_escape_string($row['Name_gods']);
					echo "<img class='block_goods_img' alt='' src='img/$str.jpg'/>";
					echo "<div>$str</div><br/>";
					echo "<div class='note'>".$row['Note']."</div>";
						echo "<div class='price'>$".$row['Price'];
			?>			
					<a class='buy' href="add.php?id=<?php echo $row['ID_gods'];?>">Buy</a>
			<?php
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
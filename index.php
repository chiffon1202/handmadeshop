<?php
	$mytitle='';
	include('_top.php');
?>
	<div class='body'>
		<div id='new_goods'>
			<img id='jpg' alt='' src='img/new_goods/1.jpg'>
			<div id='new_goods_link'><a href='newgoods.php'>New goods</a></div>		
		</div>
		<div id='top_order'>
			<img alt='' src='img/8.jpg'/>
			<div id='top_order_link'><a href='toporder.php'>Top order</a></div>
		</div>
		<div id='hit_goods'>
			<img alt='' src='img/9.jpg'/>
			<div id='hit_goods_link'><a href='hitgoods.php'>Hit goods</a></div>
		</div>
		<a href='newgoods.php'><img id='img_new' src='img/label_new_red.png' alt=''/></a>
		<br/>
		<p class='order_now'>Order now to recieve discount to 30%</p>
		
			<div class='example'>
				<div class='img_example'>
					<img alt='' src='img/Bag2.jpg'/>
					<div class='example_detail'>Hand made ​​fashion bags suitable for walking in the city, combined with fresh outfits
					<?php
						include ('includes/db.php');
						$myquery = "SELECT *FROM `gods` WHERE Name_gods='Bag2'";
						$result = mysql_query($myquery);
						if(mysql_num_rows($result) > 0)
						{
							$row = mysql_fetch_array($result);
						}
					?>
						<br/>P:35$ <a class='buy' href='add.php?id=<?php echo $row[0]?>'>Buy now</a>
					</div>
				</div>
				<div id='img_example'>
					<img alt='' src='img/Dolly.jpg'/>
					<div class='example_detail'>So cute dolly for your half in birthday or memory days
					<?php
						include ('includes/db.php');
						$myquery2 = "SELECT *FROM `gods` WHERE Name_gods='Dolly'";
						$result2 = mysql_query($myquery2);
						if(mysql_num_rows($result2) > 0)
						{
							$row2 = mysql_fetch_array($result2);
						}
					?>
						<br>P:55$ <a class='buy' href='add.php?id=<?php echo $row2[0]?>'>Buy now</a>
					</div>					
				</div>	
				<div id='img_order'><img alt='' src='img/OrderNowIcon.png'></div>	
			</div>
		</div>
		<div class='clear'></div>
	
<?php
	include('_bottom.php');
?>		
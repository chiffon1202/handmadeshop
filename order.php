<?php
	$mytitle = 'Handmade shop-order';
	include('_top.php')	
?>	
	<div class='body'>
		<h2>Enter information to fill an order</h2>
		<?php
			include('includes/db.php');
			include('AntiXSS.php');
			session_start();
			$cart = $_SESSION['cart'];
			if(isset($_POST['first_name']) && isset($_POST['last_name']) && (isset($_POST['email']) or isset($_POST['tel'])))
			{
				$time = date('Y-m-d H:i:s',time());
				$f_n = AntiXSS::setFilter($_POST['first_name'],"whitelist","everything");
				$l_n = AntiXSS::setFilter($_POST['last_name'],"whitelist","everything");
				$full_name = "$f_n $l_n";
				$e = AntiXSS::setFilter($_POST['email'],"whitelist","everything");
				$t = AntiXSS::setFilter($_POST['tel'],"whitelist","everything");
				$mq1 = "INSERT INTO `order`(`Date_Time`, `Fullname`, `Email`, `Tel`) VALUES (now(),'".$full_name."','".$e."','".$t."')";
				$myquery = mysql_query($mq1);
				$mq2 = "SELECT `ID_order`, `Date_Time`, `Fullname`, `Email`, `Tel` FROM `order` WHERE Date_time = now()";
				
				$myquery2 = mysql_fetch_array(mysql_query($mq2));
				$tim = $myquery2['ID_order'];
				
				foreach($cart as $id => $numb)
					{
						$mq3 = "INSERT INTO `gods_in_order`( `ID_gods`, `ID_order`, `Amount`) VALUES ('".$id."','".$tim."','".$numb."')";
						
						$myquery3 = mysql_query($mq3);
					}
			}
			if(isset($_POST['send']))
			{	
				$_SESSION['order'] = '1';		
				header('Location: delcart.php');
			}
		?>
		<form action = '' method='POST'>
			<table class='info'>
				<tr><td>First name</td><td><input type='text' name='first_name'/></td></tr>
				<tr><td>Last name</td><td><input type='text' name='last_name'/></td></tr>
				<tr><td>Email</td><td><input type='text' name='email'/></td></tr>
				<tr><td>Tel</td><td><input type='text' name='tel'/></td></tr>
				<tr><td></td><td><input type='submit' name='send' value='Send'></td></tr>
			</table>
		</form>
		<div class='clear'></div>	
		</div>
<?php
	include('_bottom.php');
?>	
<?php
	$mytitle = "Handmade Shop-Login";
	session_start();
	$_SESSION['order'] = '';
	$_SESSION['create'] = '';
	$_SESSION['user'] = '';
	include('_top.php');	
?>
	<div class='body'>
		<p class='location'>
			<a href='index.php'>Home</a>
			&nbsp;/&nbsp;<span>Login</span>
		</p>
<?php
	$user = '';
	$pass = '';
	if(isset($_POST['u_name']) and isset($_POST['u_pass']))
	{
		$user = mysql_real_escape_string($_POST['u_name']);
		$pass = mysql_real_escape_string($_POST['u_pass']);
		include('includes/db.php');
		$myquery = "SELECT * FROM `users` WHERE user_name = '$user' and password = '$pass'";
		$result = mysql_query($myquery);
		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result);
				if($row[1] == 'admin')
				{	
					$_SESSION['user'] = 'admin';
					header('Location: admin.php');
				}
				if($row[1] == 'editor')
				{	
					$_SESSION['user'] = 'editor';
					header('Location: editor.php');
				}
				if($row[1] == 'manager')
				{	
					$_SESSION['user'] = 'manager';
					header('Location: manager.php');
				}
			}
			else
			{
				echo '<h2>Wrong login or password!</h2>';
			}			
		}
	}
?>		
		<h1 class='Slogan'>Welcome to site !<h1>
			<form method='post' action=''>
				<table class='login'>
					<tr><td>Login: </td><td><input name="u_name"/></td>
					<tr><td>Password: </td><td><input type='password' name="u_pass"/></td>
					<tr><td><td><input type='submit' value='OK'></td>
				</table>
			</form>	
<?php
 	if(Empty($_POST['u_name']) or Empty($_POST['u_pass']))
	{
		echo "<h2>*Enter user's name and password*</h2>";
	}
?>			
	</div>
	<div class='clear'></div>
	
<?php
	include('_bottom.php');
?>
<?php
			$con = mysql_connect("localhost","root","");
			if(!$con)
			{
				die('Can not connect to database: '.mysql_error());
			}
			mysql_select_db("myshop",$con) or die ("Do not chose database");
?>



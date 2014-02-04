<?php
	session_start();
	if($_SESSION['user'] == 'admin')
	{  	
		$doc = new DOMDocument();
		$doc -> formatOuput = true;
		
		if(!file_exists('XMLorder.xml'))
		{
			$doc->appendChild($doc->createElement('orders'));
			$doc->save('XMLorders.xml');
		}
		
		$root = $doc->getElementsByTagName('orders');
		if($root->length == 0)
		{
			$doc->appendChild($doc->createElement('orders'));
		}
		$f = $doc->createDocumentFragment();
		include('includes/db.php');
		$myquery = "SELECT * FROM `order`";
		$result = mysql_query($myquery);
		if(mysql_num_rows($result) > 0)
		{
			while($row = mysql_fetch_array($result))
			{	
				
				$item = $doc->createElement('order');
				$item->appendChild($doc->createElement('id',$row[0]));
				$item->appendChild($doc->createElement('time',$row[1]));
				$item->appendChild($doc->createElement('fullname',$row[2]));
				$item->appendChild($doc->createElement('email',$row[3]));
				$item->appendChild($doc->createElement('telephone',$row[4]));
				
				$f->appendChild($item);
			}
		}
		$doc->documentElement->appendChild($f);
		$doc->save('XMLorders.xml');
		$_SESSION['create'] = '1';
		//echo '<script type="text/javascript">alert("Create successfully !")</script>';
		
	}
	header('Location: XMLorders.xml');
?>

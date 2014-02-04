<?php
	session_start();
	if($_SESSION['user'] == 'admin')
	{  	
		$doc = new DOMDocument();
		$doc -> formatOuput = true;
		
		if(!file_exists('XMLgods.xml'))
		{
			$doc->appendChild($doc->createElement('gods'));
			$doc->save('XMLgods.xml');
		}
		//@$doc->load('XMLgods.xml');
		
		$root = $doc->getElementsByTagName('gods');
		if($root->length == 0)
		{
			$doc->appendChild($doc->createElement('gods'));
		}
		$f = $doc->createDocumentFragment();
		include('includes/db.php');
		$myquery = "SELECT * FROM `gods`";
		$result = mysql_query($myquery);
		if(mysql_num_rows($result) > 0)
		{
			while($row = mysql_fetch_array($result))
			{
				//echo $row['ID_gods'];
				$item = $doc->createElement('god');
				$item->appendChild($doc->createElement('id',$row[0]));
				$item->appendChild($doc->createElement('name',$row[1]));
				$item->appendChild($doc->createElement('price',$row[2]));
				$item->appendChild($doc->createElement('time',$row[3]));
				$item->appendChild($doc->createElement('note',$row[4]));
				
				$f->appendChild($item);
			}
		}
		$doc->documentElement->appendChild($f);
		$doc->save('XMLgods.xml');	
		$_SESSION['create'] = '1';		
		//echo '<script type="text/javascript">alert("Create successfully !")</script>';
		
	}
	header('Location: XMLgods.xml');
	//header('Location: admin.php');
?>

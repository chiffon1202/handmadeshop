<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<?php
		
		//lang="en" xmlns="http://www.w3.org/1999/xhtml"
			if($mytitle =='')
			{
				echo "<title>Handmade Shop Online Chiffon !</title>";
			}
			else 
			{
				echo "<title>{$mytitle}</title>";
			}
		?>
		
		<link rel='stylesheet' href='style.css' type='text/css'/>	
	</head>
	
	<body>
		<script type='text/javascript'>
			        //change_image
        var images = new Array();
        var index = 0;
        var max_image = 6;
        for (index = 0; index <= max_image; index++) {
            var i = index + 1;
            images[index] = new Image;
            images[index].src = 'img/new_goods/' + i + '.jpg';
        }
        function autochange() {
            index++;
            if (index >= max_image) index = 0;
            document.getElementById('jpg').src = images[index].src;
        }
        var i = setInterval('autochange()', 3500);
		</script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>	
		
		<div id='line_slogan'>
			<div id='slogan'>Handmade
				<img alt='' src='img/head_img.jpg'>
			</div>			
			<div id='contact'>
				<div>Tel : (+7)952-887-92-56 <br/>
					 Email : chiffon1202@gmail.com
				</div>
				
			</div>
		</div>
			<nav>
				<!--img src='img/img-head'/-->
				<a href='index.php'>Home</a>
				<a href='aboutus.php'>About us</a>
				<a href='gallery.php'>Gallery</a>
				<a href='shoppingcart.php'>Shopping Cart</a>
				<a href='address.php'>Contact</a>
				<a href='login.php'>Login</a>
			</nav>
			
<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>AF Carpentry</title>

<link href='http://fonts.googleapis.com/css?family=IM+Fell+English+SC' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />



<script src="scripts/jquery.min.js"></script>
<script src="scripts/jquery.backstretch.min.js"></script>
<script>
	$.backstretch("images/wood.gif");
</script>




</head>

<body>
	<div id="main_content">
	
		<div id="wrapper">
			<?php include("header.php"); ?>
			
			<div id="content">
				<nav>
					<ul>
	        			<li><a href="index.php">Home</a></li>
	            			<li><a href="services.php">Services</a></li>
	           			<li id="active"><a href="estimate.php">Free Estimate</a></li>
	            			<li><a href="contact.php">Contact Us</a></li>
	            			</ul>
	       			</nav>
	       			<article>
	       			Fill out the form below for your free estimate or <a href="contact.php" style="color:white"><u>contact</u></a> us.</br>
				</article>
				<form id="estimateform" class="rounded" method="post" action="send_estimate.php">
					<h3>ESTIMATE FORM</h3>
					 </br>
					<div class="field">
					    <label for="name">Name:</label>
					    <input type="text" class="input" name="name" id="name" />
					    <p class="hint">Enter your name.</p>
					</div>
					
					<div class="field">
					    <label for="address">Address:</label>
					    <input type="text" class="input" name="address" id="address" />
					    <p class="hint">Enter your address.</p>
					</div>
					
					<div class="field">
					    <label for="city">City:</label>
					    <input type="text" class="input" name="city" id="city" />
					    <p class="hint">Enter your city.</p>
					</div>
					
					<div class="field">
					    <label for="state">State:</label>
					    <input type="text" class="input" name="state" id="state" />
					    <p class="hint">Enter your state.</p>
					</div>
					
					<div class="field">
					    <label for="telephone">Phone:</label>
					    <input type="text" class="input" name="telephone" id="telephone" />
					    <p class="hint">Enter your phone.</p>
					</div>
					
					<div class="field">
					    <label for="email">Email:</label>
					    <input type="text" class="input" name="email" id="email" />
					    <p class="hint">Enter your email.</p>
					</div>
					
					<div id="checkboxes" style="margin:10px 0 0 0; width:500px; height:85px;">
						
						<label for="type">Select the type of work you need:</label>
						<div class="field" id="formcol1">
							
							<ul><input name="cabinets" value="yes" type="checkbox">Cabinets</ul>
							<ul><input name="wall_panels" value="yes" type="checkbox">Wall Panels</ul>
							<ul><input name="handrails" value="yes" type="checkbox">Handrails</ul>
							<ul><input name="furniture" value="yes" type="checkbox">Furniture</ul>
							
							
						</div>
						
						<div class="field" id="formcol2">	
							<ul><input name="doors" value="yes" type="checkbox">Doors</ul>
							<ul><input name="corian" value="your_value" type="checkbox">Corian Countertops</ul>
							<ul><input name="libraries" value="your_value" type="checkbox">Libraries</ul>
							<ul><input name="bars" value="your_value" type="checkbox">Bars</ul>		
						</div>
					</div>
					 
					<div class="field">
						<label>.</label>
						<ul><input name="other" value="yes" type="checkbox">Other (specify below)</ul>	
						<textarea class="input textarea" name="specify" id="specify">
						</textarea>
						<p class="hint">Specify</p> 
					</div>
					
					<div class="field" style="margin-top:10px;">
						<label for="details">Extra details</label>
						<textarea class="input textarea" name="details" id="details">
						</textarea>
						<p class="hint">Write your details.</p>
					</div>
					 
					<input type="submit" name="Submit"  class="button" value="Submit" />
				</form>		
			</div><!-- end content -->
			<?php include_once("footer.php");?>
			
		</div><!-- end wrapper -->
	</div><!-- end main content -->
	
	<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.nivo.slider.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
	</script>

</body>
</html>
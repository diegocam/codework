
 index.php 
HTML document text
<!DOCTYPE HTML>

<head>
<title>Don Alex Restaurant</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Don Alex Restaurant is a family owned and operated restaurant offering guests a fun and casual dining experience. 
						  We opened our doors in New Jersey since 1998. Our specialty is the authentic rotisserie chicken “Pollo a la Brasa” 
						  along with many other of our delights. For your convenience, we have three different locations around the area; 
						  Elizabeth, Union and Kenilworth"/>
<meta name="keywords" content="don alex restaurant, don, alex, peru food, NJ, Elizabeth, kenilworth, garwood, union, New Jersey, pollo a la brasa, comida peruana, NY, peruvian, ethnic, spanish, dine, rotisserie, latin, spanish, ethnic."/>
<link href="/images/favicon.ico" rel="icon" type="image/x-icon" />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=McLaren' rel='stylesheet' type='text/css'>

<!--Backstretch-->
<script src="scripts/jquery.min.js"></script>
<script src="scripts/jquery.backstretch.min.js"></script>
<script>
	$.backstretch("images/eating.jpg");
</script>
<!--end of backstretch-->

<script type="text/javascript" src="scripts/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="scripts/slideshow.js"></script>

<link rel="stylesheet" href="css/slideshow.css" type="text/css"  />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />



<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30238524-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>


<body>

	<!--start of Main Content in page -->
	<div id="main_content">
		<div id="HeaderBackground"></div>
	    	<div id="wrapper">
		    <?php include_once("header.php");?> 
		    
		    <div id="section_header">WELCOME</div>
		    	<div id="content">
			    	<!--Start Slide show-->
				<div id="slideshow">
				        <img src="images/gallery/jalea.jpg"  alt="Slideshow Image 1" class="active" />
				        <img src="images/gallery/parrillada1.jpg"  alt="Slideshow Image 2" />
				        <img src="images/gallery/parrillada2.jpg"  alt="Slideshow Image 3" />
				        <img src="images/gallery/pollo.jpg"  alt="Slideshow Image 4" />
				</div>
				<!-- End slideshow -->
				
				<section>
					<article>
						  Don Alex Restaurant is a family owned and operated restaurant offering guests a fun and casual dining experience. 
						  We opened our doors in New Jersey in 1998. Our specialty is the authentic rotisserie chicken “Pollo a la Brasa” 
						  along with many other of our delights. For your convenience, we have three different locations around the area; 
						  Elizabeth, Union and Kenilworth.</br>
 								We look forward to hearing from you.

							     
					</article>
					
					<br/><br/><br/><br/><br/><br/><br/>
					
			    		
				</section>
			</div>
			<?php include_once("footer.php");?>
			 
		</div> <!-- End of wrapper-->
		
	</div>  <!-- End of Main Content-->
	
</body>

</html>
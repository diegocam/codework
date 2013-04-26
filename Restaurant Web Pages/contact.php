
 contact.php 
PHP script text
<?php session_start(); ?>
<!DOCTYPE HTML>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Don Alex Restaurant</title>
<link href="/images/favicon.ico" rel="icon" type="image/x-icon" />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>

<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/contact.css" rel="stylesheet" type="text/css" />
	
<script src="scripts/jquery.min.js"></script>
<script src="scripts/jquery.backstretch.min.js"></script>
<script>
	$.backstretch("images/family.jpg");
</script>


	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">

	<script src="js/libs/modernizr-1.7.min.js"></script>


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
			<div id="section_header">CONTACT US</div>
		
			<div id="content">
					<address>
						<u>Elizabeth</u>:</br>
						354 Rahway Ave. </br>
						Elizabeth, NJ 07202<br/>
						(908) 354-9270</br></br>
						
						<u>Union</u>:</br>
						1988 Morris Ave. </br>
						Union, NJ 07083<br/>
						(908) 378-5695</br></br>
						
						<u>Kenilworth</u>:</br>
						625 N. Michigan Ave. </br>
						Kenilworth, NJ 07033<br/>
						(908) 349-8060</br></br>
						
					</address>
						
				<section>
					
					<article>
						
						<div id="contact-form" class="clearfix">  
						    <h1>Questions | Comments | Concerns: </h1>  
						    <h2>Reach out to us! we will reply as soon as possible</h2>  
						   <?php
							//init variables
							$cf = array();
							$sr = false;
							
							if(isset($_SESSION['cf_returndata'])){
								$cf = $_SESSION['cf_returndata'];
							 	$sr = true;
							}
				            	   ?>
				            	   
				                 <ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
				                <li id="info">There were some problems with your form submission:</li>
				                
				                <?php 
								if(isset($cf['errors']) && count($cf['errors']) > 0) :
									foreach($cf['errors'] as $error) :
								?>
				                <li><?php echo $error ?></li>
				                <?php
									endforeach;
								endif;
						?>
            					</ul>
            					<p id="success" class="<?php echo ($sr && $cf['form_ok']) ? 'visible' : ''; ?>">Thanks for your message! We will get back to you ASAP!</p>
						    <form method="post" action="process.php">  
						        <label for="name">Name: <span class="required">*</span></label>  
						        <input type="text" id="name" name="name" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['name'] : '' ?>" placeholder="your name goes here" required="required" autofocus="autofocus" />  
						  
						        <label for="email">Email Address: <span class="required">*</span></label>  
						        <input type="email" id="email" name="email" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" placeholder="your email goes here" required="required" />  
						  
						        <label for="telephone">Telephone: </label>  
						        <input type="tel" id="telephone" name="telephone" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['telephone'] : '' ?>"  placeholder="your phone # goes here"/>  
						  
						        
						       
						  
						        <label for="message">Message: <span class="required">*</span></label>  
						        <textarea id="message" name="message" placeholder="Your message must be greater than 10 characters" required="required" data-minlength="10"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['message'] : '' ?></textarea>  
						  
						        <span id="loading"></span>  
						        <input type="submit" value="Send" id="submit-button" />  
						        <p id="req-field-desc"><span class="required">*</span> indicates a required field</p>  
						    </form>  
						    <?php unset($_SESSION['cf_returndata']); ?>
						</div>  
					</article> 
		    		</section>
		   	</div>
			<?php include_once("footer.php");?>
		</div> <!-- End of wrapper-->
		
	</div>  <!-- End of Main Content-->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>
	<!--[if lt IE 7 ]>
	<script src="js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->
	
</body>
  

</html>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Keith Winfield - Portfolio</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="parallax.js"></script>
	<link href="gridstyle.css" rel="stylesheet" type="text/css">
	
</head>
<body class="body">
	<header id="header">
	<div>
		<h1><a href="index.html">KW</a></h1>
		</div>
	<div id="smallnav">
	    <nav>
		<a class="menuicon"></a>
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="portfolio.html">Portfolio</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
		
		</nav>
	</div>
	</header>
	<div class="fly-in-text hidden">		
		<ul>
			<li>C</li>
			<li>o</li>
			<li>n</li>
			<li>t</li>
			<li>a</li>
			<li>c</li>
			<li>t</li>
		</ul>
		
		
	</div>
	
	<div class="contactbody">
		<?php
		if(isset($_POST['email'])) {
		 
		    $email_to = "keith.r.winfield@gmail.com";
		    $email_subject = "Portfolio Message";
		 
		    function died($error) {
		        // your error code can go here
		        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
		        echo "These errors appear below.<br /><br />";
		        echo $error."<br /><br />";
		        echo "Please go back and fix these errors.<br /><br />";
		        die();
		    }
		 
		 
		    // validation expected data exists
		    if(!isset($_POST['firstName']) ||
		        !isset($_POST['lastName']) ||
		        !isset($_POST['email']) ||
		        !isset($_POST['message'])) {
		        died('We are sorry, but there appears to be a problem with the form you submitted.');       
		    }
		 
		     
		 
		    $first_name = $_POST['firstName']; // required
		    $last_name = $_POST['lastName']; // required
		    $email_from = $_POST['email']; // required
		    $comments = $_POST['message']; // required
		 
		    $error_message = "";
		    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		 
		  if(!preg_match($email_exp,$email_from)) {
		    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
		  }
		 
		    $string_exp = "/^[A-Za-z .'-]+$/";
		 
		  if(!preg_match($string_exp,$first_name)) {
		    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
		  }
		 
		  if(!preg_match($string_exp,$last_name)) {
		    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
		  }
		 
		  if(strlen($comments) < 2) {
		    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
		  }
		 
		  if(strlen($error_message) > 0) {
		    died($error_message);
		  }
		 
		    $email_message = "Form details below.\n\n";
		 
		     
		    function clean_string($string) {
		      $bad = array("content-type","bcc:","to:","cc:","href");
		      return str_replace($bad,"",$string);
		    }
		 
		     
		 
		    $email_message .= "First Name: ".clean_string($first_name)."\n";
		    $email_message .= "Last Name: ".clean_string($last_name)."\n";
		    $email_message .= "Email: ".clean_string($email_from)."\n";
		    $email_message .= "Comments: ".clean_string($comments)."\n";
		 
		//email headers
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);  
		?>
		 
		<!-- include your own success html here -->
		 
		Thank you for contacting me. I will be in touch with as soon as possible.<br><br>
		 
		<?php
		 
		}
		?>
		<form name="contactform" method="post" action="<?php echo $PHP_SELF;?>">
		<p>
		<label for="firstName">First Name:</label><br>
		<input type="text" name="firstName" id="firstName" <?php if(isset($_POST['firstName']) === true) { echo 'value="',strip_tags($_POST['firstName']), '"'; }?>>
		</p>
		<p>
		<label for="lastName">Last Name:</label><br>
		<input type="text" name="lastName" id="lastName" <?php if(isset($_POST['lastName']) === true) { echo 'value="',strip_tags($_POST['lastName']), '"'; }?>>
		</p>
		<p>
		<label for="email">E-mail:</label><br>
		<input type="text" name="email" id="email" <?php if(isset($_POST['email']) === true) { echo 'value="',strip_tags($_POST['email']), '"'; }?>>
		</p>
		<p>
		<label for="message">Leave a Message:</label><br>
		<textarea name="message" id="message" <?php if(isset($_POST['message']) === true) { echo 'value="',strip_tags($_POST['message']), '"'; }?>></textarea>
		</p>
		<p>
		<input type="submit" id="submit" value="Send">	
		</p>
		</form>
	</div>
	<script type="text/javascript">
		$(function(){
			$('.menuicon').click(function(){
			$('header nav ul').toggleClass('open');
		
		});	
		});
			
		$(function(){
			setTimeout(function(){
				$('.fly-in-text, .mainaboutpic, .contactbody').removeClass('hidden');
			},500);
			})();
	</script>
		
		
</body>

</html>
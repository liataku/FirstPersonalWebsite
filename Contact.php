<?php

include("Includes/header.php");

?>

<link rel="stylesheet" type="text/css" href="Includes/con.css"></i>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">

  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"> <i class="fa fa-id-card" aria-hidden="true"></i> <span class="selection"> Patrick Boucicault</span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">

        <li><a href="index.php"><span class="selection">Home</span><span class="sr-only">(current)</span></a></li>

         <li><a href="about.php"><span class="selection">About me</span><span class="sr-only">(current)</span></a></li>

        <li><a href="resume.php"><span class="selection">Resume</span></a></li>

        <li class="active"><a href="Contact.php"><span class="selection">Contact</span></a></li>
        <li><a href="projects.php"><span class="selection">Projects</span></a></li>
<!-- 
        <li><a href="gallary.html"><span class="selection">Gallary</span></a></li> -->
        
      </ul>
      
     
    </div><!-- /.navbar-collapse -->

        
  </div><!-- /.container-fluid -->
</nav>



<?php
	
		// Check for Header Injections
		function has_header_injection($str) {
			return preg_match( "/[\r\n]/", $str );
		}
		
		
		if (isset($_POST['Submit_c'])) {
			
			
			$firstname	= trim($_POST['firstname']);
			$lastname = trim($_POST['lastname']);
			$email	= trim($_POST['Email']);
			$msg	= $_POST['Message']; // no need to trim message
		
		
			if (has_header_injection($firstname) || has_header_injection($email) || has_header_injection($lastname)) {
				
				die();
				
			}
			
			if (!$firstname || !$email || !$lastname || !$msg) {
				echo '<h4 class="error">All fields required.</h4><a href="Contact.php" class="button block">Go back and try again</a>';
				exit;
			}
			
			// Add the recipient email to a variable
			$to	= "patrickjoshuab@gmail.com";
			
			// Create a subject
			$subject = "$name sent a message via your contact form";
			
			// Construct the message
			$message .= "Name: $firstname $lastname\r\n";
			$message .= "Email: $email\r\n\r\n";
			$message .= "Message:\r\n$msg";
			
			// If the subscribe checkbox was checked
			if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe' ) {
			
				// Add a new line to the $message
				$message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
				
			}
		
			$message = wordwrap($message, 72); // Keep the message neat n' tidy
		
			// Set the mail headers into a variable
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$headers .= "From: " . $firstname+$lastname . " <" . $email . ">\r\n";
			$headers .= "X-Priority: 1\r\n";
			$headers .= "X-MSMail-Priority: High\r\n\r\n";
		
			
			// Send the email!
			mail($to, $subject, $message, $headers);
		?>

		<div class="thanks">
		
		<h5>Thanks for contacting me!</h5>
		<p><a href="index.php" class="button block">&laquo; Go to Home Page</a>
		</p>
		</div>
		
		<?php
			} else {
		?>

		
	 <form action="#" method="post">

	 <div class="container">
	 <div class="jumbotron">
	 	<div class="contact">
	 	<h1>Contact me</h1>
	 	</div>

	 </div>

		 	 FirstName: <br>
		 	 <input type="text" name="firstname" placeholder="John" required="true" class="text"> <br> 
		 	 LastName: <br>
		 	 <input type="text" name="lastname" placeholder="Smith" required="true" class="text"> <br>
		 	 Email: <br>
		 	<input type="text" name="Email" placeholder="abc123@gmail.com" required="true" class="text"> <br><br>
		 	 Message: <br>
		 	<!--  <input type="text" name="Message" placeholder="Type your message here" required="true"> <br> <br> -->

		 	<textarea name="Message" placeholder="optional" id="message" > 
		 		
		 	</textarea><br>


		 	 <br> <br>

		 	 <input type="Submit" name="Submit_c" id="subscribe">


		 	<br>
		 	</div>


   </form>

		<?php
			}
		?>
	</div><!-- contact -->


















</body>



</html>
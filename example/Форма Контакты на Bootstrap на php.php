<?php

	$error = "";
	$successMessage = "";

	if ($_POST) {

		
		if (!$_POST["email"]){

			$error .="An email addres is required.<br>";
		}
		if (!$_POST["content"]){

			$error .="An content addres is required.<br>";
		}
		if (!$_POST["subject"]){

			$error .="An subject addres is required.<br>";
		}

		
		if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
		 
		  $error .="The email address is invalid.<br>";

		}

		if ($error != "") {

			$error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>'.$error.'</div>';

		} else {

			$emailTo = "test@localhost.net";

			$subject = $_POST["subject"];

			$content = $_POST["content"];

			$headers = "From:".$_POST["email"];

			if (mail($emailTo, $subject, $content, $headers)) {
				
				$successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we will sent to You!</div>';

			} else {

				$error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - please try again later!</div>';
			}
		}
 
	}
	
?>

<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>

  <body>

  	<div class="container">
  		
  		<h2>Get in touch!</h2>

  		<div id="error"><?php echo $error; echo $successMessage; ?></div>

		<form method="post">
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email address">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="subject">Subject</label>
		    <input type="text" class="form-control" name="subject" id="subject">
		  </div>
		  <div class="form-group">
		    <label for="content">What would you like to ask us?</label>
		    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
		  </div>
		  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
		</form>

  	</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!--<script type="text/javascript">

    	$("form").submit(function(e){
        	e.preventDefault();

        	var error = "";

        	if ($("#subject").val() == "") {

        		error += "The subject field is required.<br>";
        	}

        	if ($("#content").val() == "") {

        		error += "The content field is required.";
        	}

        	if ($("#email").val() == "") {

        		error += "The email field is required.";
        	}

        	if (error != "" ) {

        		$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
        	} else {

        		$("form").unbind('submit').submit();
        	}

    	});
    	    	

    </script> -->
  
  </body>
</html>
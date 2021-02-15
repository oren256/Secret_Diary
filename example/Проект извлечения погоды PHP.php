<?php
	
	$weather = "";
	$error = "";

	if (array_key_exists('city', $_GET)) {

		$file_headers = @get_headers("http://www.completewebdevelopercourse.com/locations/".$_GET['city']);

		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {

    		$error = "That city could not be found.";

		} else {

		$forecastPage = file_get_contents("http://www.completewebdevelopercourse.com/locations/".$_GET['city']);
		
		$pageArray = explode(' 3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);

			if (sizeof($pageArray) > 1) {
				
					$secondPageArray = explode('</span></span></span>', $pageArray[1]);

					if (sizeof($secondPageArray) > 1) {

						$weather = $secondPageArray[0];
						
					} else {

						$error = "That city could not be found.";
					}
					

			} else {

				$error = "That city could not be found.";

			}
		
		}
	}

	

	
	
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Weather Scraper</title>

    <style type="text/css">

    body {

    	background: none; 
    }

    html { 
		background: url(sea.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}

    .container {

        text-align: center;
        margin-top: 100px;
        width: 550px;
        
    }

    input {

    	margin: 20px 0;
    }

    #weather {

    	margin-top: 15px;

    }

    

    	


    </style>



  </head>

  <body>

  	<div class="container">
  		
		<h1>What's The weather today?</h1>

		<form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Enter the name of a city.</label>
		    <input type="text" class="form-control" name="city" id="city"  placeholder="Eg. London, Tokyo" value ="<?php

		    	if (array_key_exists('city', $_GET)) {

		     		echo $_GET['city']; 
		     	}

		     	?>">
		 </div>

		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>

		<div id="weather">

		<?php 

			if ($weather) {
				
				echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';

			} else if ($error) {

				echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';

			}
		?>

		</div>

  	</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>

<?php

	/*
	$link = mysqli_connect("localhost", "rob", "TwZ98K+", "bd");

	if (mysqli_connect_error()) {

		die ("There was an error connecting to the database");

	} 

	//$query = "INSERT INTO users (email, password) VALUES('migel@mail.ru','dprmDura')";

	//$query = "UPDATE users SET password = '69KOL+' WHERE email = 'lolyou@mail.ru' LIMIT 1";

	//mysqli_query($link, $query);

	//$query = "SELECT * FROM users WHERE id >= 2 AND email LIKE '%n%'";

	
	$name = "Rob O'Grady";
	SQL Инъекция для защиты Базы $query = "SELECT * FROM users WHERE name = '".mysqli_real_escape_string($link, $name)." ' ";
	

	$query = "SELECT * FROM users WHERE name = 'Rob Grady'";

	if ($result = mysqli_query($link, $query)) {

		while ($row = mysqli_fetch_array($result)){

			print_r($row)."<br>";
		}
	}
	*/

	session_start();


	$link = mysqli_connect("localhost", "rob", "TwZ98K+", "bd");

	if (mysqli_connect_error()) {
		die ("There was an error connecting to the database");
	} 

	if (array_key_exists("email", $_POST) OR array_key_exists("password", $_POST)){

		if ($_POST["email"] == "") {
			echo "<p>Email adress is required.</p>";

		} else if ($_POST["password"] == "") {
			echo "<p>Password is required.</p>";
		
		} else {

			$query = "SELECT id FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST["email"])."'";
			$result = mysqli_query($link, $query);

			if (mysqli_num_rows($result) > 0 ) {
				echo "<p>This email adress has alredy been taken.</p>";
			} else {

				$query = "INSERT INTO users (email, password) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
				


				if (mysqli_query($link, $query)) {

					$_SESSION['email'] = $_POST['email'];

					header("Location:session.php");

				} else {

					echo "<p>There was a problem signing you up - please try again later.</p>";
				}
			

			}
		}

	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Форма с SQL</title>
</head>

<body>

	<h2>Заполните форму</h2>
	<form method = "post">

		<input type="text" name="email" placeholder="Email adress">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" value="Sign Up!">
		
	</form>



</body>
</html>

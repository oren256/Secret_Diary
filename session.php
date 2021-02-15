<?php

	session_start();

	if ($_SESSION['email']) {
		echo "Hi! You are logged in sistem.";
	} else {

		header("Location: index.php");
	}

?>
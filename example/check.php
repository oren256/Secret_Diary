<?php
	
	if ($_POST["name"] == "") {
		echo "Введите имя. <a href='/'>Исправить</a>";
	} else {
		header("Location:index.php");
	}







 ?>
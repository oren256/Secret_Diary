<?php
	session_start();
	if ($_GET["send"] == 1){
		echo "Вы успешно оьправили сообщение на email".$_SESSION["to"];
	}



?>
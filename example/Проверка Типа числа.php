	
<?php
	$x = 15;
	if (isset ($x)) {
		echo "Переменная существуетx x = $x";
	} else {
		echo "Переменная  не существует";
	}
	echo "<br />";

	$x = "3.25";
	$bool = true;
	$null = 0;

	echo "Is Numeric -".is_numeric($x)."<br />";
	echo "Is Intenger -".is_integer($x)."<br />";
	echo "Is Double -".is_double($x)."<br />";
	echo "Is String -".is_string($x)."<br />";
	echo "Is Boolean -".is_bool($bool)."<br />";
	echo "Is Scalar -".is_scalar($bool)."<br />";
	echo "Is Null -".is_null($null)."<br />";
	echo "Is Array -".is_array($null)."<br />";
	echo "Type -".gettype($null)."<br />";







	
	
?>










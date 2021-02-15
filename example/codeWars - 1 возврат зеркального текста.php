	
<?php

	function spinWords(string $str): string {
  		
  		$spinArray = explode(" ", $str);

  		foreach ($spinArray as &$value) {
  			$count = strlen($value);
  			if ($count >= 5) {
  				$value = strrev($value);
  			}
  		}
  		$spinArray = implode(" ", $spinArray);
  		return $spinArray;
	}

	echo spinWords("Hey wollef sroirraw");


?>
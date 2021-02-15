	
<?php

  function likes(array $names): String {
      
      $numberLikes = count($names);

      if ($numberLikes < 1) {
        return "no one likes this";
      } elseif ($numberLikes < 2) {
        return $names[0]." likes this";
      } elseif ($numberLikes < 3) {
        return $names[0]." and ".$names[1]." like this";
      } elseif ($numberLikes < 4) {
        return $names[0].", ".$names[1]." and ".$names[2]." like this";
      } elseif ($numberLikes >= 4) {
        return $names[0].", ".$names[1]." and ".($numberLikes - 2)." others like this";
      }

  }

  echo likes (  [ 'Alex', 'Jacob', 'Mark', 'Max' ] );


?>
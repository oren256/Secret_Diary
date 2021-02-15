	
<?php

  $message = "What happen?";
  $to = "test@localhost.net";
  $subject = "Тема сообщения";
  $subject = "=utf-8?B?".base64_encode($subject)."?=";
  $from = "bobr@mail.ru"
  $headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=utf-8\r\n";

  mail($to, $subject, $message, $headers);





?>
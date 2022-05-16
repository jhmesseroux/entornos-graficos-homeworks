<?php

$to = 'messerouxhilaire@gmail.com';
$subject = 'hello';
$message = '<h1>yowwwww</h1>';
$headers = 'From: hiliare@messeroux.com\r\n';
$headers .= 'Reply-To: example@gmail.com\r\n';
$headers .= 'Content-type: text/html\r\n';
mail($to, $subject, $message, $headers);
echo 'mail enviado con exito';
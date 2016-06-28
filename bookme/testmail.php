
<?php
$to      = 'nbukhar2@masonlive.gmu.edu';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webm...@example.com' . "\r\n" .
    'Reply-To: webm...@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>

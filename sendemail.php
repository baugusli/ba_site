<?php

    $name = trim(stripslashes($_POST['contactName'])); 
    $email = trim(stripslashes($_POST['contactEmail'])); 
    $subject = trim(stripslashes($_POST['contactSubject'])); 
    $message = trim(stripslashes($_POST['contactMessage'])); 
	


    $email_from = $email;
    $email_to = 'bryan_augusli@hotmail.com';

	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: <'.$email_from.'>'. "\r\n";
	
	if($_POST['contactCC'] == 'cc'){
	   
	   $headers .= 'Cc:'. $email_from ."\r\n";	
   }


	
	$headers .= 'Bcc:poliang13@gmail.com' . "\r\n";
	
	
    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = mail($email_to, $subject, $body, $headers);
 
    echo $success;
	
	?>
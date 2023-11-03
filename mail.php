<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

// Create a PHPMailer instance
$mail = new PHPMailer();

// Configure your SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
      $mail->Port = 465;
      $mail->SMTPSecure = 'ssl';
      $mail->SMTPAuth = true;
      $mail->AuthType = 'LOGIN';
      $mail->Username = '18project03@gmail.com';
      $mail->Password = 'jhwiwlwpdahdofnc';


// Sender and recipient details
$mail->setFrom('18project03@gmail.com', 'Sani.s Art Gallary');
      $mail->addAddress('sanketwalhekar83@gmail.com', 'Dear User');

    // Set email content
      $mail->Subject = 'Your order Updates';
$mail->isHTML(true);

// Content with embedded image
$message = '
<html>
<body>
<p>Email with an embedded image:</p>
<img src="cid:attached_image" alt="Embedded Image">
</body>
</html>';

// Attachment: Path to the image file
$imageFile = 'upload/blog3.jpg';
$mail->addEmbeddedImage($imageFile, 'attached_image');

$mail->Body = $message;

if ($mail->send()) {
    echo 'Email sent successfully';
} else {
    echo 'Error: ' . $mail->ErrorInfo;
}
?>


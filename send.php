<?php
session_start();
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
require_once 'conn.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $_SESSION['reset_email']=$email;
    echo $email;

    // Connect to your database (replace with your own database connection code)
   

    // Check if the user exists in the database
    $sql = "SELECT * FROM register WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User exists, generate a reset token or OTP (for simplicity, we use a random token here)
        $otp = mt_rand(100000, 999999);

        // Store the OTP in the session for later verification
        $_SESSION['otp'] = $otp;
        $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // Use 'ssl' if required by your SMTP server
        $mail->Port = 587; // Use the appropriate port for your SMTP server

        // SMTP authentication credentials
        $mail->Username = '18project03@gmail.com'; // Replace with your email address
        $mail->Password = 'qkiswsrxmprjxucb'; // Replace with your email password

        // Set sender and recipient
        $mail->setFrom($email, 'Sani.s Art');
        $mail->addAddress($email); // Replace with the recipient's email address

        // Email subject and body
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "nEmail: $email\n  $otp";

        // Send the email
        if ($mail->send()) {
            echo "sent";
            header('location:verify.php');
        } else {
            echo 'not sent ';
        }
    } catch (Exception $e) {
        
        echo '<script>swal("Oops!", "Something went wrong, Retry Again!", "error");</script>';

    }

        

   
}
else{
    echo'Mail not found';
}
$stmt->close();
$conn->close();
}
?>

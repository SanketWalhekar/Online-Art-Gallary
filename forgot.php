<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Forgot Page</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style>

    section{
    background-image: url("upload/Home.png");

}


    </style>


</head>
<body>








    
<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <button class="close-button" onclick="goBack()" style="position: absolute; top: 10px; right: 10px; z-index: 9999;">✕</button>






   
   



    <form  method="post">
            <h3 class="mb-5">Forgot Password</h3>

            <div class="form-outline mb-4">
              <input type=""  name="email" class="form-control form-control-lg" placeholder="Your Email"/>
             
            </div>

           
            <button  class="btn btn-lg btn-block" type="submit" name="submit"  style="background-color: #E0B0FF">Send OTP</button>
           
            

            </form>

            
</div>
</div>
</div>
</div>
</div>
</section>
<script>
function goBack() {
  window.history.back();
}
</script>


</body>
</html>
<?php
session_start();
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
require_once 'conn.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["submit"])){
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
        $mail->Subject = 'From Sani.s Art';
        $mail->Body = "Email: $email\n  $otp";
        
        $mail->Body = "<h1>Verification code</h1>
                         Please use the verification code below to sign in.<br>
                         <b>$otp</b>
                         If you didn’t request this, you can ignore this email.<br>
                         Thanks,<br>
                         Sani.s Art";
          $mail->AltBody = 'Please Dont Share OTP with anyone.';
        // Send the email
        if ($mail->send()) {
            header('location:verify.php');
        } else {
            echo 'not sent ';
        }
    } catch (Exception $e) {
        
      echo "<script>alert('Incorrect Email Or Password')</script>";

    }

        

   
}
else{
  echo "<script>alert('Email not found')</script>";
}
$stmt->close();
$conn->close();
}
?>

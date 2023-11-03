<?php
session_start();
require_once 'conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
require 'conn.php';
// Generate a random 6-digit OTP

// Send the OTP via email or SMS

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $orderId = $_POST['product_id']; // Retrieve product ID
  $price = $_POST['price']; // Retrieve price
  $info = $_POST['date']; // Retrieve date
    $sql = "SELECT * FROM sketch_order WHERE order_id='$orderId'";
    $result = $conn->query($sql);
    if ($result) {
        // Fetch the row data into an associative array
        $row = $result->fetch_assoc();

        // Check if a row was found
        if ($row) {
            // Now you can access individual columns as separate variables
            $name = $row['name'];
            $email = $row['email'];
            $size = $row['size'];
            $frame = $row['frame'];
            $requirement = $row['requirement'];

            // You can use these variables as needed
            // For example, to display or manipulate the data
            // echo "Name: $name<br>";
            // echo "Email: $email<br>";
            // echo "price: $price<br>";
            // echo "info: $info<br>";
            $boundary = md5(uniqid(time()));

// Headers
            
    $message .= "Your Order Details:\n\n";
    $message .= "Order ID: " . $orderId . "\n";
    $message .= "Name: " . $name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Size: " . $size . "\n";
    $message .= "Frame: " . $frame . "\n";
    $message .= "Requirement: " . $requirement . "\n";
    $message .= "As per your requirements the estimated price and details are mentioned below \n";
    $message .= "Price: " . $price . "/- INR\n";
    $message .= "Info: " . $info . "\n\n";
    $message .= "Thank you for placing your order with us. To confirm your order, please click the link below:\n";
    $message .= "http://localhost/sani.s/confirmed_order.php?order_id=" . $orderId . "&confirm=true";

            sendOTP($email, $message);

    $update = "UPDATE sketch_order SET status=1 where order_id='$orderId'";
    $result=mysqli_query($conn,$update);
    $_SESSION['registration_success'] = true; // Add this line to set a flag
    $sql1 = "UPDATE sketch_order SET payment =$price  WHERE order_id = '$orderId'";
    $result=mysqli_query($conn,$sql1);

    header('location:order_details.php');
    echo "mail sent successfully";


    
           


            // ...
        } else {
            echo "No data found for order ID: $orderId";
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }
}

function sendOTP($email, $message) {
    // Implement your code to send the OTP via email or SMS here
    $mail = new PHPMailer(true);

    try {
    // SMTP configuration
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPSecure = 'tls';
      $mail->SMTPAuth = true;
      $mail->AuthType = 'LOGIN';
      $mail->Username = '18project03@gmail.com';
      $mail->Password = 'jhwiwlwpdahdofnc';

    // Set the sender and recipient
      $mail->setFrom('18project03@gmail.com', 'Sani.s Art Gallary');
      $mail->addAddress($email, 'Dear User');

    // Set email content
      $mail->Subject = 'Sani.s Art Gallary';
      $mail->Body = $message;

    // Send the email
      $mail->send();
      echo 'OTP sent successfully';
  } catch (Exception $e) {
    echo 'OTP could not be sent. Error: ', $mail->ErrorInfo;
  }
      
  }





?>

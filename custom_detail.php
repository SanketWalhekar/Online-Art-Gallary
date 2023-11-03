<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('Location:admin_login.php');
}
require_once 'conn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
// Code for sending message to user










// Check if an order_id was provided in the URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $sql = "SELECT * FROM sketch_order WHERE order_id = '$order_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch a single row
        $row = $result->fetch_assoc();

        // Access data fields by column name
        $status = $row['status'];
        $name=$row['name'];
        $email1=$row['email'];
        $size=$row['size'];
        $frame=$row['frame'];
        $requirement=$row['requirement'];
        $image=$row['image'];
        $date=$row['time'];







    
}
}



//  Mail to user about their order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user information and message
    $email = $email1;
    $subject = "Your Order Update\n";
    $subject= "This Message regarding to your sketch order order Updates";
    $message1 ="Hello $name\n\n";
   
    





    // Check if the admin wants to send a message
    if (!empty($_POST["admin_message"])) {
        $adminMessage = $_POST["admin_message"];
        $message2= "Admin Message: $adminMessage\n";
    }
    $colorsOfAppreciation = "Thank You for Adding Your Palette to Sani Art Gallery!";
    $thankYouMessage = "Thank You for Choosing Sani Art Gallery!";
    $htmlMessage = "
    <html>
    <head>
        <style>
            .container {
                border: 2px solid #000;
                padding: 20px;
                font-family: Arial, sans-serif;
            }
            .header img {
                max-width: 100%;
                height: auto;
            }
            .message {
                font-size: 16px;
                line-height: 1.5;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            
            <div class='message'>
                <p>Welcome to Sani.s Art</p>
                <p>$message1</p>

                <p>$message2</p>
                <p>$colorsOfAppreciation</p>
                <p>$thankYouMessage</p>
            </div>
        </div>
    </body>
    </html>
    ";
    $error = sendOTP($email, $htmlMessage);
if ($error === true) {
    echo '<script>alert("Email sent successfully.");</script>';
} else {
    echo '<script>alert("Email could not be sent. Error: ' . $error . '");</script>';
}
    
    
}


//  code for mail
function sendOTP($email, $htmlMessage) {
    // Implement your code to send the OTP via email or SMS here
    $mail = new PHPMailer(true);

    try {
    // SMTP configuration
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 465;
      $mail->SMTPSecure = 'ssl';
      $mail->SMTPAuth = true;
      $mail->AuthType = 'LOGIN';
      $mail->Username = '18project03@gmail.com';
      $mail->Password = 'jhwiwlwpdahdofnc';

    // Set the sender and recipient
      $mail->setFrom('18project03@gmail.com', 'Sani.s Art Gallary');
      $mail->addAddress($email, 'Dear User');

    // Set email content
    $mail->isHTML(true);

      $mail->Subject = 'Your order Updates';
      $mail->Body = $htmlMessage;

    // Send the email
    if ($mail->send()) {
        // Email sent successfully
        return true;
    } else {
        // Email sending failed, return the error message
        $error = $mail->ErrorInfo;
    }
    //   echo 'OTP sent successfully';
  } catch (Exception $e) {
    echo 'OTP could not be sent. Error: ', $mail->ErrorInfo;
  }
      
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>invoice card - sani.s Art</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{margin-top:20px;
background-color:#eee;
background-image: url("upload/Home.png");
margin-bottom:20px;

}

.card {
    width :800px;
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
.centered {
    display: flex;
    align-items: center;
    justify-content: center;
    /* height: 100vh; Adjust the height as needed */
}

.container1 {
        position: relative;
    }
 .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 20px;
        color: red; /* Change the color as needed */
    }
    .container {
            text-align: center;
            /* margin-top: 100px; Adjust this value as needed */
        }

        form {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin: 15px 0;
        }

        label {
            font-weight: bold;
        }

        select, input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        .btn-primary {
            width: 100%;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px;
            cursor: pointer;
        }
        .btn-danger{
            width: 100%;
            font-size: 18px;
            /* background-color: #007bff; */
            /* color: #fff; */
            border: none;
            border-radius: 3px;
            padding: 10px;
            /* cursor: pointer; */
        }

        /* .btn-primary:hover {
            background-color: #0056b3;
        } */
    
    
    



    </style>
    <script>
function goBack() {
  window.history.back();
}
</script>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<div class="container1">

<div class="row">

<div class="col-lg-12">
<div class="centered">
<div class="card">
<button class="close-button" onclick="goBack();">✕</button>

<div class="card-body">
<div class="invoice-title">
<!-- <h4 class="float-end font-size-15">Invoice<span class="badge bg-success font-size-12 ms-2">Paid</span></h4> -->
<div class="mb-4">
<h2 class="mb-1 text-muted">Sani.s Art</h2>
</div>
<div class="text-muted">
<!-- <p class="mb-1">Mumbai, Maharashtra</p>
<p class="mb-1">Sani.sArt@gmail.com</p>
<p><i class="uil uil-phone me-1"></i> 012-345-6789</p> -->
</div>
</div>
<hr class="my-4">
<div class="row">
<div class="col-sm-6">
<div class="text-muted">
<h5 class="font-size-16 mb-3">Orders Details</h5>
<p class="mb-1"><b>Customer Name </b>:<?php echo $name; ?></p><br>
<p class="mb-1"><b>Customer Email :</b><?php echo $email1; ?></p><br>
<p class="mb-1"><b>Sketch Size :</b><?php echo $size; ?></p><br>
<p class="mb-1"><b>Frame for the sketch :</b><?php echo $frame; ?></p><br>
<p class="mb-1"><b>Requirements from customer:</b><?php echo $requirement; ?></p><br>
<p class="mb-1">
  <b>Image:</b>
  <a href="<?php echo $image; ?>" target="_blank">
    <img src="<?php echo $image; ?>" style="width: 200px; height: 150px;">
  </a>
</p>



</div>
</div>

<div class="col-sm-6">
<div class="text-muted text-sm-end">
<div>
</div>
<div class="mt-4">
<h5 class="font-size-15 mb-1">Date:</h5>
<p><p><?= $date;?></p>
</p>
</div>
<div class="mt-4">
<h5 class="font-size-15 mb-1">Order Id:</h5>
<p><?php echo $order_id; ?></p>
</div>
</div>
</div>

</div>


<div class="py-2">
<div class="table-responsive">
</div>
<div class="d-print-none mt-4">
<div class="float-end">
</div>
</div>
</div>
</div>
<div class="container">
        <form method="post">
            <h1>Notify User</h1>
            

            

            <div class="form-group">
                <label for="admin_message">Admin Message (optional):</label>
                <textarea name="admin_message" rows="4" cols="50"></textarea>
            </div>

            <input type="submit" class="btn btn-primary" value="Notify User">
        </form>
        <form method="post" action="delete_order.php">
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
    <input type="submit" class="btn btn-warning" value="Delete Order" onclick="return confirm('Are you sure you want to delete this order?');">
</form>

    </div>
</div>
</div>
</div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
    
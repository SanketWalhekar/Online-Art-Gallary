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
    $customer_name = '';
$customer_email = '';
$customer_phone = '';
$customer_address = '';
$customer_city = '';
$customer_state = '';
$customer_zip = '';
$date = '';


    // Fetch data from shipping_info, orders, and sketch_details tables
    $sql = "SELECT s.name AS customer_name, s.email, s.phone,s.address, s.city, s.state,s.zip,
    o.product_id, o.quantity, o.date,o.invoice, sd.name AS product_name, sd.type,sd.price, sd.feature,
    sd.image AS product_photo FROM shipping_info AS s JOIN orders AS o ON s.order_id = o.order_id 
    JOIN sketch_detail AS sd ON o.product_id = sd.product_id WHERE o.order_id ='$order_id';";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $customer_row = $result->fetch_assoc();
        $customer_name = $customer_row['customer_name'];
        $customer_email = $customer_row['email'];
        $customer_phone = $customer_row['phone'];
        $customer_address = $customer_row['address'];
        $customer_city = $customer_row['city'];
        $customer_state = $customer_row['state'];
        $customer_zip = $customer_row['zip'];
        $customer_invoice = $customer_row['invoice'];
        $date = $customer_row['date'];


        // Fetch all the rows into an array
        $orderDetails = [];
        while ($row = $result->fetch_assoc()) {
            $orderDetails[] = $row;
        }
    } else {
        echo "No data available for this order.";
    }
} else {
    echo "Order ID not provided.";
}




//  Mail to user about their order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user information and message
    $email = $customer_email;
    $subject = "Your Order Update";
    $subject = "This Message regarding to your order Updates";

   


    $orderStatus = $_POST["order_status"];
    $statusCode = 0; // Default status code

    if ($orderStatus === "Ready for Shipping") {
        $statusCode = 1;
    } elseif ($orderStatus === "Shipped") {
        $statusCode = 2;
    } elseif ($orderStatus === "Delivered") {
        $statusCode = 3;
    }

    $updateQuery = "UPDATE orders SET status = $statusCode WHERE order_id = '$order_id'";
    
    if ($conn->query($updateQuery) === true) {
        // Order status updated successfully, show a success message using SweetAlert
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Sucsess",
                text: "The mail has been sent successfully.",
            });
        </script>';
    } else {
        // Error updating order status, show an error message using SweetAlert
        echo '<script> 
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Their is error: ' . $conn->error . '",
            });
        </script>';
    }
    
    function sendOTP($email, $htmlMessage, $imagePath) {
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
    
            // Attach the image as an embedded image
    
            if ($mail->send()) {
                // Email sent successfully
                return true;
            } else {
                // Email sending failed, return the error message
                $error = $mail->ErrorInfo;
                return $error;
            }
        } catch (Exception $e) {
            return 'OTP could not be sent. Error: ' . $mail->ErrorInfo;
        }
    }


    $orderStatus = "Your Order status is: $orderStatus";
$order_id = "Your order Number is: $order_id";
$customer_invoice = "Your order Invoice Number is: $customer_invoice";





    // Check if the admin wants to send a message
    if (!empty($_POST["admin_message"])) {
        $adminMessage1 = $_POST["admin_message"];
        $adminMessage= " Message Form Admin Side :$adminMessage1\n";
    }
    $colorsOfAppreciation = "Thank You for Adding Your Palette to Sani Art Gallery!";
    $thankYouMessage = "Thank You for Choosing Sani Art Gallery!";
    
    // Concatenating messages to the HTML content
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
            <p>$orderStatus</p>
            <p>$order_id</p>
            <p>$customer_invoice</p>
            <p>$adminMessage</p>
            <p>$colorsOfAppreciation</p>
            <p>$thankYouMessage</p>
        </div>
    </div>
</body>
</html>
";

$imagePath = 'image.png';
$error = sendOTP($email, $htmlMessage, $imagePath);

if ($error === true) {
    echo '<script>alert("Email sent successfully.");</script>';
} else {
    echo '<script>alert("Email could not be sent. Error: ' . $error . '");</script>';
}


//  code for mail

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sani.s Art</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style type="text/css">
    	body{margin-top:20px;
background-color:gray;
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
    background-color:#f4f4f4;
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

        .btn-primary:hover {
            background-color: #0056b3;
        }
    
    
    



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
<h5 class="font-size-16 mb-3">Billed To:</h5>
<h5 class="font-size-15 mb-2"><?php echo $customer_name; ?></h5>
<p class="mb-1"><?php echo $customer_email; ?></p>
<p class="mb-1"><?php echo $customer_phone; ?></p>
<p class="mb-1"><?php echo $customer_address; ?> ,<?php echo $customer_city; ?>  , <?php echo $customer_city; ?> ,<?php echo $customer_zip; ?> </p>

</div>
</div>

<div class="col-sm-6">
<div class="text-muted text-sm-end">
<div>
<h5 class="font-size-15 mb-1">Invoice No:</h5>
<p><?= $customer_invoice;?></p>
</div>
<div class="mt-4">
<h5 class="font-size-15 mb-1">Invoice Date:</h5>
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
<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch data from shipping_info, orders, and sketch_details tables
    $sql = "SELECT s.name AS customer_name, s.email, s.phone, s.address, s.city, s.state, s.zip,
            o.product_id, o.quantity, o.date, o.invoice, sd.name AS product_name, sd.type, sd.price, sd.feature,
            sd.image AS product_photo
            FROM shipping_info AS s
            JOIN orders AS o ON s.order_id = o.order_id
            JOIN sketch_detail AS sd ON o.product_id = sd.product_id
            WHERE o.order_id = '$order_id';";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch all the rows into an array
        $orderDetails = [];
        while ($row = $result->fetch_assoc()) {
            $orderDetails[] = $row;
        }
    } else {
        echo "No data available for this order.";
    }
} else {
    echo "Order ID not provided.";
}
?>

<div class="py-2">
<h5 class="font-size-15">Order Summary</h5>
<div class="table-responsive">
    <?php if (!empty($orderDetails)) { ?>
        <table class="table align-middle table-nowrap table-centered mb-0">
            <thead>
                <tr>
                    <th style="width: 70px;">No.</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Image</th>

                    <th>Quantity</th>
                    <th class="text-end" style="width: 120px;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $itemNumber = 1;
                $sum = 0;
                foreach ($orderDetails as $itemRow) {
                    $total = $itemRow["price"] * $itemRow['quantity'];
                    $sum += $total;
                ?>
                    <tr>
                        <th scope="row"><?php echo $itemNumber; ?></th>
                        <td>
                            <div>
                                <h5 class="text-truncate font-size-14 mb-1"><?php echo $itemRow["product_name"]; ?></h5>
                                <p class="text-muted mb-0"><?php echo $itemRow["feature"]; ?></p>
                            </div>
                        </td>
                        <td>Rs. <?php echo $itemRow["price"]; ?></td>
                        <td>
                           <a href="<?php echo $itemRow["product_photo"]; ?>" target="_blank">
                           <img src="<?php echo $itemRow["product_photo"]; ?>" alt="Product Photo" style="max-width: 100px; max-height: 100px;">
    </a>  
</td>

                        <td><?php echo $itemRow["quantity"]; ?></td>
                        <td class="text-end"><?php echo $total; ?></td>
                    </tr>
                <?php
                    $itemNumber++;
                } ?>

                <!-- Remaining rows for sub-total, shipping charges, tax, and total -->
            </tbody>
        </table>
    <?php } ?>
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
                <label for="order_status">Order Status:</label>
                <select name="order_status">
                 <option value="none">none</option>

                    <option value="Ready for Shipping">Ready for Shipping</option>
                    <option value="Shipped">Shipped</option>
                    <option value="Delivered">Delivered</option>
                </select>
            </div>

            <div class="form-group">
                <label for="admin_message">Admin Message (optional):</label>
                <textarea name="admin_message" rows="4" cols="50"></textarea>
            </div>

            <input type="submit" class="btn btn-primary" value="Notify User">
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
    
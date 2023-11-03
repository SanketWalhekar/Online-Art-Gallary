<?php
require "conn.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after redirection
}
$user_id = $_SESSION['Loginid'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
    $city = $_SESSION['city'];
    $state = $_SESSION['state'];
    $zip = $_SESSION['zip'];
    $str = substr($user_id, 0, 4);
    $rand = rand(10000, 99999);
    $order_id = $str . '--' . $rand;



            $query = "SELECT 
                sketch_detail.price AS Price, 
                sketch_detail.product_id,
                sketch_detail.image AS Image,
                sketch_detail.feature AS Description,  
                sketch_detail.name AS Name,
                users_products.quantity AS Quantity 
                FROM 
                users_products 
                JOIN 
                sketch_detail 
                ON 
                users_products.item_id = sketch_detail.product_id
                WHERE 
                users_products.user_id = '$user_id' 
                AND users_products.status = 'Added To Cart';";
                $res = mysqli_query($conn, $query);

$prefix = "INV";

// Generate a timestamp component (e.g., current date and time)
$timestamp = date("YmdHis");

// Generate a random component (e.g., a random number)
$random = mt_rand(1000, 9999);

// Combine the components to create the unique invoice number
$invoiceNumber = $prefix . $timestamp . $random;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>invoice card - sani.s art</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="Stylesheet" href="head.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">



    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/font-awesome.min.css" rel="stylesheet" >
    <link href="css/global.css" rel="stylesheet">
     <link href="css/index.css" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz@9..144&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="Stylesheet" href="button.css">
    <link rel="Stylesheet" href="text.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{margin-top:20px;
background-color:#eee;
}

.card {
    width :850px;
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

    </style>
</head>
<body>
<a href="cart.php" class="previous"><button type="button" class="btn btn-primary">Back</button></a>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="centered">
<div class="card">
<div class="card-body">
<div class="invoice-title">
<h4 class="float-end font-size-15">Invoice<span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
<div class="mb-4">
<h2 class="mb-1 text-muted">Sani.s Art</h2>
</div>
<div class="text-muted">
<p class="mb-1">Mumbai, Maharashtra</p>
<p class="mb-1">Sani.sArt@gmail.com</p>
<p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
</div>
</div>
<hr class="my-4">
<div class="row">
<div class="col-sm-6">
<div class="text-muted">
<h5 class="font-size-16 mb-3">Billed To:</h5>
<h5 class="font-size-15 mb-2"><?php echo $name; ?></h5>
<p class="mb-1"><?php echo $address; ?>,<?php echo $city; ?>,<?php echo $state; ?>,<?php echo $zip; ?></p>
<p class="mb-1"><?php echo $email; ?></p>
<p><?php echo $phone; ?></p>
</div>
</div>

<div class="col-sm-6">
<div class="text-muted text-sm-end">
<div>
<h5 class="font-size-15 mb-1">Invoice No:</h5>
<p><?php echo $invoiceNumber;?></p>
</div>
<div class="mt-4">
<h5 class="font-size-15 mb-1">Invoice Date:</h5>
<p><?php $currentDate = date('F j, Y'); echo $currentDate ;?></p>
</div>
<div class="mt-4">
<h5 class="font-size-15 mb-1">Order Id:</h5>
<p><?php echo $order_id; ?></p>
</div>
</div>
</div>

</div>

<div class="py-2">
<h5 class="font-size-15">Order Summary</h5>
<div class="table-responsive">
<?php if (mysqli_num_rows($res) >= 1) { ?>
    <table class="table align-middle table-nowrap table-centered mb-0">
        <thead>
            <tr>
                <th style="width: 70px;">No.</th>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th class="text-end" style="width: 120px;">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $itemNumber = 1; // Initialize the item number
            $sum = 0; // Initialize sum
            while ($row = mysqli_fetch_array($res)) {
                $total = $row["Price"] * $row['Quantity'];
                $sum += $total;
            ?>
                <tr>
                    <th scope="row"><?php echo $itemNumber; ?></th>
                    <td>
                        <div>
                            <h5 class="text-truncate font-size-14 mb-1"><?php echo $row["Name"]; ?></h5>
                            <p class="text-muted mb-0"><?php echo $row["Description"]; ?></p>
                        </div>
                    </td>
                    <td>Rs. <?php echo $row["Price"]; ?></td>
                    <td><?php echo $row["Quantity"]; ?></td>
                    <td class="text-end"><?php echo $total; ?></td>
                </tr>
            <?php
                $itemNumber++; // Increment item number
            } ?>

            <tr>
                <th scope="row" colspan="4" class="text-end">Sub Total</th>
                <td class="text-end"><?php echo $sum; ?></td>
            </tr>

            <!-- <tr>
                <th scope="row" colspan="4" class="border-0 text-end">Shipping Charge :</th>
                <td class="border-0 text-end">Rs.200</td>
            </tr> -->

            <tr>
                <th scope="row" colspan="4" class="border-0 text-end">
                    Tax
                </th>
                <td class="border-0 text-end">Rs.0</td>
            </tr>

            <tr>
                <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                <td class="border-0 text-end">
                    <h4 class="m-0 fw-semibold">Rs.<?php echo ($sum + 0); ?></h4>
                </td>
            </tr>

        </tbody>
    </table>
<?php } ?>

</div>
<div class="d-print-none mt-4">
<div class="float-end">
<a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
<a href="#" class="btn btn-primary w-md">Send</a>
</div>
</div>
</div>
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
<?php
?>
</body>
</html>
<?php
if (isset($_SESSION['Loginid'])) {

    

    // Step 1: Retrieve cart items
    $query = "SELECT * FROM users_products WHERE user_id = '$user_id'";
    $result_cart = mysqli_query($conn, $query);

   

    //Insert the shipping Information 
    $insert_shipping_query = "INSERT INTO shipping_info (user_id, order_id, name, email, phone, address, city, state, zip) VALUES ('$user_id','$order_id', '$name', '$email', '$phone', '$address', '$city', '$state', '$zip')";

    $result12 = mysqli_query($conn, $insert_shipping_query);

    if ($result12) {
        // Shipping information inserted successfully
    } else {
        // Handle the query error
        die("Query failed: " . mysqli_error($conn));
    }
     $payment= $sum ;

     $Date=$currentDate;
    if ($result_cart) {
        if (mysqli_num_rows($result_cart) > 0) {
            while ($row = mysqli_fetch_array($result_cart)) {
                $product_id = $row['item_id'];
                $quantity = $row['quantity'];

                $insert_order_item_query = "INSERT INTO orders (order_id, user_id, product_id, quantity,payment,invoice,Date) VALUES ('$order_id', '$user_id', '$product_id', '$quantity','$payment','$invoiceNumber','$Date')";
                $result_order = mysqli_query($conn, $insert_order_item_query);

                if (!$result_order) {
                    // Handle the query error
                    die("Query failed: " . mysqli_error($conn));
                }
            }

           
        } else {
            echo "Your cart is empty. Add items to the cart first!";
        }
    } else {
        // Handle the query error
        die("Query failed: " . mysqli_error($conn));
    }

    
} else {
    header("Location: index.php");
    exit(); 
}
$delete_cart_query = "DELETE FROM users_products WHERE user_id = '$user_id'";
$result_delete = mysqli_query($conn, $delete_cart_query);
unset($_SESSION['name']);
unset($_SESSION['phone']);
unset($_SESSION['address']);
unset($_SESSION['city']);
unset($_SESSION['state']);
unset($_SESSION['zip']);
?>
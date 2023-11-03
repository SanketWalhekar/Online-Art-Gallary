<?php
session_start();

require 'conn.php';
require __DIR__ . "/vendor/autoload.php";
$stripe_secret_key = "sk_test_51O1TiuSIYdbve5xsumxp8fSNL3SDSFBb2HUKyCkmIjsiwDjBLVNo7Sabphd0N5n6RfbjcRAXXsSPNTUSrGhb9Kl700lE4hvDkG";
if (isset($_POST['checkout'])) {
    // Check if the form is submitted (based on your "checkout" button name)

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    // Store the form data in session variables
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['address'] = $address;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['zip'] = $zip;
$user_id = $_SESSION['Loginid'];
$total = $_SESSION['total'];


$cartItems = [];  // Create an array to store cart items

// Replace 'your_db_connection' with your actual database connection
$cartQuery = "SELECT 
    sketch_detail.price AS Price,  
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
$cartResult = mysqli_query($conn, $cartQuery);

if ($cartResult) {
    while ($row = mysqli_fetch_assoc($cartResult)) {
        $cartItems[] = $row;  // Add cart item to the array
    }
}

$lineItems = [];
foreach ($cartItems as $item) {
    $lineItems[] = [
        "quantity" => $item['Quantity'],
        "price_data" => [
            "currency" => "inr",
            "unit_amount" => $item['Price'] * 100,  // Price in cents
            "product_data" => [
                "name" => $item['Name'],
            ],
        ],
    ];
}

\Stripe\Stripe::setApiKey($stripe_secret_key);
$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/sani.s/checkout.php",
    "cancel_url" => "http://localhost/sani.s/cart.php",
    "line_items" => $lineItems,  // Use the array built in the loop
]);

http_response_code(303);
header("Location: " . $checkout_session->url);
}


?>

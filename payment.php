<?php
session_start();
require 'conn.php';
require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51O1TiuSIYdbve5xsumxp8fSNL3SDSFBb2HUKyCkmIjsiwDjBLVNo7Sabphd0N5n6RfbjcRAXXsSPNTUSrGhb9Kl700lE4hvDkG";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["order_id"];

    // Fetch data from the database based on the 'order_id'
    $sql = "SELECT * FROM sketch_order WHERE order_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $order_id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Access the data from the database
                $name = $row['name'];
                
                $payment = $row['payment'];

                // Create the line_items array directly with the retrieved data
                $lineItems = [
                    [
                        "quantity" => 1,
                        "price_data" => [
                            "currency" => "inr",
                            "unit_amount" => $payment,  // Replace with the actual price in cents
                            "product_data" => [
                                "name" => $name,  // Use the product name from the database
                            ],
                        ],
                    ],
                ];

                \Stripe\Stripe::setApiKey($stripe_secret_key);
                $checkout_session = \Stripe\Checkout\Session::create([
                    "mode" => "payment",
                    "success_url" => "http://localhost/sani/checkout.php",
                    "cancel_url" => "http://localhost/art_gallary/cart.php",
                    "line_items" => $lineItems,
                ]);

                http_response_code(303);
                header("Location: " . $checkout_session->url);
            } else {
                echo "No data found for order ID: $order_id";
            }
        } else {
            echo "Error executing the query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<?php
require __DIR__ . "/vendor/autoload.php";
$stripe_secret_key = "sk_test_51O1TiuSIYdbve5xsumxp8fSNL3SDSFBb2HUKyCkmIjsiwDjBLVNo7Sabphd0N5n6RfbjcRAXXsSPNTUSrGhb9Kl700lE4hvDkG";

\Stripe\Stripe::setApiKey($stripe_secret_key);
$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",  // Corrected mode value
    "success_url" => "http://localhost/art_gallary/sus.php",
    "cancel_url" => "http://localhost/art_gallary/example.php",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "inr",
                "unit_amount" => 2000,
                "product_data" => [
                    "name" => "T-shirt"
                ]
            ]
        ],

        [
                    "quantity" => 2,
                    "price_data" => [
                        "currency" => "inr",
                        "unit_amount" => 700,
                        "product_data" => [
                            "name" => "hat"
                        ]
                    ]
                ]
    ]
]);
http_response_code(303);
header("Location: " . $checkout_session->url);
?>
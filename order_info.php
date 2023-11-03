<?php
require_once 'conn.php';

// Check if a product_id was provided in the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch data from shipping_info, orders, and sketch_details tables
    $sql = "SELECT
        s.name AS customer_name,
        o.product_id,
        o.quantity,
        o.date,
        sd.name AS product_name,
        sd.image AS product_photo
    FROM
        shipping_info AS s
    JOIN
        orders AS o ON s.order_id = o.order_id
    JOIN
        sketch_details AS sd ON o.product_id = sd.product_id
    WHERE o.product_id = $product_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No data available for this product.";
    }
} else {
    echo "Product ID not provided.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 20px;
        }
        .product-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.7);
        }
        .product-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .product-info {
            font-size: 18px;
        }
        .product-photo {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <h1>Product Details</h1>
    <?php if (isset($row)) { ?>
        <div class="product-details">
            <p class="product-name"><?= $row["product_name"] ?></p>
            <p class="product-info">Customer Name: <?= $row["customer_name"] ?></p>
            <p class="product-info">Product ID: <?= $row["product_id"] ?></p>
            <p class="product-info">Quantity: <?= $row["quantity"] ?></p>
            <p class="product-info">Date: <?= $row["date"] ?></p>
            <img class="product-photo" src="<?= $row["product_photo"] ?>" alt="Product Photo">
        </div>
    <?php } ?>
</body>
</html>

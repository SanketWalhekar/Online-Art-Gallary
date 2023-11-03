<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('Location:admin_login.php');
}
require_once 'conn.php';
require_once 'index1.php';

$sql = "SELECT
s.name AS customer_name,
o.order_id,
o.product_id,
o.quantity,
o.date,
o.status,
sd.name AS product_name,
sd.image AS product_photo
FROM
shipping_info AS s
JOIN
orders AS o ON s.order_id = o.order_id
JOIN
sketch_detail AS sd ON o.product_id = sd.product_id";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1.0">
	<title>Sani.s Art</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Include jQuery -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<link rel="stylesheet"
		href="style.css">
	<link rel="stylesheet"
		href="responsive.css">






<style>
    /* Your existing CSS styles... */

     .report-container {
        width:1100px;
    } 

    /* Add these table styles */
    .custom-table {
        width: 1020px;
        border-collapse: collapse;
        background-color: #f8f9fa; /* Background color */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-table th, .custom-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dcdcdc; /* Border color */
    }

    .custom-table thead {
        background-color: #007bff; /* Header background color */
        color: #fff; /* Header text color */
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f5f5f5; /* Even row background color */
    }

    .custom-table tbody tr:hover {
        background-color: #e5e5e5; /* Hover row background color */
        transition: background-color 0.3s;
    }

    .custom-table tbody th:nth-child(even) {
        background-color: #f5f5f5; /* Even row header background color */
    }

    .custom-table tbody th:hover {
        background-color: #e5e5e5; /* Hover row header background color */
        transition: background-color 0.3s;
    }
</style>
</head>

<body>
<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Recieved Orders Details</h1>
        <button class="view">View All</button>
    </div>
    <div class="report-body">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Product Name</th>
                    <th>Product Photo</th>
                    <th>View Details</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["customer_name"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo '<td><a href="' . $row['product_photo'] . '" target="_blank">
                <img src="' . $row['product_photo'] . '" alt="Product Photo" width="100">
            </a></td>';
                      echo "<td><a href='detail.php?order_id=" . $row["order_id"] . "'>View Details</a></td>";
                echo "<td>";
                if ($row["status"] == 0) {
                    echo '<button class="btn btn-danger">Received</button>';
                } elseif ($row["status"] == 1) {
                    echo '<button class="btn btn-warning">Ready For shipping</button>';
                } elseif ($row["status"] == 2) {
                    echo '<button class="btn btn-primary">Shipping</button>';
                } elseif ($row["status"] == 3) {
                    echo '<button class="btn btn-success">Delivered</button>';
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data available</td></tr>";
        }
        ?>
</tbody>
    </table>
    </div>
    </div>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
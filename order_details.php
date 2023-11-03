<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('Location:admin_login.php');
}

// require_once 'header.php';
require_once 'conn.php';
require_once 'index1.php';


$sort = 'desc';

// Check if the sort parameter is set

// Construct the SQL query with the sorting order
$sql = "SELECT * FROM sketch_order ORDER BY time $sort";

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
        width: 1000px;
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
<script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
                echo 'Swal.fire("Good job!", "Mail Sent Sucessfully!", "success");';
                unset($_SESSION['registration_success']); // Clear the session variable
            }
            ?>
        });
    </script>

    </head>
    <body>  

    <div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Customized Order Details</h1>
    </div>
    <div class="report-body">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Size</th>
                    <th>Frame</th>
                    <th>Requirement</th>
                    <th>View Details</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result === false) {
                    echo "Error: " . $conn->error;
                } elseif ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td><a href="' . $row['image'] . '" target="_blank">
                        <img src="' . $row['image'] . '" alt="Item Image" style="max-width: 100px; max-height: 100px;">
                    </a></td>';
                        echo '<td>' . $row['size'] . '</td>';
                        echo '<td>' . $row['frame'] . '</td>';
                        echo '<td>' . $row['requirement'] . '</td>';
                        echo "<td><a href='custom_detail.php?order_id=" . $row["order_id"] . "'>View Details</a></td>";

                        echo '<td>';
                        if ($row["status"] == 0) {
                            echo '<a href="con_form.php?product_id=' . $row['order_id'] . '" class="btn btn-danger">recieved</a>';
                        } elseif ($row["status"] == 2) {
                            echo '<button class="btn btn-success">Confirmed</button>';
                        } else {
                            echo '<button class="btn btn-info">Mail Sent</button>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7">No data found in the database.</td></tr>';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="index.js"></script>
</body>
</html>

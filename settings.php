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
$sql = "SELECT * FROM admin ";

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

    </head>
    <body>  

    <div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Settings</h1>
        <a href="new_admin.php">
    <button class="view" style="width: 200px;">Add New Admin</button>
</a>
    </div>
    <div class="report-body">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Admin Email's</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result === false) {
                    echo "Error: " . $conn->error;
                } elseif ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['email'] . '</td>';
                        
                       

                        
                        
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

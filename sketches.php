<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('Location:admin_login.php');
}
require_once 'index1.php';
require_once 'conn.php';


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
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">



<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<link rel="stylesheet"
		href="style.css">
	<link rel="stylesheet"
		href="responsive.css">






<style>
    /* Your existing CSS styles... */

    /* Add these table styles */
    .custom-table {
        width: 100%;
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
            if (isset($_SESSION['delete_success']) && $_SESSION['delete_success']) {
                echo 'Swal.fire("Good job!", "Deleted Sucessfully!", "success");';
                unset($_SESSION['delete_success']); // Clear the session variable
            }
            ?>
        });
    </script>
    
     
     <script>
         document.addEventListener("DOMContentLoaded", function() {
             <?php
             if (isset($_SESSION['edit_success']) && $_SESSION['edit_success']) {
                 echo 'Swal.fire("Good job!", "Product Updated Sucessfully", "success");';
                 unset($_SESSION['edit_success']); // Clear the session variable
             }
             ?>
         });
     </script>

<script>
         document.addEventListener("DOMContentLoaded", function() {
             <?php
             if (isset($_SESSION['edit1_success']) && $_SESSION['edit1_success']) {
                 echo 'Swal.fire("Good job!", "Product Updated Sucessfully", "success");';
                 unset($_SESSION['edit1_success']); // Clear the session variable
             }
             ?>
         });
     </script>

    </head>
    <body>  

    <div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Sketch Details</h1>
    </div>
    <div class="report-body">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sketch Type </th>
                    <th>Sketch Name </th>
                    <th>Sketch Price</th>
                    <th>Sketch Image</th>
                    <th>Sketch Feature</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                // Fetch data from the database
                $sql = "SELECT * FROM sketch_detail"; // Assuming the table name is 'sketch_detail'
                $result = $conn->query($sql);
                // Your PHP code here to fetch data from the database and loop through records
                // Replace this with your database query and record retrieval logic
                if ($result === false) {
                    echo "Error: " . $conn->error;
                } elseif ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['product_id'] . '</td>';
                        echo '<td>' . $row['type'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['price'] . '</td>';
                        echo '<td><a href="' . $row['image'] . '" target="_blank">
                        <img src="' . $row['image'] . '" alt="Item Image" style="max-width: 100px; max-height: 100px;"></td>';
                        echo '<td>' . $row['feature'] . '</td>';
                        echo '<td>';
                        echo '<a href="edit.php?product_id=' . $row['product_id'] . '" class="btn btn-success"><i class="uil uil-edit"></i></a><br>';
                        echo '<a href="delete.php?product_id=' . $row['product_id'] . '" class="btn btn-danger"><i class="uil uil-trash-alt"></i></a>';
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

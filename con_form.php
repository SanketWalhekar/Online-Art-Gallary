<?php
session_start();
include 'index1.php';
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "";
// echo $product_id;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <style>
    .custom-form {
    width: 900px; /* Change this value to your desired width, for example, 600px */
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

        .custom-form .report-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            text-align: center;
            width: 900px;
            margin-top:30px;
        }

        .custom-form .report-header h1 {
            font-size: 24px;
            margin: 0;
            text-align : center;
            margin-left:250px;
            color: white;
            
        }

        .custom-form .report-body {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 0 0 10px 10px;
        }

        .custom-form .report-body .form-group {
            margin-bottom: 20px;
        }

        .custom-form .report-body label {
            font-size: 18px;
            color: #333;
        }

        .custom-form .report-body input[type="file"] {
            padding: 15px 0;
        }

        .custom-form .report-body button {
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .custom-form .report-body button:hover {
            background-color: #0056b3;
        }

        .custom-form .report-body img {
            max-width: 100px;
            max-height: 100px;
            border: 1px solid #dcdcdc;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="report-container custom-form">
    <!-- Your form content here -->


        <div class="report-header">
            <h1 class="recent-Articles">Sketch details</h1>
        </div>
        <div class="report-body">
        <form action="process_order.php" method="post">
    <!-- Hidden input field for product ID -->
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    
    <!-- Other input fields (price and date) -->
    <div class="form-group">
    <label for="price">Price:</label>
    <input type="text" name="price" id="price"  class="form-control" placeholder="Enter the price" required>
    </div>
    <div class="form-group">
    <label for="date">Info:</label>
    <input type="text" name="date" id="date"  class="form-control" placeholder="Enter the date" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit">
</form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="index.js"></script>
</body>
</html>
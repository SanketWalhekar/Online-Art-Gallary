<?php
session_start();
ob_start();
if (!isset($_SESSION['user_email'])) {
    header('Location:admin_login.php');
}

require_once 'conn.php';
// require_once 'header.php';
require_once 'index1.php';

if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    // echo $id;
    // Fetch data based on ID and sketch type
    $sql = "SELECT * FROM sketch_detail WHERE product_id = '$id'";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data and update the database
    $newtype = $_POST['type'];
    $newName = $_POST['new_name'];
    $newfeature = $_POST['new_feature'];
    $newPrice = $_POST['new_price'];

    // Check if the file was uploaded successfully
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === 0) {
        $image = $_FILES['new_image'];
        $filename = $image['name'];
        $filepath = $image['tmp_name'];

        // Move the uploaded file to the destination
        $destfile = 'upload/' . $filename;
        move_uploaded_file($filepath, $destfile);

        // Update data based on ID and sketch type
        $updateSql = "UPDATE sketch_detail SET type='$newtype', name='$newName', price='$newPrice', image='$destfile', feature='$newfeature' WHERE product_id = '$id'";
        if ($conn->query($updateSql) === TRUE) {
            $_SESSION['edit_success'] = true; // Add this line to set a flag
            header('location:sketches.php');
            
        } else {
            $_SESSION['edit1_success'] = true; // Add this line to set a flag
            header('location:sketches.php');
            
            
        }
    } else {
        // No new file uploaded, use the existing photo path
        $destfile = $row['image'];

        // Update data based on ID and sketch type
        $updateSql = "UPDATE sketch_detail SET type='$newtype', name='$newName', price='$newPrice', image='$destfile', feature='$newfeature' WHERE product_id = '$id'";

        if ($conn->query($updateSql) === TRUE) {
            $_SESSION['edit_success'] = true; // Add this line to set a flag
            header('location:sketches.php');
            
        } else {
            $_SESSION['edit1_success'] = true; // Add this line to set a flag
            header('location:sketches.php');
            
            
        }
        
    }
}

ob_end_flush();
?>
<?php
// include 'index.php';

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
    /* Apply these CSS styles to match the dashboard design */
/* .custom-table styles (unchanged) */
/* .report-container {
    margin-top:10px;
} */
.custom-form {
            width: 100%;
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
            margin-top:30px;
        }

        .custom-form .report-header h1 {
            font-size: 24px;
            margin: 0;
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
    <?php
    
    ?>
<div class="report-container custom-form">
    <!-- Your form content here -->


        <div class="report-header">
            <h1 class="recent-Articles">Edit Item</h1>
        </div>
        <div class="report-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="type">Type of Sketch</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                        <option value="Pencil">Pencil Sketch</option>
                        <option value="Acrylic">Acrylic Paintings</option>
                        <option value="Canvas">Canvas Paintings</option>
                        <option value="Nature">Nature Artwork</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="new_name">Name:</label>
                    <input type="text" class="form-control" id="new_name" name="new_name" value="<?php echo $row['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="new_price">Price:</label>
                    <input type="text" class="form-control" id="new_price" name="new_price" value="<?php echo $row['price']; ?>">
                </div>
                <div class="form-group">
                    <label for="new_image">Image:</label>
                    <?php if (!empty($row['image'])) { ?>
                        <img src="<?php echo $row['image']; ?>" alt="Current Image" style="max-width: 100px;"><br>
                    <?php } ?>
                    <input type="file" class="form-control" id="new_image" name="new_image">
                    <label>Current File: <?php echo $row['image']; ?></label>
                </div>
                <div class="form-group">
                    <label for="new_feature">Feature:</label>
                    <textarea class="form-control" id="new_feature" name="new_feature"><?php echo $row['feature']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>

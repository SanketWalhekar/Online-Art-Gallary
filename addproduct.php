<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('Location:admin_login.php');
}
include 'index1.php';
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
            <h1 class="recent-Articles">Add Product</h1>
        </div>
        <div class="report-body">
        <form method="post" enctype="multipart/form-data">
      <div class="form-group">
    <label for="productFeature">Type of Sketch</label>
    <select class="form-control" id="type" name="type" required>
        <option value="" disabled selected>Select an option</option>
        <option value="pencil">Pencil Sketch</option>
        <option value="color-pencil">Color Pencil Artwork</option>
        <option value="canvas">Canvas Paintings</option>
        <option value="water-color">Water Color Artwork</option>

        <option value="digital">Digital Artwork</option>
        <option value="glass">Glass Painting</option>

        <!-- Add more options as needed -->
    </select>

      <div class="form-group">
        <label for="productName">Name:</label>
        <input type="text" class="form-control" id="productName" name="productName" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Price:</label>
        <input type="number" step="0.01" class="form-control" id="productPrice" name="productPrice" required>
      </div>
      <div class="form-group">
        <label for="productPhoto">Photo:</label>
        <input type="file" class="form-control-file" name="productPhoto" id="productPhoto">
      </div>
      <div class="form-group">
        <label for="productFeature">Feature:</label>
        <textarea class="form-control" id="productFeature" name="productFeature" rows="3" required></textarea>
      </div>
      







      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include 'conn.php';
if(isset($_POST['submit']))
{
  // Get data from the Form
  $name = $_POST['productName'];
  $price = $_POST['productPrice'];
  $image = $_FILES['productPhoto'];
  $feature = $_POST['productFeature'];

  $filename = $image['name'];
  $filepath = $image['tmp_name'];
  $fileerror = $image['error'];
  $type=$_POST['type'];
  $str=substr($name,0,4);
    
    
    
    $rand=rand(1000,9999);
    $product_id=$str.'-'.$type.'-'.$rand;
  if($fileerror === 0){
    $destfile = 'upload/' . $filename;
    move_uploaded_file($filepath, $destfile);
    

    // Use $destfile instead of $image in the INSERT query to store the file path in the database
    $insertquery = "INSERT INTO `sketch_detail` (`product_id`, `type`, `name`, `price`, `image`, `feature`) VALUES ('$product_id', '$type', '$name', '$price', '$destfile', '$feature');";
    $res = mysqli_query($conn, $insertquery);
    

// Your PHP code here

if ($res) {
  echo '<script>alert("Successfully Added!");</script>';
} else {
  echo '<script>alert("Something went wrong, Retry Again!");</script>';
}
  }
}
?>

</script>
<script src="index.js"></script>
</body>
</html>
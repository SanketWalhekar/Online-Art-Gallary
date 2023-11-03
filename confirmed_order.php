<?php 
session_start();
require_once 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   
  
   body, html {
  height: 100%;
  margin: 0;
}

h1{
  color:#fff;
}

.bg-opacity{
    position: relative;
    background-color: #000;
  background-image: url("upload/Home.png");

  height: 100%; 

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}

.bg-opacity::before{
    content: ' ';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    opacity: 0.5;
    background:       url("All Images/Home.png") no-repeat center center;
    background-size: cover

  
  
}

.content{
  position: relative;
  width: 100%;
  height: 600px;
}

.card {
    width: 30%;
    height: 80%;
    display: flex;
    flex-direction: column;
   margin-left: 450px;
    background-color: #fff;
}

.header {
    height: 30%;
    
    color: rgb(189, 119, 232);
    text-align: center;
}

.container {
    padding: 2px 16px;
}

</style>
<body>
<?php
// Retrieve order_id from query parameter
$order_id = $_GET['order_id'] ?? null;
$_SESSION['order_id'] = $order_id;

$sql = "SELECT * FROM sketch_order WHERE order_id =?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            $size = $row['size'];
            $frame = $row['frame'];
            $requirement = $row['requirement'];
        } else {
            $name = "N/A";
            $email = "N/A";
            $size = "N/A";
            $frame = "N/A";
            $requirement = "N/A";
        }
    } else {
        echo "Error executing the query: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error preparing the statement: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<div class="bg-opacity">
    <div class="content">
        <div class="card">
            <div class="header">
                <h2>THANK YOU FOR YOUR ORDER!</h2>
                <h2 style="color: rgb(189, 119, 233); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 30px;">ORDER DETAILS</h2>
            </div>
            <div class="container">
                <?php if ($order_id) { ?>
                    <p><strong>Order ID:</strong> <?php echo $order_id; ?></p>
                    <p><strong>Name:</strong> <?php echo $name; ?></p>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Size:</strong> <?php echo $size; ?></p>
                    <p><strong>Frame:</strong> <?php echo $frame; ?></p>
                    <p><strong>Requirement:</strong> <?php echo $requirement; ?></p>

                    <form id="confirmationForm" action="update_order.php" method="POST">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                        <center><button type="submit" style="border-color: blueviolet; color: blueviolet; font-size: 24px; border-radius: 10px;" class="confirmation-button">Confirm Order</button></center>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
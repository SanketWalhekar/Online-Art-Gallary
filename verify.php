<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   



    <style >
  
  section{
    background-image: url("upload/Home.png");

}



    </style>
</head>
<body>
   





    <section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <button class="close-button" onclick="goBack()" style="position: absolute; top: 10px; right: 10px; z-index: 9999;">✕</button>


          <form method="post">
            <h3 class="mb-5">Reset  Password</h3>

            <div class="form-outline mb-4">
              <input type="text"  name="otp" class="form-control form-control-lg" placeholder="Enter OTP"/>
             
            </div>

            <div class="form-outline mb-4">
              <input type="password"  name="new_password" id="typePasswordX-2" class="form-control form-control-lg"  placeholder=" New Password"/>
            
            </div>

           
            <button class="btn btn-lg btn-block"   type="submit" name="submit"  style="background-color: #E0B0FF">Reset Password</button>
            
            
        
</form>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





















<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
<?php
session_start();
require_once 'conn.php';

if(isset($_POST["submit"])){
    $enteredOTP = $_POST["otp"];
    $newPassword = $_POST["new_password"];
    echo $_SESSION['otp'];
    if (isset($_SESSION['otp']) && $enteredOTP == $_SESSION['otp']) {
        // OTP is valid, reset the password
        $email = $_SESSION['reset_email']; // Retrieve the user's email from a session or another method

        // Validate the new password (e.g., minimum length)
        if (strlen($newPassword) >= 8) {
            // Hash the new password using PHP's password_hash() function
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the user's password in the database (replace 'your_table' with your actual table name)
            // Use your database connection method
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "UPDATE register SET password = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $hashedPassword, $email);
            
            if ($stmt->execute()) {
                $_SESSION['Password_Reset'] = true; // Add this line to set a flag
                header('Location:index.php');
            } else {
                echo "Error updating password: " . $stmt->error;
            }
            
            $stmt->close();
            $conn->close();
        } else {
            echo "<script>alert('Password must be at least 8 characters long.')</script>";

        }
    } else {
        echo "<script>alert('Invalid OTP please try again later')</script>";
    }
}
?>
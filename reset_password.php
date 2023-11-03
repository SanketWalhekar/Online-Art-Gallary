<?php
session_start();
require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                die("Connection failed: " . $db->connect_error);
            }
            
            $sql = "UPDATE register SET password = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $hashedPassword, $email);
            
            if ($stmt->execute()) {
                echo "Password reset successful!";
            } else {
                echo "Error updating password: " . $stmt->error;
            }
            
            $stmt->close();
            $conn->close();
        } else {
            echo "Password must be at least 8 characters long.";
        }
    } else {
        echo "Invalid OTP. Please try again.";
    }
}
?>

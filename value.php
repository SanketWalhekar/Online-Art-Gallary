<?php
session_start();
require_once 'conn.php';

$sql = "SELECT COUNT(*) AS received_count FROM sketch_order";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $receivedCount = $row['received_count'];
    $_SESSION['received_count'] = $receivedCount; // Store in a session variable
}

$sql1 = "SELECT COUNT(*) AS received_count1 FROM sketch_detail";
$result1 = $conn->query($sql1);

if ($result1) {
    $row1 = $result1->fetch_assoc();
    $receivedCount1 = $row1['received_count1'];
    $_SESSION['received_count1'] = $receivedCount1; // Store in a session variable
}

$sql2 = "SELECT COUNT(*) AS received_count2 FROM register";
$result2 = $conn->query($sql2);

if ($result2) {
    $row2 = $result2->fetch_assoc();
    $receivedCount2 = $row2['received_count2'];
    $_SESSION['received_count2'] = $receivedCount2; // Store in a session variable
}
?>

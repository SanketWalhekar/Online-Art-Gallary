<?php

require_once 'conn.php';
$receivedCount = 0;
$receivedCount1 = 0;

$sql = "SELECT COUNT(*) AS received_count FROM sketch_order";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $receivedCount = $row['received_count'];
}

$sql1 = "SELECT COUNT(*) AS received_count1 FROM sketch_detail";
$result1 = $conn->query($sql1);

if ($result1) {
    $row1 = $result1->fetch_assoc();
    $receivedCount1 = $row1['received_count1'];
}

$sql2 = "SELECT COUNT(*) AS received_count2 FROM register";
$result2 = $conn->query($sql2);

if ($result2) {
    $row2 = $result2->fetch_assoc();
    $receivedCount2 = $row2['received_count2'];
}

$sql3 = "SELECT COUNT(*) AS received_count3 FROM orders";
$result3 = $conn->query($sql3);

if ($result3) {
    $row3 = $result3->fetch_assoc();
    $receivedCount3 = $row3['received_count3'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
	
</head>
<body>
	

<header>

		<div class="logosec">
			<div class="logo">Sani.s Art</div>
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
		</div>

		<div class="searchbar">
			<input type="text"
				placeholder="Search">
			<div class="searchbtn">
			<i class="uil uil-search" style="font-size: 30px; color: white;"></i>

			</div>
		</div>

		<div class="message">
			<a href="https://mail.google.com/">
			<div class="circle"></div>
			<i class="uil uil-bell" style="font-size: 30px; color: black;"></i>

</a>
			<i class="uil uil-user-square" style="font-size: 30px; color: black;"></i>
			
		</div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1">
					<a href="#">
        <i class="uil uil-dashboard" style="font-size: 28px; color:white;"></i>
        <span style="display: inline-block; font-size: 20px; color: white;">Dashboard</span>
    </a>
					</div>

					<div class="option2 nav-option">
    <a href="sketches.php">
        <i class="uil uil-chart" style="font-size: 28px; color: black;"></i>
        <span style="display: inline-block; font-size: 20px; color: black;">Sketches</span>
    </a>
</div>


					<div class="nav-option option3">
					<a href="order_details.php">
        <i class="uil uil-shopping-bag" style="font-size: 28px; color: black;"></i>
        <span style="display: inline-block; font-size: 20px; color: black;">Order Details</span>
    </a>
					</div>

					<div class="nav-option option4">
					<a href="orders.php">
        <i class="uil uil-shopping-bag" style="font-size: 28px; color: black;"></i>
        <span style="display: inline-block; font-size: 20px; color: black;">Orders</span>
    </a>
					</div>
					
					<div class="nav-option option5">
					<a href="user.php">
					<i class="uil uil-user-circle" style="font-size: 28px; color: black;"></i>
                     <span style="display: inline-block; font-size: 20px; color: black;">Users</span>
                    </a>
					</div>

					<div class="nav-option option5">
					<a href="addproduct.php">
					<i class="uil uil-plus-circle" style="font-size: 28px; color: black;"></i>
        <span style="display: inline-block; font-size: 20px; color: black;">Add Sketches</span>
    </a>
					</div>


					<div class="nav-option option6">
					<a href="settings.php">
					<i class="uil uil-setting" style="font-size: 30px; color: black;"></i>

					<span style="display: inline-block; font-size: 20px; color: black;">Settings</span>
</a>
					</div>


					<div class="nav-option logout">
					

					<i class="uil uil-signout" style="font-size: 30px;"></i>
					<a href="logout.php">
						<h5 style="display: inline-block; font-size: 20px; color: black;">Logout</h5>
                    </a>
					</div>

				</div>
			</nav>
		</div>
		<div class="main">

			<div class="searchbar2">
				<input type="text"
					name=""
					id=""
					placeholder="Search">
				<div class="searchbtn">
				<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
						class="icn srchicn"
						alt="search-button">
				</div>
			</div>

			<div class="box-container">

				<a href="order_details.php">
    <div class="box box1" style="width:200px;">
        <div class="text">
            <center><h2 class="topic-heading"><?php echo $receivedCount; ?></h2></center>
            <h2 class="topic">Customized Order</h2>
        </div>
        <i class="uil uil-shopping-bag" style="font-size: 50px; color: white;"></i>
    </div>
</a>

<a href="sketches.php">
    <div class="box box2" style="width:200px;">
        <div class="text">
            <center><h2 class="topic-heading"><?php echo $receivedCount1; ?></h2></center>
            <h2 class="topic">Sketches</h2>
        </div>
        <i class="uil uil-chart" style="font-size: 50px; color: white;"></i>
    </div>
</a>


<a href="orders.php">
    <div class="box box3" style="width:200px;">
        <div class="text">
            <center><h2 class="topic-heading"><?php echo $receivedCount3; ?></h2></center>
            <h2 class="topic">Orders</h2>
        </div>
        <i class="uil uil-shopping-bag" style="font-size: 50px; color: white;"></i>
    </div>
</a>


<a href="user.php">
    <div class="box box4" style="width:200px;">
        <div class="text">
            <h2 class="topic-heading"><?php echo $receivedCount2; ?></h2>
            <h2 class="topic">Users</h2>
        </div>
        <i class="uil uil-users-alt" style="font-size: 50px; color: white;"></i>
    </div>
</a>

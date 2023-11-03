<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skecth page</title>
    <link rel="Stylesheet"  href="sketch.css">

 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="Stylesheet" href="btn1.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['product_success']) && $_SESSION['product_success']) {
                echo 'Swal.fire("Good job!", "Product Added to the cart", "success");';
                unset($_SESSION['product_success']); // Clear the session variable
            }
            ?>
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['product_update']) && $_SESSION['product_update']) {
                echo 'Swal.fire("Good job!", "Product Quantity Updated !!!", "success");';
                unset($_SESSION['product_update']); // Clear the session variable
            }
            ?>
        });
    </script>
</head>
<body>
<!--header -->
 <?php
include 'header_menu.php';
include 'check-if-added.php';
?>
<!--header ends -->
         <!--jumbutron start-->
        <!-- <div class="jumbotron text-center">
            <h1>Welcome to Sani.s Art</h1>
            <p>"Welcome to Sani's Art, where passion meets canvas. Our gallery is a sanctuary for art lovers, showcasing a captivating collection that speaks to the soul. Immerse yourself in a world of creativity and inspiration, where every stroke and hue tells a unique story. Explore the essence of artistic expression with us."





 </p>
        </div> -->
        
    <?php
      include 'conn.php';

      // Fetch data from the "pencil" table
     $sql = "SELECT * FROM sketch_detail where type='Pencil'";
      $result = mysqli_query($conn, $sql);

         // Store the fetched data in an array
       $pencils = [];
        while ($row = mysqli_fetch_assoc($result)) {
         $pencils[] = $row;
         }

 // Close the database connection

 ?>
    <!--menu list-->
    <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Arts</li>
                <li class="breadcrumb-item active" aria-current="page">Pencil</li>

            </ol>
        </nav> -->
<section>
    <div class="head" style="background-color: #C8ADE8; margin-top:70px; ">
    <center><h2 style="font-family: Goudy Bookletter 1911, sans-serif; font-size:30px ; margin-top: 20px; background-color: #C8ADE8; padding: 10px;" >Get your beautiful handmade sketches <br> Direct Message us for Sketch order </h2></center>
   <!-- <a href="page.html" ><button type="button" class="btn" style="background-color: rgb(17, 17, 144); color: white; margin-bottom: 10px; margin-left: 520px;">CLICK HERE FOR CUSTOMIZED SKETCH ORDERS</button> </a> -->
   <center><a href="page.php" ><button class="custom-btn btn-15" style="width: 400px; margin-bottom: 20px;">CLICK HERE FOR CUSTOMIZED SKETCH ORDER</button></a></center>
        </div>
   <div class="container1">
   <?php foreach ($pencils as $acc) { ?>
   <div class="card1 card-a">
   <div class="card-header">
          <img src="<?php echo $acc['image'];?> "class="card-img" />
        </div>
        <div class="card-footer">
           <center> <b><P style="font-family: Verdana; "></P></center></b>
         <hr>
         <center>  <P style="font-family: Verdana;"><?php echo $acc['feature']; ?></P></center>
         <hr>
         <center>  <b><P><?php echo $acc['price']; ?></P></center></b>
          <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
          <?php if (!isset($_SESSION['email'])) { ?>
            <a href="index.php#login"> <button class="custom-btn btn-12" style="margin-left: 14px;"><span>Click!</span><span>ADD TO CART</span></button>
</a>            <button class="custom-btn btn-5"><span>BUY NOW</span></button>

            <?php } 
            else { ?>
             <form method="post" action="cart-add.php">
             <input type="hidden" name="product_id" value="<?php echo $acc['product_id']; ?>">

            <!-- <a href="#"><button class="btn " type="submit"  style="background-color: blueviolet; color: blueviolet; color: #ffffff; margin-left: 10px; font-size: 15px;">ADD TO CART</button></a> -->
            <button class="custom-btn btn-12" style="margin-left: 14px;"><span>Click!</span><span>ADD TO CART</span></button>
            </form>
            <button class="custom-btn btn-5"><span>BUY NOW</span></button>
            <?php }
                             ?>
        </div>
        </div>

     </div>
     <?php }
     ?>
 </div>

    
        <?php


    

 // Fetch data from the "pencil" table
 $sql1 = "SELECT * FROM sketch_detail where type='Acrylic'";
 $result1 = mysqli_query($conn, $sql1);

// Store the fetched data in an array
$pencils1 = [];
while ($row1 = mysqli_fetch_assoc($result1)) {
    $pencils1[] = $row1;
}
?>
<div class="container1">
   <?php foreach ($pencils1 as $acc) { ?>
   <div class="card1 card-a">
   <div class="card-header">
          <img src="<?php echo $acc['image'];?> "class="card-img" />
        </div>
        <div class="card-footer">
           <center> <b><P style="font-family: Verdana; "></P></center></b>
         <hr>
         <center>  <P style="font-family: Verdana;"><?php echo $acc['feature']; ?></P></center>
         <hr>
         <center>  <b><P><?php echo $acc['price']; ?></P></center></b>
          <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
          <?php if (!isset($_SESSION['email'])) { ?>
            <a href="index.php#login"> <button class="custom-btn btn-12" style="margin-left: 14px;"><span>Click!</span><span>ADD TO CART</span></button>
</a>            <button class="custom-btn btn-5"><span>BUY NOW</span></button>            <?php } 
            else { ?>
             <form method="post" action="cart-add.php">
             <input type="hidden" name="product_id" value="<?php echo $acc['product_id']; ?>">

            <!-- <a href="#"><button class="btn " type="submit"  style="background-color: blueviolet; color: blueviolet; color: #ffffff; margin-left: 10px; font-size: 15px;">ADD TO CART</button></a> -->
            <button class="custom-btn btn-12" style="margin-left: 14px;"><span>Click!</span><span>ADD TO CART</span></button>
            </form>
            <button class="custom-btn btn-5"><span>BUY NOW</span></button>
            <?php }
                             ?>
        </div>
        </div>

     </div>
     <?php }
     ?>
 </div>
<?php


    

// Fetch data from the "pencil" table
$sql2 = "SELECT * FROM sketch_detail where type='Canvas'";

$result2 = mysqli_query($conn, $sql2);

// Store the fetched data in an array
$pencils2 = [];
while ($row2 = mysqli_fetch_assoc($result2)) {
    $pencils2[] = $row2;
}
?>
<div class="container1">
   <?php foreach ($pencils2 as $acc) { ?>
   <div class="card1 card-a">
   <div class="card-header">
          <img src="<?php echo $acc['image'];?> "class="card-img" />
        </div>
        <div class="card-footer">
           <center> <b><P style="font-family: Verdana; "></P></center></b>
         <hr>
         <center>  <P style="font-family: Verdana;"><?php echo $acc['feature']; ?></P></center>
         <hr>
         <center>  <b><P><?php echo $acc['price']; ?></P></center></b>
          <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
          <?php if (!isset($_SESSION['email'])) { ?>
            <a href="index.php#login"> <button class="custom-btn btn-12" style="margin-left: 14px;"><span>Click!</span><span>ADD TO CART</span></button>
</a>            <button class="custom-btn btn-5"><span>BUY NOW</span></button>            <?php } 
            else { ?>
             <form method="post" action="cart-add.php">
             <input type="hidden" name="product_id" value="<?php echo $acc['product_id']; ?>">

            <!-- <a href="#"><button class="btn " type="submit"  style="background-color: blueviolet; color: blueviolet; color: #ffffff; margin-left: 10px; font-size: 15px;">ADD TO CART</button></a> -->
            <button class="custom-btn btn-12" style="margin-left: 14px;"><span>Click!</span><span>ADD TO CART</span></button>
            </form>
            <button class="custom-btn btn-5"><span>BUY NOW</span></button>
            <?php }
                             ?>
        </div>
        </div>

     </div>
     <?php }
     ?>
 </div>

<?php


    

// Fetch data from the "pencil" table
$sql3 = "SELECT * FROM sketch_detail where type='Nature'";

$result3 = mysqli_query($conn, $sql3);

// Store the fetched data in an array
$pencils3 = [];
while ($row3 = mysqli_fetch_assoc($result3)) {
    $pencils3[] = $row3;
}
?>


<div class="container1">
   <?php foreach ($pencils3 as $acc) { ?>
   <div class="card1 card-a">
   <div class="card-header">
          <img src="<?php echo $acc['image'];?> "class="card-img" />
        </div>
        <div class="card-footer">
           <center> <b><P style="font-family: Verdana; "></P></center></b>
         <hr>
         <center>  <P style="font-family: Verdana;"><?php echo $acc['feature']; ?></P></center>
         <hr>
         <center>  <b><P><?php echo $acc['price']; ?></P></center></b>
          <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
          <?php if (!isset($_SESSION['email'])) { ?>
            <a href="index.php#login"> <button class="custom-btn btn-12" style="margin-left: 14px;"><span>Click!</span><span>ADD TO CART</span></button>
</a>            <button class="custom-btn btn-5"><span>BUY NOW</span></button>            <?php } 
            else { ?>
             <form method="post" action="cart-add.php">
             <input type="hidden" name="product_id" value="<?php echo $acc['product_id']; ?>">

            <!-- <a href="#"><button class="btn " type="submit"  style="background-color: blueviolet; color: blueviolet; color: #ffffff; margin-left: 10px; font-size: 15px;">ADD TO CART</button></a> -->
            <button class="custom-btn btn-12" style="margin-left: 14px;"><span>Click!</span><span>ADD TO CART</span></button>
            </form>
            <button class="custom-btn btn-5"><span>BUY NOW</span></button>
            <?php }
             ?>
        </div>
        </div>

     </div>
     <?php }
     ?>
 </div>
</section>

      <!--menu list ends-->
      <!-- footer-->
        <?php include 'footer.php'?>
      <!--footer ends-->
 </body>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
</html>

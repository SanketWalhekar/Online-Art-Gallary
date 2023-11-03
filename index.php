<?php
session_start();
require_once 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sani.s Art</title>
    <link rel="Stylesheet" href="in.css">
    <link rel="Stylesheet" href="head.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">



    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/font-awesome.min.css" rel="stylesheet" >
    <link href="css/global.css" rel="stylesheet">
     <link href="css/index.css" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz@9..144&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="Stylesheet" href="button.css">
    <link rel="Stylesheet" href="text.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
                echo 'Swal.fire("Good job!", "Registration Successfull!", "success");';
                unset($_SESSION['registration_success']); // Clear the session variable
            }
            ?>
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
                echo 'Swal.fire("Good job!", "Login Sucessfull!", "success");';
                unset($_SESSION['login_success']); // Clear the session variable
            }
            ?>
        });
    </script>

    
<script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['login_failed']) && $_SESSION['login_failed']) {
                echo 'Swal.fire("Oops...", "Login Failed!", "error");';
                unset($_SESSION['login_failed']); // Clear the session variable
            }
            ?>
        });
    </script>


<script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['Password_Reset']) && $_SESSION['Password_Reset']) {
                echo 'Swal.fire("Good job!", "Password Reset Successfully !", "success");';
                unset($_SESSION['Password_Reset']); // Clear the session variable
            }
            ?>
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['email_exist']) && $_SESSION['email_exist']) {
                echo 'Swal.fire("Warning!", "Email Already Exists", "warning");';
                unset($_SESSION['email_exist']); // Clear the session variable
            }
            ?>
        });


</script>
</head>
<body>
  <?php 
  include 'header_menu.php';
  ?>
<div class="slider" style="margin-left:170px">
  <div class="slides">
    
    <input type="radio" name="radio-btn" id="radio1">
    <input type="radio" name="radio-btn" id="radio2">
    <input type="radio" name="radio-btn" id="radio3">
    <input type="radio" name="radio-btn" id="radio4">
    
    
    <div class="slide first">
      <img src="upload/DECORE YOUR WALLS WITH ART.png" alt="">
    </div>
    <div class="slide">
      <img src="upload/GET YOUR BEAUTIFUL POTRAIT SKETCH.png" alt="">
    </div>
    <div class="slide">
      <img src="upload/GIFT TO YOUR LOVED ONES.png" alt="">
    </div>
    <div class="slide">
      <img src="upload/GET BEAU (1).png" alt="">
    </div>
    
    
    <div class="navigation-auto">
      <div class="auto-btn1"></div>
      <div class="auto-btn2"></div>
      <div class="auto-btn3"></div>
      <div class="auto-btn4"></div>
    </div>
    
  </div>
  
  <div class="navigation-manual">
    <label for="radio1" class="manual-btn"></label>
    <label for="radio2" class="manual-btn"></label>
    <label for="radio3" class="manual-btn"></label>
    <label for="radio4" class="manual-btn"></label>
  </div>
  
</div>

<script type="text/javascript">
var counter = 1;
setInterval(function(){
  document.getElementById('radio' + counter).checked = true;
  counter++;
  if(counter > 4){
    counter = 1;
  }
}, 3000);
</script>

<!-- ----------------- -->
<div class="sec">
<h1 style="font-size: 35px;">Art and collection</h1>
</div>
<div class="sec2">
  <h1>Shop by Category</h1>
  </div>

<hr style="width: 60%; margin-left: 310px; height: 2px;">

    <div class="container">
        <!-- Card 1 -->
        <div class="card card-1">
          <!-- card-header -->
          <div class="card-header">
            <a href="products.php?category=pencil"><img src="upload/SKETCH1.jpeg" class="card-img" /></a>
          </div>
          <!-- card-header -->
      
         
          <!-- card-footer -->
          <div class="card-footer">
            <a href="products.php?category=pencil">SKETCH</a>
          </div>
          <!-- card-footer -->
        </div>
        <!-- Card 1 -->
      
        <!-- Card 2 -->
        <div class="card card-2">
          <!-- card-header -->
          <div class="card-header">
            <a href="products.php?category=color-pencil"><img src="upload/color.jpeg" class="card-img" /></a>
          </div>
          <!-- card-header -->
      
         
      
          <!-- card-footer -->
          <div class="card-footer">
            <a href="products.php?category=color-pencil">COLOR PENCILS ARTWORKS</a>
          </div>
          <!-- card-footer -->
        </div>
        <!-- Card 2 -->
      
        <!-- Card 3 -->
        <div class="card card-3">
          <!-- card-header -->
          <div class="card-header">
            <a href="products.php?category=Canvas"><img src="upload/canvas.webp" class="card-img" /></a>
          </div>
          <!-- card-header -->
      
          
          <!-- card-footer -->
          <div class="card-footer">
            <a href="products.php?category=Canvas">CANVAS PAINTING</a>
          </div>
          <!-- card-footer -->
        </div>
        <!-- Card 3 -->
        
        <div class="card card-4">
          <!-- card-header -->
          <div class="card-header">
            <a href="products.php?category=water-color"> <img src="upload/water.jpeg" class="card-img" /></a>
          </div>
          <!-- card-header -->
      
         
          <!-- card-footer -->
          <div class="card-footer">
            <a href="products.php?category=water-color">WATER COLOR ARTWORKS</a>
          </div>
          <!-- card-footer -->
        </div>
        <!-- Card 1 -->
      
        <!-- Card 2 -->
        <div class="card card-5">
          <!-- card-header -->
          <div class="card-header">
            <a href="products.php?category=glass"><img src="upload/glass.webp" class="card-img" /></a>
          </div>
          <!-- card-header -->
      
         
      
          <!-- card-footer -->
          <div class="card-footer">
            <a href="products.php?category=glass">GLASS PAINTINGS</a>
          </div>
          <!-- card-footer -->
        </div>
        <!-- Card 2 -->
      
        <!-- Card 3 -->
        <div class="card card-6">
          <!-- card-header -->
          <div class="card-header">
            <a href="products.php?category=digital"><img src="upload/digital.webp" class="card-img" /></a>
          </div>
          <!-- card-header -->
      
          
          <!-- card-footer -->
          <div class="card-footer">
            <a href="products.php?category=digital">DIGITAL ARTWORKS</a>
          </div>
          <!-- card-footer -->
        </div>
        <!-- Card 3 -->
        </div>

        <section>
<center><h2 style="font-family: Goudy Bookletter 1911, sans-serif; font-size:30px ; margin-top: 20px; background-color: #C8ADE8; padding: 10px;" > BUY SKETCHES</h2></center>

<?php
$sql = "SELECT * FROM sketch_image;";

// Execute the query
$result = $conn->query($sql);
?>

<div class="container1">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imagePath = $row['image'];
    ?>
    <div class="card1 card-a">
        <div class="card-header">
            <a href="products.php?category=pencil"><img src="<?php echo $imagePath; ?>" class="card-img" /></a>
        </div>
    </div>
    <?php
        }
    }
    ?>
 </div>
 <center><a href="products.php?category=pencil"><button class="btn" type="submit"  style="border-color: blueviolet; color: blueviolet;  font-size: 24px;">Show more</button></a></center>

  </section>
  <section>


  <center><h2 style="font-family: Goudy Bookletter 1911, sans-serif; font-size:30px ; margin-top: 20px; background-color: #C8ADE8; padding: 10px;" > BUY CANVAS SKETCHES</h2></center>

<?php
$sql = "SELECT * FROM canvas;";

// Execute the query
$result = $conn->query($sql);
?>

<div class="container1">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imagePath = $row['image'];
    ?>
    <div class="card1 card-a">
        <div class="card-header">
            <a href="products.php?category=Canvas"><img src="<?php echo $imagePath; ?>" class="card-img" /></a>
        </div>
    </div>
    <?php
        }
    }
    ?>
 </div>
 <center><a href="products.php?category=Canvas"><button class="btn" type="submit"  style="border-color: blueviolet; color: blueviolet;  font-size: 24px;">Show more</button></a></center>

  </section>

  <section>


<center><h2 style="font-family: Goudy Bookletter 1911, sans-serif; font-size:30px ; margin-top: 20px; background-color: #C8ADE8; padding: 10px;" > BUY COLOR PENCIL ARTWORK</h2></center>

<?php
$sql = "SELECT * FROM color;";

// Execute the query
$result = $conn->query($sql);
?>

<div class="container1">
  <?php
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $imagePath = $row['image'];
  ?>
  <div class="card1 card-a">
      <div class="card-header">
          <a href="products.php?category=color-pencil"><img src="<?php echo $imagePath; ?>" class="card-img" /></a>
      </div>
  </div>
  <?php
      }
  }
  ?>
</div>
<center><a href="products.php?category=color-pencil"><button class="btn" type="submit"  style="border-color: blueviolet; color: blueviolet;  font-size: 24px;">Show more</button></a></center>
</section>

  <?php
  include 'footer.php';
  ?>
  <!-- Card 1 -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

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
</body>
</html>
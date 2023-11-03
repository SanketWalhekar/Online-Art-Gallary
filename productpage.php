<?php
require_once 'conn.php';


if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Perform a query to fetch data based on the product_id
    $sql = "SELECT * FROM sketch_detail WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);

    // Check if data was found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row['name'];
        $image = $row['image'];
        $description = $row['feature'];
        $price = $row['price'];


        // You can use this data to display information on the product page
    } else {
        echo "Product not found.";
    }

    // Close the statement
} else {
    echo "Product ID not provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="Stylesheet" href="pro.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="Stylesheet" href="btn1.css">



</head>
<body>
    <div class="container d-lg-flex">
   
        <div class="box-1 bg-light user">
        
            
            <div class="box-inner-1 pb-3 mb-3 ">
            
                <div class="d-flex justify-content-between mb-3 userdetails">
                    <center></centerz><p class="fw-bold" style="font-size: 20px; ">ARTWORK SPECIFICATIONS</p></center>
                   
                </div>
                <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel"
                    data-bs-interval="2000">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#my" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#my" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#my" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="card">
                        <!-- card-header -->
                        <div class="card-header">
                          <img src="<?php echo $image;?>" class="card-img" />
                        </div>
                       
                        
                      </div>
                    
                    
                    
                </div>
             </div>
             </div>
        <div class="box-2">
        <div id="backButton" style="margin-left:430px">
     <button onclick="goBack()" style="background-color: purple; color: #FFFFFF; border: none; padding: 5px 10px; cursor: pointer;">&times;</button>
      </div>

            <div class="box-inner-2">
                <div>
                    <p class="fw-bold" style="font-size: 24px;"><?php echo $product_name;?>-ARTWORK 24in X 24in </p>
                    <p class="dis mb-3" >By Sani's Art 🎨🖌️</p>
                </div>
                <form action="">
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Artist Name: XXXXX XXXX</p>
                        
                    </div>
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">100% Handmade</p>
                        
                    </div>
                    <div class="address">
                        <p class="dis fw-bold mb-3">Customized frame </p>
                        
                       
                       
                       
                       
                       
                    <div>
                        <p class="dis fw-bold mb-2">Order in Any Custom Size</p>
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="my-3 cardname">
                            <p class="dis fw-bold mb-2">Price : <?php echo $price?>/- INR</p>
                           
                        </div>
                        

                       
                        <div class="radiobtn">
                            <input type="radio" name="box" id="one">
                            <input type="radio" name="box" id="two">
                            <input type="radio" name="box" id="three">
                            <label for="one" class="box py-2 first">
                                <div class="d-flex align-items-start">
                                    <span class="circle"></span>
                                    <div class="course">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <span class="fw-bold">
                                                Paper size
                                            </span>
                                            <!-- <span class="fas fa-dollar-sign">29</span> -->
                                        </div>
                                        <span>A4 Paper sheet</span>
                                    </div>
                                </div>
                            </label>
                            <label for="two" class="box py-2 second">
                                <div class="d-flex">
                                    <span class="circle"></span>
                                    <div class="course">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <span class="fw-bold">
                                                Product Type
                                            </span>
                                            <!-- <span class="fas fa-dollar-sign">29</span> -->
                                        </div>
                                        <span>Graphite Pencil sketch</span>
                                    </div>
                                </div>
                            </label>
                            <label for="three" class="box py-2 third">
                                <div class="d-flex">
                                    <span class="circle"></span>
                                    <div class="course">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <span class="fw-bold">
                                              Price
                                            </span>
                                            <!-- <span class="fas fa-dollar-sign">29</span> -->
                                        </div>
                                        <span><?php echo $price;?>/- INR</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>






                        

                           
                            
               
                                
                                    <!-- <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
            
                                    <?php if (!isset($_SESSION['email'])) { ?>
                                        <a href="index.php#login"><button class="custom-btn btn-12" style="margin-left: 20px; margin-top: 40px;" ><span>Click!</span><span>ADD TO CART</span></button></a>
                                        <button class="custom-btn btn-5" style="margin-right: 90px; margin-top: 40px;"><span>BUY NOW</span></button>
                                        <?php } 
                                        else { ?>
                                            <form method="post" action="cart-add.php">
                                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                            <button class="custom-btn btn-12" style="margin-left: 20px; margin-top: 40px;" ><span>Click!</span><span>ADD TO CART</span></button>
                                        <button class="custom-btn btn-5" style="margin-right: 90px; margin-top: 40px;"><span>BUY NOW</span></button>
                                        <?php
                                        }
                                        ?>

                                        </div> -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>
</html>
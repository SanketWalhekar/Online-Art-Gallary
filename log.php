<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   
</head>
<style>
section{
    background-image: url("upload/Home.png");

}


    </style>



<body>

    
<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <button class="close-button" onclick="goBack()" style="position: absolute; top: 10px; right: 10px; z-index: 9999;">✕</button>


          <form action="login_script.php" method="post">
            <h3 class="mb-5">Login</h3>

            <div class="form-outline mb-4">
              <input type="email" id="typeEmailX-2" name="lemail" class="form-control form-control-lg" placeholder="Your Email"/>
             
            </div>

            <div class="form-outline mb-4">
              <input type="password"  name="lpassword" id="typePasswordX-2" class="form-control form-control-lg"  placeholder="Password"/>
            
            </div>

           
            <button class="btn btn-lg btn-block"   type="submit" name="Submit"  style="background-color: #E0B0FF">Login</button>
            <br>
            <br>
            
            <p class="small"><a class="text-blue-50" href="forgot.php" style="margin-top:20px;">Forgot password?</a></p>

            <p class="small"><a class="text-blue-50" href="reg.php" style="margin-top:20px;">Sign Up?</a></p>

</form>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>







</div>
<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>

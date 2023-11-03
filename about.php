<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>sani.s Art</title>
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

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  text-align: center;
  background-color: #C3B1E1;
  color: rgb(247, 247, 247);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}



.column1 {
  float: left;
  width: 20%;
  
  height: 300px; /* Should be removed. Only for demonstration */
 margin: 20px;
 margin-left: 35px;
}
.column1 p{
    text-align:start;
    color:rgb(32, 31, 31);
    font-size: 17px;
}
.column1 h2{
    color:rgb(255, 255, 255);
}



</style>
</head>
<body >
  <?php
  require_once 'header_menu.php';
  ?>
   <center> <h1 style="background-color: #D3D3D3; height: 120px; padding-top: 40px; margin-bottom: 20px; margin-top: -10px;">About Sani's Art Gallery 🎨🖌️</h1></center>

<div class="about-section" style="margin-bottom: 20px; margin-top: -20px;"> 
   
  
<div class="row">
    <div class="column1" >
      <h2>Sani's Art</h2>
      <hr>
      <p>Welcome to Sani's Art Gallery, where creativity and passion converge to create an artistic sanctuary. Our gallery is more than just a place to admire art; it's a haven for art enthusiasts, a testament to human creativity, and a journey through the world of emotions and imagination..</p>
    </div>
    <div class="column1" >
      <h2>Our Story</h2>
      <hr>
      <p>Sani's Art Gallery was founded with a singular vision: to make art accessible to all and celebrate the profound impact it has on our lives. Our story began with a deep love for art and an unwavering belief in its power to inspire, heal, and connect people. We embarked on a mission to curate an exceptional collection of artworks that would touch hearts and souls.</p>
    </div>
    <div class="column1">
      <h2>Our Mission</h2>
      <hr>
      <p>Our mission is simple yet profound: to ignite a passion for art in every individual who walks through our doors or visits our online gallery. We believe that art has the power to transcend boundaries, spark conversations, and inspire change. Through exhibitions, workshops, and community engagement, we strive to make art an integral part of people's lives</p>
    </div>
     <div class="column1">
      <h2>Our Collection</h2>
      <hr>
      <p>Step into our gallery, and you'll find an exquisite array of artistic expressions. From stunning canvas paintings that capture the essence of nature to mesmerizing acrylic masterpieces that evoke emotions, our collection spans a diverse range of styles and themes. Each artwork on display tells a unique story and invites you to explore the world of the artist's imagination.
    </p>
    </div>
  </div>





</div>

<h2 style="text-align:center">Our Artist</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="SANIKA.webp" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Sanika Gadekar</h2>
        <p class="title">ARTIST</p>
        <p>Bachelor of Fine art and Interior designing</p>
        <p>sanikagadekar@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="SANK.png" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Sanket Walhekar</h2>
        <p class="title">Art Director</p>
        <p>Completed Art course From JJ School of Art </p>
        <p>sanket@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="NIRAJ.jpeg" alt="John" style="width:100%">
      <div class="container">
        <h2>Niraj Jadhav</h2>
        <p class="title">Set & Graphic  Designer </p>
        <p>Have a great experience in Art field </p>
        <p>niraj@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>

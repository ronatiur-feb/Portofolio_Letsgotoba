<?php 
session_start();

include 'koneksi.php';
?>
<?php
$id_transportasi = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM transportasi WHERE id_transportasi ='$id_transportasi'");
$detail = $ambil->fetch_assoc();

?>




<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Let'sGoToba</title>

    <!-- Bootstrap core CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css"> 
    
    <style type="text/css">

        <style type="text/css">
       body {
  margin: 0;

  background-color: #CEE4E6;
}
     


      
.img-responsive,
.thumbnail > img,
.thumbnail a > img,
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  max-width: 100%;
  height: auto;
  padding-top: 100px;
}
    </style>

    
  </head>

  <body>

    <!-- Navigation -->
 <?php

include 'menu.php';
 ?>
 <section class="konten">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="foto_transportasi/<?php echo $detail["foto_transportasi"]; ?>" class="img-responsive">
      </div>

      <div class="col-md-6">
        <br>
        <br>
        <br>
        <br>
        <h2><?php echo $detail["nama_transportasi"];?></h2><br>
        
        <p>Plat :<?php echo $detail["plat_transportasi"];?> </p>

        <p>Tempat duduk :<?php echo $detail["tempat_duduk_transportasi"];?></p>
        
        <p>Harga/hari   :<?php echo number_format($detail["harga_transportasi"]) ;?></p>
        
        <p>Deskripsi :<br><?php echo $detail["deskripsi_transportasi"];?></p>

        <form method="post">
          <div class="form-group">
            <div class="input-group">
              
              <div class="input-group">
                <button class="btn btn-primary" name="beli">Booking</button>
              </div>
            </div>
          </div>
          
        </form>




        
      </div>
    </div>
  </div>
 </section>

    <!-- Page Content -->
    
      <!-- /.jumbotron -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php 

    include 'footer.php';
  ?>
      <!-- /.container -->
    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

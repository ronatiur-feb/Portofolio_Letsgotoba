<?php 
session_start();

include 'koneksi.php';
?>
<?php
$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
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
    
    <style>

        
       body {
  margin: 0;

  
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
.container {
  width: 100%;
  padding-right: 0px;
  padding-left: 0px;
  margin-right: auto;
  margin-left: auto; }
  @media (min-width: 576px) {
    .container {
      max-width: 540px; } }
  @media (min-width: 768px) {
    .container {
      max-width: 720px; } }
  @media (min-width: 992px) {
    .container {
      max-width: 960px; } }
  @media (min-width: 1200px) {
    .container {
      max-width: 1140px; } }
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
 				<img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" class="img-responsive">
 			</div>
      <br>
      <br>
      <br>


 			<div class="col-md-6" class="">
 				<br>
 				<br>
 				<br>
 				<br>
 				<h2><?php echo $detail["nama_produk"];?></h2><br>
				<h4>Rp.<?php echo number_format($detail["harga_produk"]) ;?></h4>
        <h5>Stok :<?php echo $detail['stok_produk'];?></h5>
 

 				<form method="post">
 					<div class="form-group">
 						<div class="input-group">
 							<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
              </div>
              
              <br>
              <br>
 							<div class="input-group">
 								<button class="btn btn-success" name="beli">Beli</button>
 							</div>
 						</div>
 					<br>
          <br>
        <br>
        <br>
        <br>
          </div>
 					<br>
 				</form>
        
        <br>
        <br>
        <br>
        <br>




 				<?php 
 					if (isset($_POST["beli"])) {
 						$jumlah = $_POST["jumlah"];
 						$_SESSION["keranjang"][$id_produk] = $jumlah;

 						echo "<scrit>alert('produk telah masuk ke keranjang belanja');</script>";
 						echo "<script>location='keranjang.php';</script>";
 					}
 				?>

 				
 			</div>
 		</div>
 	</div>
 </section>

    <!-- Page Content -->
    
      <!-- /.jumbotron -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <Br>
    <br>

    
  <footer class="py-5 navbar-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright Let'sGoToba</p>
      </div>
      <!-- /.container -->
    </footer>
      <!-- /.container -->
    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

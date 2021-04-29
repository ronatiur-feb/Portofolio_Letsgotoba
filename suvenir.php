<?php
session_start();

$koneksi = new mysqli("localhost","root","","letsgotobasa");

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    

    <title>Let'sGoToba</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/star-rating.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">  

  </head>

  <body>

    <!-- Navigation -->
    <?php include 'menu.php'; ?>
 

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Souvenir
        
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Souvenir</li>
      </ol>

      <!-- Image Header -->
    
      <!-- Marketing Icons Section -->
       <div class="row">

        <?php $ambil = $koneksi->query("SELECT * FROM souvenir ");?>
        <?php while($persouvenir = $ambil->fetch_assoc())  {  ?>
        
        <div class="col-lg-4 col-sm-6 portfolio-item"ker" >
          <div class="card h-100">
            <img class="card-img-top" height="200" src="fotosouvenir/<?php echo $persouvenir['fotosouvenir']; ?>" alt=""></a>
            <div class="card-body">
              <h3 class="card-title">
                <style type="text/css">
              #kiri
              {
                width: 25%;
                height: auto;
                background-color: white;
                float: left;
              }
              #kanan
              {
                width: 75%;
                height: auto;
                background-color: white;
                float: right;
              }
              </style>
              <a><?php echo $persouvenir['namaTempat'];?></a></h3>
              <div id="kiri">Alamat</div>
              <div id="kanan"><a><?php echo $persouvenir['alamat'];?></a></div>
              <div id="kiri"></div>
              <div id="kanan"></div>
              <div id="kiri"></div>
              <div id="kanan"></div>
              <div id="kiri">deskripsi</div>
              <div id="kanan"><a><?php echo $persouvenir['deskripsi'];?></a></div>
               <div id="kiri"></div>
              <div id="kanan"></div>
              <div id="kiri"></div>
              <div id="kanan"></div>
              <div id="kiri">Buka</div>
              <div id="kanan"><a><?php echo $persouvenir['buka'];?></a></div>              
            </div>
            <div class="card-footer"> 
            <a href="detailsouvenir.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">Detail</a>
            <a href="<?php echo $persouvenir['map']; ?>" class="btn btn-primary">View Maps</a>
            </div>
          </div>
        </div>
        <?php } ?>


      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright Let'sGoToba</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>


<?php


?>

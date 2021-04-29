
<?php
session_start();

$koneksi = mysqli_connect("localhost","root","","letsgotobasa");



?>

<!DOCTYPE html>
<html lang="en">

  <head>

    

    <title>Let'sGoToba</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
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
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" type="text/css" href="css/csss/style.css">


    <style type="text/css">
 


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
    <?php include 'menu.php'; ?>
 

    <!-- Page Content -->
    <div class="container ftco-animate">
   <br>
   <br>
   <br>
   
    
      <!-- Image Header -->

  <h1 class="mt-4 mb-3">Destinasi
        
      </h1>

     
    
<div class="topnav" align="right">
  
       <form action="" method="post">
        <div class="search-container">
        <input type="text" name="inputan_pencarian" placeholder="Search..." />
      <button type="submit" name="cari"><i class="fa fa-search"></i></button>

      
      </form>
</div>
</div>

      <!-- Marketing Icons Section -->

<br>



       <div class="row">

        <?php 
        $inputan_pencarian = @$_POST['inputan_pencarian'];
       
        if (isset($_POST["cari"])) {
          if ($inputan_pencarian != "") {
          
        $ambil = $koneksi->query("SELECT * FROM destinasi WHERE nama_destinasi LIKE '%$inputan_pencarian%'");
      }else {
        $ambil = $koneksi->query("SELECT * FROM destinasi WHERE nama_kabupaten LIKE 'dairi'");
      
      }
        } else {
          $ambil = $koneksi->query("SELECT * FROM destinasi WHERE nama_kabupaten LIKE 'dairi'");
        
        }
        $cek = mysqli_num_rows($ambil);
        if ($cek < 1){
          ?>
          <tr>
            <td><h2>Maaf, destinasi tidak ditemukan</h2></td>
          </tr>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          
          <?php 
        } else{

       while($destinasi = $ambil->fetch_assoc())  {  ?>
        
        <div class="col-lg-4 col-sm-6 portfolio-item ftco-animate" style="padding-top: 15px">
          <div class="card h-100 ftco-animate">
            <img class="card-img-top" style="" height="200" src="foto_destinasi/<?php echo $destinasi['foto_destinasi']; ?>" alt=""></a>
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
              <a><?php echo $destinasi['nama_destinasi'];?></a></h3>            
            </div>
            <div class="card-footer">
              <center><a href="<?php echo $destinasi['map']; ?>" class="btn btn-info">View Maps</a>
            </div>
          </div>
        </div>
        <?php 
      }
      } 
        ?>

      

      </div>
      <!-- /.row -->
  <br>
        <br>
        <br>
    </div>

    




    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 navbar-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright Let'sGoToba</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
      <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>

</html>


<?php


?>

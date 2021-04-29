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
  

    <style type="text/css">
 



.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
  height: 60px;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
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
    <?php include 'menu.php'; ?>
 

    <!-- Page Content -->
    <div class="container ftco-animate">
   <br>
   <br>
   <br>
   
 
      <!-- Image Header -->

  <h1 class="mt-4 mb-3">Destinasi
        
      </h1>

      
    

      <!-- Marketing Icons Section -->

<br>



       <div class="row">

        <?php 
        $inputan_pencarian = @$_POST['inputan_pencarian'];
       
        if (isset($_POST["cari"])) {
          if ($inputan_pencarian != "") {
          
        $ambil = $koneksi->query("SELECT * FROM destinasi WHERE nama_destinasi LIKE '%$inputan_pencarian%'");
      }else {
        $ambil = $koneksi->query("SELECT * FROM destinasi");
      
      }
        } else {
          $ambil = $koneksi->query("SELECT * FROM destinasi");
        
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

       $destinasi = $ambil->fetch_assoc()    ?>
    
<div class="col-lg-4 col-sm-4 portfolio-item ftco-animate"  style="padding-top: 15px">
          <div class="destination ftco-animate">
            <a href="samosir.php" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(desthome/images.jpg); height: 280px" >
              <span class=""><h3 style="color: white">Samosir</h3></span>
            </a>
          </div>
        </div>      

          <div class="col-lg-4 col-sm-4 portfolio-item ftco-animate"  style="padding-top: 15px">
          <div class="destination ftco-animate">
            <a href="simalungun.php" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(desthome/simalungun.jpg); height: 280px" >
              <span class=""><h3 style="color: white">Simalungun</h3></span>
            </a>
          </div>
        </div>
<div class="col-lg-4 col-sm-4 portfolio-item ftco-animate"  style="padding-top: 15px">
          <div class="destination ftco-animate">
            <a href="tobasa.php" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(desthome/tobasa.jpg); height: 280px" >
              <span class=""><h3 style="color: white">Toba Samosir</h3></span>
            </a>
          </div>
        </div>
<div class="col-lg-4 col-sm-4 portfolio-item ftco-animate"  style="padding-top: 15px">
          <div class="destination ftco-animate">
            <a href="taput.php" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(desthome/taput.jpg); height: 280px" >
              <span class=""><h3 style="color: white">Tapanuli Utara</h3></span>
            </a>
          </div>
        </div>
<div class="col-lg-4 col-sm-4 portfolio-item ftco-animate"  style="padding-top: 15px">
          <div class="destination ftco-animate">
            <a href="humbahas.php" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(desthome/humbahas.jpg); height: 280px" >
              <span class=""><h3 style="color: white">Humbang Hasundutan</h3></span>
            </a>
          </div>
        </div><div class="col-lg-4 col-sm-4 portfolio-item ftco-animate"  style="padding-top: 15px">
          <div class="destination ftco-animate">
            <a href="dairi.php" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(desthome/dairi.jpg); height: 280px" >
              <span class=""><h3 style="color: white">Dairi</h3></span>
            </a>
          </div>
        </div>

         
      
        <?php 
      
      } 
        ?>

      

      </div>
      <!-- /.row -->
  <br>
        <br>
        <br>
    </div>

    


</div>
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

<?php
session_start();

$koneksi = new mysqli("localhost","root","","letsgotobasa");

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    

    <title>Let'sGoToba</title>

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
 

.card{
  height: 750px;
}
  .card-img-top p{
        padding: 430px 20px 30px;
        color: blue;
        font : bold 20px sans-serif;
      }


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

 

    <!-- Navigation -->
   
  
  <body>

     <?php include 'menu.php'; ?>


 <div class="container ftco-animate">
      <br>
    <br>
<br>


    <!-- Page Content -->
  <h1 class="mt-4 mb-3">Transportasi  
      </h1>

  

      <!-- Page Heading/Breadcrumbs -->
   
      <div class="topnav" align="right">
        
       <form action="" method="post">
        <div class="search-container">
        <input type="text" name="inputan_pencarian" placeholder="Search..." />
      <button type="submit" name="cari"><i class="fa fa-search"></i></button>

      
      </form>

</div>
</div>
<br>
      
       <div class="row">
<?php 
        $inputan_pencarian = @$_POST['inputan_pencarian'];
       
        if (isset($_POST["cari"])) {
          if ($inputan_pencarian != "") {
          
        $ambil = $koneksi->query("SELECT * FROM transportasi WHERE nama_transportasi LIKE '%$inputan_pencarian%' AND brand LIKE 'daihatsu'");
      }else {
        $ambil = $koneksi->query("SELECT * FROM transportasi WHERE brand LIKE 'daihatsu'");
      
      }
        } else {
          $ambil = $koneksi->query("SELECT * FROM transportasi WHERE brand LIKE 'daihatsu'");
        
        }
        $cek = mysqli_num_rows($ambil);
        if ($cek < 1){
          ?>
          <tr>
            <td><h2>Maaf, Transportasi tidak ditemukan</h2></td>
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
          while($pertransportasi = $ambil->fetch_assoc())  {  ?>
        
        <div class="col-lg-4 col-sm-2 portfolio-item ftco-animate" style="padding-top: 15px">
          <div class="card h-100 ftco-animate">
            <img class="card-img-top" height="250" src="foto_transportasi/<?php echo $pertransportasi['foto_transportasi']; ?>" alt="">
            <div class="card-body">
              <h3 class="card-title">
             <center><a><?php echo $pertransportasi['nama_transportasi'];?>  </a>
               <div class="two">
                    <h6><span class="price" style="color: blue">Rp.<?php echo number_format($pertransportasi['harga_transportasi']) ;?></span></h6>
                  </div>
            
            <div class="card-footer">
          <center>  <a href="bookingtransportasi.php?id=<?php echo $pertransportasi['id_transportasi'];?>" class="btn btn-success">Booking</a>  
            </div>
            </div>
          </div>
        </div>
        <?php 
      }
    }
       ?>

</div>
     
<br>
<br>
<br> 
      <!-- /.row -->

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

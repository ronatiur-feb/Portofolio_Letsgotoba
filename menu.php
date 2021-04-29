<!DOCTYPE html>
<html>
<head>
  <title></title>
<style type="text/css">


  
  .dropdown-menu{
    background-color: #0B6B8A;
    color: white;
    
    width: 100px;

  }
  .dropdown-item{
    color: white;
  }
  .nav-item{
    color: white;
  }
  .navbar-dark{
    background-color: #0B6B8A;

  }

  .navbar-brand{
    font-family: jokerman;
 }


  

</style>
<link rel="stylesheet" href="fa/css/font-awesome.min.css">

</head>
<body>


<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="anj.jpg" height="55" ></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php" style="color: white"><i class=""></i>Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="destinasi.php" style="color: white"><i class=""></i>Destinasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transportasi.php"  style="color: white"><i class=""></i>Transportasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kuliner.php"  style="color: white"><i class=""></i>Kuliner</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="souvenir.php"  style="color: white"><i class=""></i>Souvenir</a>
            </li>
              
<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" class="fa fa-user" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: white">Account</a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropownPortfolio">
    
    <?php if (isset($_SESSION["pelanggan"])):?>
            
             
              <a class="dropdown-item" href="checkout.php">Checkout</a>
              <a class="dropdown-item" href="keranjang.php">Keranjang</a>
              <a class="dropdown-item" href="riwayatbooking.php">Riwayat Booking</a>
              <a class="dropdown-item" href="riwayat.php">Riwayat Belanja</a>
              <a class="dropdown-item" href="logout.php">Logout</a></div>
            
        <?php else: ?>
           
             <a class="dropdown-item" href="login.php">Login</a>
            
             <a class="dropdown-item" href="daftar.php">Daftar</a>
            
       
            
        <?php endif?>
    
</li>
              
            
            

             
            </ul>
          </div>
        </div>
      </div>
    </nav>

    </body>
</html>
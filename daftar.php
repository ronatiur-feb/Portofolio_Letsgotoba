<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">

  <head>

    

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

        <link rel="stylesheet" href="login/css/menu.css"/>
        <link rel="stylesheet" href="login/css/main.css"/>
        <link rel="stylesheet" href="login/css/bgimg.css"/>
        <link rel="stylesheet" href="login/css/font.css"/>
        <link rel="stylesheet" href="login/css/font-awesome.min.css"/>
        <script type="text/javascript" src="login/js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="login/js/main.js"></script>
     

     <style type="text/css">
        body{
                  background-image : url('danau.jpg');
    background-repeat: no-repeat;
    background-size: 100%;
}
        table{
            border: 1px;
            background-color: 
        }
        
    </style>


  </head>

<body>
    <?php include 'menu.php';?>
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
    
        <div class="login-form-container" id="login-form">
        <br>
        <div class="login-form-content">
            <div class="login-form-header">
            
                <h3>Register</h3>
            </div>
            <form method="post" action="" class="login-form">
                                <div class="input-container">
                    <i class="fa fa-user"></i>
                    <input type="text" class="input" name="nama" placeholder="Nama" required="" />
                </div>
                <div class="input-container">
                    <i class="fa fa-user"></i>
                    <input type="text" class="input" name="username" placeholder="Username" required="" />
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password"  id="login-password" class="input" name="password" placeholder="Password" required="" />
                    <i id="show-password" class="fa fa-eye"></i>
                </div>
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="input" name="email" placeholder="Email" required="" />
                </div>
                <div class="input-container">
                    <i class="fa fa-phone"></i>
                    <input type="text" class="input" name="telepon" placeholder="Telepon" required="" />
                </div>
                <div class="input-container">
                    <i class="fa fa-map-marker"></i>
                    <input type="text" class="input" name="alamat" placeholder="Alamat" required="" />
                </div>
             
                <input type="submit" name="daftar" value="Daftar" class="button" style="background-color: #006400" />
                <a href="login.php" class="register">Login</a>
            </form>
            
        </div>

    </div>





    <?php 
    if(isset($_POST["daftar"]))
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $nama = $_POST["nama"];
        $telepon = $_POST["telepon"];
        $alamat = $_POST["alamat"];

        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE username=$username");
        $yangcocok = $ambil->num_rows;
        if ($yangcocok==1)
        {
            echo "<script>alert('Pendaftaran Gagal, email sudah digunakan')</script>";
            echo "<script>location='daftar.php';</script>";
        }
        else 
        {
            $koneksi->query("INSERT INTO pelanggan (username,email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES('$username','$email','$password','$nama','$telepon','$alamat')");

            echo "<script>alert('Pendaftaran Sukses, silahkan login')</script>";
            echo "<script>location='login.php';</script>";

        }

    }
    ?>
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

    
    <footer class="py-5 navbar-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright Let'sGoToba</p>
      </div>
      <!-- /.container -->
    </footer>
</body>
</html>
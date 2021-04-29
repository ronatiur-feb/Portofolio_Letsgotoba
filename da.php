<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">

  <head>

    

    <title>Let'sGoToba</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

<body>
    <?php include 'menu.php';?>
        
    
    <form class="form-container" action="" method=post>
         <div class="table" align="center" >
        <table>
            <h2>Form Pendaftaran</h2>
<br/>
            <tr>
                <td>Nama</td>
                <td></td>
                <td>:</td>
                <td></td>
                <td><input type="text" class="form-control" name="nama" value="" required></td>
            </tr>
            
            <tr>
                <td>Username</td>
                <td></td>
                <td>:</td>
                <td></td>
                
                <td><input type="text" class="form-control" name="username" value="" required></td>
            </tr>
            
            <tr>
                <td>Password</td>
                <td></td>
                <td>:</td>
                <td></td>
                <td><input type="password" class="form-control" name="password" value="" required></td>
            </tr>

            <tr>
                <td>Email</td>
                <td></td>
                <td>:</td>
                <td></td>
                <td><input type="email" class="form-control" name="email" value="" required></td>
            </tr>
            

            <tr>
                <td>Telp/HP</td>
                <td></td>
                <td>:</td>
                <td></td>
                <td><input type="text" class="form-control" name="telepon" value="" required></td>
            </tr>

              <tr>
                <td>Alamat</td>
                <td></td>
                <td>:</td>
                <td></td>

                <td><textarea class="form-control" name="alamat" required></textarea></td>
            </tr>

            

            

            <tr>
                <td><a href="login.php">Halaman Login</a></td>
                <td></td>
                <td></td>
                <td></td>
                <td><button type="submit" class="btn btn-primary" name="daftar" value="Daftar">Login</td>
            </tr>
         </table>
    </form>


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
            $koneksi->query("INSERT INTO pelanggan (username,email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan_alamat_pelanggan) VALUES('$username','$email','$password','$nama','$telepon','$alamat')");

            echo "<script>alert('Pendaftaran Sukses, silahkan login')</script>";
            echo "<script>location='login.php';</script>";

        }

    }
    ?>


    </body>
</html>
<?php
session_start();

$koneksi = new mysqli("localhost","root","","letsgotobasa");


if (!isset($_SESSION["pelanggan"])) 
{
echo "<script>alert('Silahkan login')</script>";
echo "<script>location='login.php';</script>";
}
?>
<?php 
                        $select = "SELECT * FROM transportasi WHERE id_transportasi = '$_GET[id]'";
                        $ambill = $koneksi->query($select);
                        $pecahh = $ambill->fetch_assoc();
                        ?>





<!DOCTYPE html>
<html>
<head>
    <title>Let'sGoToba</title>
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
        .lokassi{
            border-radius:5px;
            width: 350px;
            height: 30px;
            float: right;
        }
        .brangkat{
            border-radius: 5px;
            width: 200px;
            height:30px;
            float: right;
        }
          .btn{
            float: right;
           
  
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


<?php include 'menu.php'; ?>

<br>
<br>

<br>

<br>
<br>
<br>

<br>


    <section class="konten">
        <div class="container">       
        <div class="row">
        <div class="col-md-5">    
        <br>
        <br>
        <br>    
         <img src="foto_transportasi/<?php echo $pecahh["foto_transportasi"]; ?>" class="img-responsive" height="300" width="400">
                           </div>
            
            <div class="col-md-7">
              
                               
                                <h4>Nama :<?php echo $pecahh["nama_transportasi"];?></h4>
                            

                           
                                <h4>Plat :
                                <?php echo $pecahh["plat_transportasi"];?></h4>
                           
                            
                            
                                <h4>Kapasitas Tempat Duduk :
                                <?php echo $pecahh["tempat_duduk_transportasi"];?></h4>

                            
                                <h4>Harga/Hari: Rp. <?php echo number_format($pecahh["harga_transportasi"]) ;?></h4>
                                <hr>

                                <form method="post">


                              

                           
                                <h5>Tanggal Berangkat
                                <input type="date" name="daritanggal" class="brangkat  " required=""></h5>
                         
                            
                                <h5>Tanggal Kembali
                                    <input type="date" name="sampaitanggal" class="brangkat" required="">
                                    

                                     <h5>Lokasi
                                <textarea name="lokasi" class="lokassi"  required="" rows="5"></textarea></h5>
                                <br>
                                <br>
                                  <br>
                                <br>
                          
                                <button class="btn btn-success" name="booking">Booking</button>
                            

                         </div>
                     </div>
                    </form>
         
</div>
              
            </div>
        </div>
    </section>
                
        
                      

                
                
                

                <?php
                if (isset($_POST["booking"])) {
                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                    $nama_pelanggan = $_SESSION["pelanggan"]["nama_pelanggan"];
                    $dari_tanggal = $_POST["daritanggal"];
                    $sampai_tanggal = $_POST["sampaitanggal"];
                    $lokasi = $_POST["lokasi"];



                    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
                    

                    
                    $koneksi->query("INSERT INTO booking (id_pelanggan,id_transportasi,nama_pelanggan,lokasi,daritanggal,sampaitanggal,status) VALUES ('$id_pelanggan','$_GET[id]','$nama_pelanggan','$lokasi','$dari_tanggal','$sampai_tanggal','Menunggu Konfirmasi')");

                
                    
                    


                  




            echo "<script>alert('Pemesanan Berhasil, silahkan tunggu')</script>";
            echo "<script>location='transportasi.php';</script>";

        

    }
    ?>

   
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




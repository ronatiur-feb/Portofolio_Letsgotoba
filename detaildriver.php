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
            width: 150px;
            height: 30px;
            float: right;
        }
        .brangkat{
            border-radius: 5px;
            width: 150px;
            height:30px;
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
           
       body {
  margin: 0;

}
     </style>

    </style>
</head>
<body>


<?php include 'menu.php'; ?>

<br>
<br>
<br>
<br>
<br>


    <section class="konten">
        <div class="container">       
         <div class="row">    
                    
          
                  <table>

                      <div class="col-md-4">
                               <img src="foto_driver/<?php echo $pecahh["foto_driver"]; ?>" class="img-responsive" width="300px" height="250px" style="float: left;">
                        </div>
                        <div class="col-md-5" align="right">
                                <h5>Nama Driver:
                                <?php echo $pecahh["nama_driver"];?></h5>
                                <br>
                       
                                <h5>Usia Driver:
                                <?php echo $pecahh["usia"];?> Tahun<h5>
                                <br>
                          
                                <h5>No Telepon Driver:
                                <?php echo $pecahh["notelp_driver"] ;?></h5>
                                <br>
                        
                            
                                
                            <h5>Alamat Driver:
                                
                                <?php echo $pecahh["alamat_driver"] ;?></h5>
                           

                                <br>
                        
                               <a href="bookingtransportasi.php?id=<?php echo $pertransportasi['id_transportasi'];?>" class="btn btn-success">Booking</a>
                            
                            
</table>
                    </form>
            </div>
        </div>
    </section>
                
        
                      

                
                
                

        
   
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




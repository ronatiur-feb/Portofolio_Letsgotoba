<?php
session_start();

$koneksi = new mysqli("localhost","root","","letsgotobasa");

?>

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

    <style type="text/css">
       body {
  margin: 0;
  
  background-color: #CEE4E6;
}
     </style>


  </head>

  <body>

    <!-- Navigation -->
    <?php include 'menu.php'; ?>

    <h2>Anji</h2>
    <table class="table table-bordered">
  <thead>
    <tr>
      
      <th>Nama</th>
      <th>Deskripsi</th>
      <th>Foto</th>
        
    </tr>
  </thead>
  <tbody>
 
    <?php $ambil = $koneksi->query("SELECT * FROM kuliner");?>
    <?php while($pecah = $ambil->fetch_assoc())  {  ?>
    <tr>
      
      <td><?php echo $pecah['tempat_kuliner']; ?></td>
      
      <td><?php echo $pecah['deskripsi_kuliner']; ?></td>
      
      <td>
        <img src="../foto_kuliner/<?php echo $pecah['foto_kuliner']; ?>" width="100">
      </td>
    </tr>
    
    <?php }?>
  </tbody>

</table>


  </body>
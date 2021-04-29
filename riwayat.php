<?php
session_start();
	include 'koneksi.php';
	if (!isset($_SESSION["pelanggan"])) 
{
echo "<script>alert('Silahkan login')</script>";
echo "<script>location='login.php';</script>";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>LetsGoToba</title>

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
 
td{
  color: black;
}

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
<body>


<?php 
	include 'menu.php';
?>

<br>


<section class="riwayat">
	<div class="container">
		<br>
            <br>
            <br>
		<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h3>
		<br>

		<table id="customers">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$nomor = 1;
				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];

				$ambil = $koneksi ->query("SELECT * FROM pembelian WHERE id_pelanggan = $id_pelanggan");
				while($pecah = $ambil->fetch_assoc()){

				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah['tanggal_pembelian'];?></td>
					
					<td>Rp.<?php echo number_format($pecah['total_pembelian']) ;?></td>
					<td>
						<a href="nota.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info">Detail</a> 
						<a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">Pembayaran</a>
					</td>
				</tr>
				<?php $nomor++;?>
				<?php } ?>
			</tbody>
		</table>
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
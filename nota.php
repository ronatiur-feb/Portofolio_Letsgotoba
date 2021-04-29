<?php


$koneksi = new mysqli("localhost","root","","letsgotobasa");

?>

<!DOCTYPE html>
<html>
<head>
	<title>LetsGoToba</title>
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
  font-family: Arial, Helvetica, sans-serif;
  
}
td,p,strong,th{
	color: black;
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

<?php include 'menu.php' ?>

<section class="konten">
	<div class="container">

		
		<h2>Detail Pembelian</h2>
		<br>
		<br>


<?php

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");

$detail = $ambil->fetch_assoc();
?>







<div class="row">
	<div class="col-md-4">
		<h3>Waktu Pembelian</h3>
		<p>
	Tanggal :<?php echo $detail['tanggal_pembelian'];?> <br>
	Total :<?php echo $detail['total_pembelian'];?> <br>
</p>
	</div>
	<div class="col-md-4">
		
	</div>
	<div class="col-md-4">
		</div>
</div>


<table class="table table-bordered">
	<thead>
    					<tr>
    						<th>No</th>
    						<th>Produk</th>
    						<th>Harga</th>
    						<th>Jumlah</th>
    						<th>Subharga</th>
    						<th> </th>
    					</tr>
    				</thead>
	
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama_produk'];?></td>
			<td><?php echo $pecah['harga_produk'];?></td>
			<td><?php echo $pecah['jumlah'];?></td>
			<td>
				<?php echo $pecah['harga_produk']*$pecah['jumlah'];?>
			</td>
			
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>


<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
				<strong>BANK MANDIRI 130-00923123-23213 AN. Joni Nababan</strong>
			</p>
			
		</div>
	</div>
</div>
<a href="riwayat.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">Pembayaran</a>


		
	</div>
</section>
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





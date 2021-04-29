<?php
session_start();

$koneksi = new mysqli("localhost","root","","letsgotobasa");



if (!isset($_SESSION["pelanggan"])) 
{
echo "<script>alert('Silahkan login')</script>";
echo "<script>location='login.php';</script>";
}
?>


<!DOCTYPE html>
<html>
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



<style>

td,label{
  color: black;
}
    

#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0B6B8A;
  color: white;
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


    <section class="konten">
    	<div class="container">
    		<h1>Keranjang Belanja</h1>
    			<hr>
    			<table id="customers">
    				<thead>
    					<tr>
    						<th>No</th>
    						<th>Produk</th>
    						<th>Harga</th>
    						<th>Jumlah</th>
    						<th>Subharga</th>
    					
    					</tr>
    				</thead>
    				<tbody>
    					<?php $nomor=1;?>
    					<?php $totalbelanja = 0;?>
    					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
    					<?php 
    					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
    					$pecah = $ambil->fetch_assoc();
                        
    					$subharga = $pecah["harga_produk"] * $jumlah;
    					
    					?>

    					<tr>
    						<td><?php echo $nomor;?></td>
    						<td><?php echo $pecah["nama_produk"];?></td>
    						<td>Rp.<?php echo number_format($pecah["harga_produk"]);?></td>
    						<td><?php echo $jumlah;?></td>
    						<td>Rp.<?php echo number_format($subharga);?></td>
    						
    					</tr>
    					<?php echo $nomor++;?>
    					<?php $totalbelanja+=$subharga;  ?>
    				<?php endforeach ?>
    				</tbody>
    				<tfoot>
    					<tr>
    						<td colspan="4"><h5>Total Belanja</h5></td>
    						<td><h5>Rp.<?php echo number_format($totalbelanja); ?></h5></td>
    					</tr>
    				</tfoot>
    			</table>
                <br>
                <br>
    	
        <br>

    			<form method="post">

    				
                <div class="form-group">
                    <label><Strong><h3>Alamat Lengkap Pengiriman</h3></Strong></label>
                    <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap pengiriman"></textarea>
                    
                </div>
    	
<br>
        <br>
        		<button class="btn btn-info" name="checkout">Checkout</button>
    			</form>
                <Br>
                <br>
                <br>


                <?php
                if (isset($_POST["checkout"])) {
                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                    
                    $tanggal_pembelian = date("Y-m-d");
                    $alamat_pengiriman = $_POST["alamat_pengiriman"];



                    $total_pembelian = $totalbelanja + $tarif;
                
                    $koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,total_pembelian,alamat_pengiriman) VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian','$alamat_pengiriman')");

                
                    $id_pembelian_barusan = $koneksi->insert_id;

                    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
                    {
                        $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')");
                    
                        $koneksi->query("UPDATE produk SET stok_produk = stok_produk -$jumlah WHERE id_produk='$id_produk'");

                    }


                    unset($_SESSION["keranjang"]);



                    echo "<script>alert('Pembelian sukses');</script>";
                    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";

                }

                ?>

    	</div>
    </section>

 <footer class="py-5 navbar-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright Let'sGoToba</p>
      </div>
      <!-- /.container -->
    </footer>

</body>
</html>
<?php
session_start();
 //koneksi ke database 
 include 'koneksi.php';

 //jika tidak ada sessio pelanggan (belum Login)
 if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
  {
 	echo "<script>alert('silahkan Login terlebih dahulu');</script>";
 	echo "<script>location='login.php';</script>";
 	exit();


 }	
 	//mendapatkan id pembelian dari Url
 	$idpem = $_GET["id"];
 	$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem' ");
 	$detpem = $ambil->fetch_assoc();

 	// echo "<pre>";

 	// print_r($detpem);
 	// print_r($_SESSION);

 	// echo "</pre>";

 	//mendapatkan id_pelanggan yang beli
 	$id_pelanggan_beli = $detpem["id_pelanggan"];
 	//mendapatkan id_pelanggan yang login
 	$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

 	if ($id_pelanggan_login !== $id_pelanggan_beli) {
	 	echo "<script>alert('jangan nakal nanti kena cubit');</script>";
	 	echo "<script>location='riwayat.php';</script>";
	 	exit();
 	}

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

}

label{
	color: black;
}
     </style>


</head>
<body>
</head>
<body>

<?php 
include 'menu.php';
?>
<Br>
<br>
	<div class="container">
		<br>
		<br>
		
		
		<h3>Kirim Bukti Pembayaran Anda</h3>
		<div class="alert alert-info">Total Tagihan Anda
			<strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong>
		</div>


		<form method="post" enctype="multipart/form-data">
			<div class="form-gorup">
				<label>Nama Penyetor</label>
				<input type="text" class="form-control" name="nama" required="">
			</div>
			<div class="form-gorup">
				<label>Bank</label>
				<input type="text" class="form-control" name="bank" required="">
			</div>
			<div class="form-gorup">
				<label>Jumlah</label>
				<input type="number" class="form-control" name="jumlah" min="1" required="">
			</div>
			<div class="form-gorup">
				<label>Foto Bukti</label>
				<input type="file" class="form-control" name="bukti" required="">
				<p class="text-danger">Masukkan Foto bukti transfer</p>
			</div>
			<button class="btn btn-success" name="Kirim" >Kirim</button>
		</form>
	</div>

	<?php 
	//jika ada toombol kirim
	if (isset($_POST["Kirim"]))
	{
		//upload dulu foto bukti_pembayaran  
		$idpem = $_GET['id'];
		$namabukti = $_FILES["bukti"]["name"];
		$lokasibukti = $_FILES["bukti"]["tmp_name"];
		$namafiks = date("YmdHis").$namabukti;
		move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

		$nama = $_POST["nama"];
		$bank = $_POST["bank"];
		$jumlah = $_POST["jumlah"];
		$tanggal = date("Y-m-d");

		//simpan pembayaran
		$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
			VALUES('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks') ");

		//update pemabelian dari pending menjadi sudah kirim pembayaran
		$koneksi->query("UPDATE pembelian SET status='Bukti pembayaran sudah terkirim' WHERE id_pembelian='$idpem' ");

		echo "<script>alert('terimakasih, Sudah mengirimkan Bukti pembayaran');</script>";
	 	echo "<script>location='riwayat.php';</script>";

	}

	?>




</body>
</html>	 
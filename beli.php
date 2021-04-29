<?php
session_start();

$id_produk = $_GET['id'];

if(isset($_SESSION['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$id_produk]+=1;
}

else
{
	$_SESSION['keranjang'][$id_produk] = 1;
}
if (!isset($_SESSION["pelanggan"])) 
{
echo "<script>alert('Silahkan login')</script>";
echo "<script>location='login.php';</script>";
}
?>



echo "<script>alert('Souvenir telah masuk ke keranjang belanja ');</script>";
echo "<script>location='keranjang.php';</script>";

?>
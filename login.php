<?php
session_start();

$koneksi = new mysqli("localhost","root","","letsgotobasa");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Let'sGoToba</title>
	
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    


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
	</head>
  

    <style type="text/css">
    	body{
    background-image : url('danau.jpg');			
	background-repeat: no-repeat;
	background-size: 100%;
	background-color: grey;
}
		table{
			border: 1px;
			background-color: 
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
<br>
<br>
<br>

	

    <div class="login-form-container" id="login-form">
    	<br>
		<div class="login-form-content">
			<div class="login-form-header">
			
				<h3>Login</h3>
			</div>
			<form method="post" action="" class="login-form">
				<div class="input-container">
					<i class="fa fa-user"></i>
					<input type="text" class="input" name="username" placeholder="Username"/>
				</div>
				<div class="input-container">
					<i class="fa fa-lock"></i>
					<input type="password"  id="login-password" class="input" name="password" placeholder="Password"/>
					<i id="show-password" class="fa fa-eye"></i>
				</div>
				<input type="submit" name="login" value="Login" class="button" style="background-color: #006400"" />
				<a href="daftar.php" class="register">Register</a>
			</form>
			
		</div>

	</div>
	<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<br>
		<br>



	<?php

	if (isset($_POST["login"])) 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE username='$username' AND password_pelanggan='$password'");
	
		$akunyangcocok = $ambil->num_rows;

		if ($akunyangcocok==1) 
		{
			$akun = $ambil->fetch_assoc();

			$_SESSION["pelanggan"] = $akun;
			echo "<script>alert('Anda sukses Login')</script>";
			echo "<script>location='index.php';</script>";


		}
		else
		{
		
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
	<br>	<br>
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
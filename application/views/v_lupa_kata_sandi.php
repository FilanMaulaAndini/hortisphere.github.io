<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Lupa Kata Sandi</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>LUPA KATA SANDI</p>
						<h1>Masukkan</h1>
					</div>
					<?php
					if(validation_errors()){
						?>
						<div class="alert alert-info text-center">
						<?php echo validation_errors(); ?>
						</div>
						<?php
					}
				
					if($this->session->flashdata('message')){
					?>
					<div class="alert alert-info text-center">
					<?php echo $this->session->flashdata('message'); ?>
					</div>
					<?php
					} 
					?>
					<div class="card-body">
						<div class="billing-address-form">
						<form method="post" action="<?php echo base_url() . 'C_lupa_kata_sandi/reset_password_validation'; ?>">
								<p><input type="text" placeholder="Username" name="username" id="username" required></p>
								<p><input type="password" placeholder="Password Baru" name="password" id="password" required></p>
								<p><input type="password" placeholder="Konfirmasi Password" id="password_confirm" required name="password_confirm" value="<?php echo set_value('password_confirm'); ?>"></p>
								<button type="submit" class="boxed-btn">Sign In</a>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- jquery -->
	<script src="<?php echo base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="<?php echo base_url() ?>assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="<?php echo base_url() ?>assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="<?php echo base_url() ?>assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="<?php echo base_url() ?>assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="<?php echo base_url() ?>assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="<?php echo base_url() ?>assets/js/main.js"></script>

</body>
</html>
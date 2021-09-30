<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hortisphere</title>
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main2.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url() ?>assets/img/breadcrumb-bg.jpg');">
			<div class="wrap-login100">
				<div class="profile-img">
                            <img src="<?=base_url()?>upload/user/<?=$detail->gambar?>" alt="foto" height="200" width="200" style="display: block; margin: auto;"/>
                        </div>
					<span class="login100-form-title p-b-34 p-t-27">
						Profil User
					</span>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
						<?php echo $detail->user_level; ?>
						</button>
					</div><br>
						<a class="txt1" href="#">
							Nama Lengkap
						</a>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nama_lengkap" placeholder="<?php echo $detail->nama_lengkap; ?>" disabled>
					</div>

						<a class="txt1" href="#">
							Username
						</a>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="username" placeholder="<?php echo $detail->username; ?>" disabled>
					</div>

						<a class="txt1" href="#">
							Email
						</a>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="email" placeholder="<?php echo $detail->email; ?>" disabled>
					</div>

						<a class="txt1" href="#">
							No. Telp
						</a>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="no_telp" placeholder="<?php echo $detail->no_telp; ?>" disabled>
					</div>

						<a class="txt1" href="#">
							Alamat
						</a>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="alamat" placeholder="<?php echo $detail->alamat; ?>" disabled>
					</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/select2/select2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?php echo base_url() ?>assets/js/main2.js"></script>

</body>
</html>
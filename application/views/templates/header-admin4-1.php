<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Hortisphere</title>
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.png">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ready.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header disabled-default" >
				<a href="index.html" class="logo">
					Halaman Admin
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg card-warning">
				<div class="container-fluid">
				<?php echo form_open('C_pembukuan/cari2/') ?>
					<form class="navbar-left navbar-form nav-search mr-md-3" >
						<div class="input-group">
							<input type="text" name="keyword" class="form-control" placeholder="Cari">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<?php echo form_close() ?>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="<?php echo base_url() ?>assets/img/profil.jpg" alt="user-img" width="36" class="img-circle"><span ><?php echo $detail->nama_lengkap ?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="<?=base_url()?>upload/user/<?=$detail->gambar?>" alt="user"></div>
										<div class="u-text">
											<h4><?php echo $detail->username; ?></h4>
											<p class="text-muted"><?php echo $detail->email; ?></p><a href="<?= base_url() . 'C_admin/lihat_profil/' . $detail->id_user; ?>" class="btn btn-rounded btn-danger btn-sm">Lihat Profil</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= base_url() . 'C_admin/logout'; ?>"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="<?=base_url()?>upload/user/<?=$detail->gambar?>">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
							
								<span>
									<?php echo $detail->nama_lengkap; ?>
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="<?= base_url() . 'C_admin/btn_edit/'?>">
											<span class="link-collapse">Edit Profil User</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="<?= base_url() . 'C_admin/index'; ?>">
								<i class="la la-dashboard text-warning"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() . 'C_info/index_admin'; ?>">
								<i class="la la-mobile text-warning"></i>
								<p>Informasi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() . 'C_berita/index'; ?>">
								<i class="la la-microphone text-warning"></i>
								<p>Berita</p>
							</a>
						</li>
						<li class="nav-item active ">
							<a href="<?= base_url() . 'C_pembukuan/index_admin'; ?>">
								<i class="la la-pencil text-warning"></i>
								<p>Pembukuan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() . 'C_harga_pasar/index_admin'; ?>">
								<i class="la la-money text-warning"></i>
								<p>Harga Pasar</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() . 'C_analisis/index_admin'; ?>">
								<i class="la la-calculator text-warning"></i>
								<p>Simulasi Analisis Usaha</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() . 'C_tanya_jawab/index_admin'; ?>">
								<i class="la la-comment text-warning"></i>
								<p>Tanya Jawab</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			

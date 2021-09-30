<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Berita Selengkapnya</p>
						<h1>Pertanian</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single article section -->
	<form class="form-horizontal" method="post" action="<?=base_url()?>C_berita/detail_berita/<?=$hortisphere->id_berita?>">
	<div class="mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-article-section">
						<div class="single-article-text">
						<img src="<?php echo base_url('upload/berita/'.$hortisphere->gambar) ?>" height="400" width="500" style="display: block; margin: auto;"/>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Administrator</span>
								<span class="date"><i class="fas fa-calendar"><?php echo $hortisphere->tanggal_tambah ?></i></span>
							</p>
							<h2><?php echo $hortisphere->judul ?></h2>
							<p style='text-align:justify;'><?php echo $hortisphere->isi ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
	<!-- end single article section -->
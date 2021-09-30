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

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
			<?php 
                foreach ($hortisphere as $berita) : ?>
				<div class="col-lg-12 col-md-6">
				<form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_berita/lihat_berita' .  $berita->id_berita ?>">
					<div class="single-latest-news">
						<div class="news-text-box">
							<h3><a href=""><?php echo $berita->judul ?></a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Administrator</span>
								<span class="date"><i class="fas fa-calendar"></i> <?php echo $berita->tanggal_tambah ?></span>
							</p>
							
							<p><p class="excerpt"><?php $readmore=$berita->isi;
							$cut=substr($readmore,0,200);
							echo $cut."..."
								?></p></p>
							<a href="<?=base_url()?>C_berita/detail_berita/<?=$berita->id_berita?>" class="read-more-btn">baca selengkapnya <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</form>
			<?php endforeach; ?>
			</div>
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="card-body">
								<?php echo $pagination; ?>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->
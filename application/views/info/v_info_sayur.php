<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Informasi Hortikultura</p>
						<h1>Sayur-sayuran</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
	
			<div class="row product-lists">
			<?php 
                foreach ($hortisphere as $info) : ?>
				<div class="col-lg-4 col-md-6 text-center">
				<form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_info/sayur' . $info->id_info ?>">
				<?php if($info->jenis=='Sayur'): ?>
					<div class="single-product-item">
						<div class="product-image">
							<img src="<?php echo base_url('upload/komoditas/'.$info->gambar_komoditas) ?>" height="300" width="100" style="display: block; margin: auto;"/>
						</div>
						<h3><?php echo $info->nama_komoditas ?></h3>
						<a href="<?=base_url()?>C_info/detail_info/<?=$info->id_info?>" class="cart-btn"></i> Selengkapnya</a>
					</div>
					<?php endif; ?>
					</form>
				</div>
				<?php endforeach; ?>
			</div>		
			<div class="row">
				<div class="col-md-12">
					<div class="card-body">
                  		<?php echo $pagination; ?>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<!-- end products -->
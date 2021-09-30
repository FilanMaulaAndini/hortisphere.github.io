			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Laporan Keuangan </h4>
										<p class="card-category">Tiap Masa Tanam</p>
									</div>		
									<div class="card-body">
									<?php foreach ($hortisphere1 as $data) : ?>
										<?php $masa_tanam =  $data->komoditas . " - " . $data->masa . " bulan"?>
										<?php if($this->session->userdata('id_user')==$data->id_user) : ?>
										<div class="col-md-12">
											<div class="card">
												<div class="card-header ">
													<h4 class="card-title" ><a href="<?php echo base_url() . 'C_pembukuan/detail_catatanMasaTanam/' . $data->id_tanam; ?>"><?php echo $masa_tanam; ?></a></h4>
													<p class="card-category"><?php echo $data->tanggal_mulai_tanam; ?></p>
												</div>
											</div>
										</div>
										<?php endif; ?>
	 								<?php endforeach; ?>
									</div>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


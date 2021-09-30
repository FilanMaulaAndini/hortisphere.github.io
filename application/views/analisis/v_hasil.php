<div class="main-panel">
				<div class="content">
				<div class="container-fluid">
						<div class="row row-card-no-pd">
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										<p class="fw-bold mt-1">Komoditas</p>
										<h4><b><?php echo $komoditas ?></b></h4>
										<a href="#" class="btn btn-primary btn-full text-left mt-3 mb-3"><i class="la la-plus"></i>Buat Simulasi Baru</a>
									</div>
									<div class="card-footer">
										<ul class="nav">
											<li class="nav-item ml-auto"><a class="btn btn-default btn-link" href="#"><i class="la la-refresh"></i> Refresh</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="card">
									<div class="card-body">
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Total Biaya Produksi</span>
												<?php $total_biaya_produksi="Rp. " . number_format($total_biaya_produksi,2,',','.'); ?>
												<span class="text-muted fw-bold"><?php echo $total_biaya_produksi ?></span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												
												<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="<?php echo $total_biaya_produksi ?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $total_biaya_produksi ?>"></div>
											</div>
										</div>
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Pendapatan</span>
												<?php $pendapatan="Rp. " . number_format($pendapatan,2,',','.'); ?>
												<span class="text-muted fw-bold"><?php echo $pendapatan ?></span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="<?php echo $pendapatan ?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $pendapatan ?>"></div>
											</div>
										</div>
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Keuntungan</span>
												<?php $keuntungan="Rp. " . number_format($keuntungan,2,',','.'); ?>
												<span class="text-muted fw-bold"><?php echo $keuntungan ?></span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="<?php echo $keuntungan ?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $keuntungan ?>"></div>
											</div>
										</div>
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Biaya / tahun</span>
												<?php $biaya_tahun="Rp. " . number_format($biaya_tahun,2,',','.'); ?>
												<span class="text-muted fw-bold"><?php echo $biaya_tahun ?></span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="60%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats">
									<div class="card-body">
										<p class="fw-bold mt-1">Statistik</p>
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center icon-warning">
													<i class="la la-pie-chart text-warning"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Produktivitas / tahun</p>
													<?php $produktivitas = number_format($produktivitas,2,',','.') . " Kg/Ha/Tahun"; ?>
													<h4 class="card-title"><?php echo $produktivitas ?></h4>
												</div>
											</div>
										</div>
										<hr/>
										
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				


<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php endif; ?>
<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Laporan Keuangan</h4>
										<p class="card-category">Tiap Masa Tanam</p>
									</div>
									<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">No.</th>
													<th scope="col">Tanggal</th>
													<th scope="col">Masa Tanam</th>
													<th scope="col">Uraian</th>
													<th scope="col">Pemasukan</th>
													<th scope="col">Pengeluaran</th>
													<th scope="col">Saldo</th>
													<th scope="col">Keterangan</th>
												</tr>
											</thead>
											<tbody>	
											<?php $No=1; $saldo=0; $saldo1=0; $saldo2=0; $total=0; $total1=0; $total2=0; 
                          						foreach ($hortisphere as $catatan) : ?>
											<?php 
											$saldo += $catatan->pemasukan - $catatan->pengeluaran;
											$saldo1 +=$catatan->pemasukan;
											$saldo2 +=$catatan->pengeluaran; 
											?>
												<tr>
													<td><?php echo $No++ ?></td>
													<td><?php echo $catatan->tanggal_tambah ?></td>
													<td><?php echo $catatan->komoditas." - ".$catatan->masa." bulan" ?></td>
													<td><?php echo $catatan->uraian ?></td>
													<td><?php echo "Rp. " . number_format($catatan->pemasukan,2,',','.'); ?></td>
													<td><?php echo "Rp. " . number_format($catatan->pengeluaran,2,',','.'); ?></td>
													<td><?php echo "Rp. " . number_format($saldo,2,',','.');?></td>
													<td><?php echo $catatan->keterangan ?></td>
												</tr>
											<?php endforeach; ?>
											<?php $total += $saldo+0 ;?>
											<?php $total1 += $saldo1+0 ;?>
											<?php $total2 += $saldo2+0 ;?>
											</tbody>
													<tr>
														<th colspan="4"><center><h4>Total</h4></center></th>
														<th><b><h4>Rp.<?= number_format($total1) ;?></h4></b></th>
														<th><b><h4>Rp.<?= number_format($total2) ;?></h4></b></th>
														<td colspan="2"><b><h4>Rp.<?= number_format($total) ;?></h4></b></td>
													</tr>
										</table>
									</div>
									</div>
								</div>
								
							</div>
							</div>
						</div>
					</div>
				</div>


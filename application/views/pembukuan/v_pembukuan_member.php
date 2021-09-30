			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
					<div class="card-body  text-right">
								<p class="demo">
									<div class="dropdown">
										<a class="btn btn-primary" href="<?php echo base_url() . 'C_pembukuan/btn_catatanMasaTanam/'?>">
											Lihat Laporan Tiap Masa Tanam
										</a>
										<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
											Tambah
										</button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
											<a class="dropdown-item"  data-toggle="modal" data-target="#add_data_Modal">Masa Tanam</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" data-toggle="modal" data-target="#add_data_Modal2">Catatan</a>
										</ul>
									</div>
								</p>
							</div>
						<div class="row">
							<div class="col-md-8">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Pembukuan </h4>
										<p class="card-category">Catatan Keuangan</p>
									</div>
									<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">No.</th>
													<th scope="col">Tanggal</th>
													<th scope="col">ID Tanam</th>
													<th scope="col">Masa Tanam</th>
													<th scope="col">Uraian</th>
													<th scope="col">Pemasukan</th>
													<th scope="col">Pengeluaran</th>
													<th scope="col">Keterangan</th>
													<th scope="col" colspan="2">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php if($this->session->flashdata('success')){ ?>  
												<div class="alert alert-success">  
													<a href="#" class="close" data-dismiss="alert">&times;</a>  
													<strong><?php echo $this->session->flashdata('success'); ?>  </strong> 
												</div>  
												<?php } else if($this->session->flashdata('hapus')){ ?>  
												<div class="alert alert-danger">  
													<a href="#" class="close" data-dismiss="alert">&times;</a>  
													<strong><?php echo $this->session->flashdata('hapus'); ?> </strong>  
												</div>  
												<?php } else if($this->session->flashdata('edit')){ ?>  
												<div class="alert alert-warning">  
													<a href="#" class="close" data-dismiss="alert">&times;</a>  
													<strong><?php echo $this->session->flashdata('edit'); ?></strong>   
												</div>  
											<?php } ?>
											<?php $No=1; 
                          						foreach ($join as $catatan) : ?>
												  <?php if($this->session->userdata('id_user')==$catatan->id_user) : ?>
												<tr>
													<td><?php echo $No++ ?></td>
													<td><?php echo $catatan->tanggal_tambah ?></td>
													<td><?php echo $catatan->id_tanam ?></td>
													<td><?php echo $catatan->komoditas." - ".$catatan->masa." bulan" ?></td>
													<td><?php echo $catatan->uraian ?></td>
													<?php $jumlah="Rp. " . number_format($catatan->pemasukan,2,',','.'); ?>
													<td><?php echo $jumlah ?></td>
													<?php $jumlah2="Rp. " . number_format($catatan->pengeluaran,2,',','.'); ?>
													<td><?php echo $jumlah2 ?></td>
													<td><?php echo $catatan->keterangan?></td>
													<td>
													<button class="btn btn-warning" name="edit" value="Sunting" data-toggle="modal" data-target="#edit_data_Modal<?php echo $catatan->id_catatan; ?>" >Sunting</button>
													<div id="edit_data_Modal<?php echo $catatan->id_catatan; ?>" class="modal fade">
														<div class="modal-dialog">
														<div class="modal-content">
														<div class="card-header">
															<h5 class="card-title text-center">Sunting</p>
															<p class="card-categor text-center">Catatan</h5>
														</div>
														<div class="modal-body">
														<form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_pembukuan/update_catatan/' . $catatan->id_catatan; ?>"  enctype="multipart/form-data">
															<input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>">
																<h6>Uraian</h6>
																<input type="text" id="uraian" name="uraian" class="form-control" value="<?php echo $catatan->uraian ?>" required>
																<br />
																<h6>Jumlah</h6>
																<?php if($catatan->pengeluaran==0||$catatan->pemasukan!=0){ ?>
																	<input type="number" id="pemasukan" name="pemasukan" class="form-control" value="<?php echo $catatan->pemasukan ?>" required>
																<?php } else if($catatan->pemasukan==0||$catatan->pengeluaran!=0) { ?>
																	<input type="number" id="pengeluaran" name="pengeluaran" class="form-control" value="<?php echo $catatan->pengeluaran ?>" required>
																<?php } ?>
																<br />
																<h6>Keterangan</h6>
																<input type="text" id="keterangan" name="keterangan" value="<?php echo $catatan->keterangan ?>" class="form-control">
																<br />
														</div>
														<div class="card-footer">
															<button type="submit" name="submit" class="btn btn-success">Sunting</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
														</form>
														</div>
														</div>
														</div>
													</div>
													</td>

													<td>
													<button class="btn btn-danger" name="delete" value="Hapus" data-toggle="modal" data-target="#delete_data_Modal<?php echo $catatan->id_catatan; ?>">Hapus</button>
													<div id="delete_data_Modal<?php echo $catatan->id_catatan; ?>" class="modal fade">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="card-header">
														<h5 class="card-title text-center">Hapus</h5>
														<p class="card-categor text-center">Catatan</p>
														</div>
														<div class="modal-body">
														<form class="form-horizontal" method="post" action="<?=base_url()?>C_pembukuan/hapus_catatan/<?=$catatan->id_catatan?>">
														<h5 align="center">Apakah Anda yakin ingin menghapus informasi ini?</h5>
														</div>
														<div class="card-footer">
														<button type="submit" class="btn btn-success">Hapus</button>
														</form>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
														</div>
														</div>
													</div>
													</div>
													</td>
												</tr>
												<?php endif; ?>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="card-body">
                  					<!--<?php echo $pagination; ?>-->
									</div>
							</div>	
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Perhitungan</div>
										<p class="card-category">Catatan Keuangan</p>
									</div>
									<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th scope="col">ID Tanam</th>
													<th scope="col">Pemasukan</th>
													<th scope="col">Pengeluaran</th>
													<th scope="col">Saldo</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													foreach($subtotal1 as $total) : 
													 ?>
													 <?php if($this->session->userdata('id_user')==$total->id_user) : ?>
												<tr>
													<td> 
													<?php echo $total->id_tanam; ?>
													</td>
													<td> 
													<?php echo "Rp. " . number_format($total->total,2,',','.'); ?>
													</td>
													<td> 
													<?php echo "Rp. " . number_format($total->total2,2,',','.'); ?>
													</td>
													<td>
													<?php 
														$saldo = $total->total - $total->total2;
														echo "Rp. " . number_format($saldo,2,',','.');
													?>
													</td>
												</tr>
														<?php endif; ?>
												<?php endforeach; ?>
											</tbody>
										</table>
										</div>
											<p class="card-category"><b>Keterangan</b></p>
											<?php foreach ($hortisphere1 as $data) : ?>
												<?php $masa_tanam =  $data->komoditas . " - " . $data->masa . " bulan"?>
												<?php if($this->session->userdata('id_user')==$data->id_user) : ?>
													<p class="card-category"><?php echo $data->id_tanam; ?> : <span><?php echo $masa_tanam; ?></span></p>
												<?php endif; ?>
											<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="card-header">
     <h5 class="card-title text-center">Tambah</p>
     <p class="card-categor text-center">Masa Tanam</h5>
   </div>
   <div class="modal-body">
   <form action="<?=base_url()?>C_pembukuan/tambah_masaTanam" method="post" enctype="multipart/form-data">
   <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>">
     <h6>Komoditas</h6>
     <input type="text" id="komoditas" name="komoditas" class="form-control" required>
     <br />
     <h6>Masa Tanam</h6>
     <input type="number" id="masa" name="masa" class="form-control" required>
     <br />
     <h6>Tanggal Mulai Tanam</h6>
     <input type="date" id="tanggal_mulai_tanam" name="tanggal_mulai_tanam" class="form-control" required>
     <br />
	</div>
	<div class="card-footer">
    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </form>
   </div>
  </div>
 </div>
</div>

<div id="add_data_Modal2" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="card-header">
     <h5 class="card-title text-center">Tambah</p>
     <p class="card-categor text-center">Catatan</h5>
   </div>
   <div class="modal-body">
   <form action="<?=base_url()?>C_pembukuan/tambah_catatan" method="post" enctype="multipart/form-data">
   <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>">   
   <h6>Masa Tanam</h6>
	 <select name="id_tanam" class="form-control" required>
	 <option value="" selected disabled>-pilih-</option>
	 <?php foreach ($hortisphere1 as $data) : ?>
		<?php if($this->session->userdata('id_user')==$data->id_user) : ?>
			<?php $masa_tanam =  $data->komoditas . " - " . $data->masa . " bulan"?>
		<option value="<?php echo $data->id_tanam; ?>" ><?php echo $masa_tanam; ?></option>
		<?php endif; ?>
	 <?php endforeach; ?>
    </select>
	<br />
	<h6>Kategori</h6>
	 <select name="kategori" class="form-control" required>
	 <option value="" selected disabled>-pilih-</option>
	 <option value="pemasukan" >Pemasukan</option>
	 <option value="pengeluaran" >Pengeluaran</option>
    </select>
     <br />
     <h6>Uraian</h6>
     <input type="text" id="uraian" name="uraian" class="form-control" required>
     <br />
     <h6>Jumlah</h6>
     <input type="number" id="jumlah" name="jumlah" class="form-control" required>
     <br />
	 <h6>Keterangan</h6>
	 <input type="text" id="keterangan" name="keterangan" class="form-control">
	 <br />
	</div>
	<div class="card-footer">
	
    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </form>
   </div>
  </div>
 </div>
</div>